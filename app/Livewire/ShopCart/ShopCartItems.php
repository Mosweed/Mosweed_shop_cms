<?php

namespace App\Livewire\ShopCart;

use App\Models\coupon;
use App\Models\RedeemCoupon;
use App\Models\Shopcart as ShopcartModel;
use Livewire\Component;

class ShopCartItems extends Component
{
    public $cart;

    public $total = 0;

    public $savings = 0;

    public $couponCode;

    public $applyCouponcode;

    public function calculate()
    {
        $this->total = 0;

        $coupon = coupon::where('code', $this->couponCode)->first();

        foreach ($this->cart as $item) {
            if ($coupon != null) {

                $item->update([
                    'coupon_code' => $this->couponCode,
                    'shopcartitem_price' => ($item->product->price * $item->quantity),
                ]);

            } else {
                $item->update([
                    'coupon_code' => null,
                    'shopcartitem_price' => $item->product->price * $item->quantity,
                ]);
            }

            $this->total += $item->shopcartitem_price;
        }

        $this->total = round($this->total, 2);

        if ($coupon != null) {

            if ($coupon->use_limites_type == 'one_time') {
                $coupons = RedeemCoupon::where('coupons_id', $coupon->id)->first();
                if ($coupons) {

                    foreach ($this->cart as $item) {
                        $item->update([
                            'coupon_code' => null,
                        ]);
                    }
                    $this->couponCode = null;
                    $this->dispatch('swal-one-time');

                    return;
                }
            }

            if ($coupon->use_limites_type == 'limited') {

                $coupons = RedeemCoupon::where('coupons_id', $coupon->id)->get();

                if (count($coupons) >= $coupon->limit) {
                    foreach ($this->cart as $item) {
                        $item->update([
                            'coupon_code' => null,
                        ]);
                    }
                    $this->couponCode = null;

                    $this->dispatch('swal-limit');

                    return;
                }
            }

            if ($coupon->fast_price) {

                if ($this->total < $coupon->fast_price) {
                    $this->couponCode = null;
                    $this->savings = 0;

                    foreach ($this->cart as $item) {
                        $item->update([
                            'coupon_code' => null,
                        ]);
                    }
                    $this->dispatch('swal_total_less');

                    return;
                }

                $this->savings = $coupon->fast_price;

            } else {

                $this->savings = $this->total * $coupon->percentage / 100;

            }

        } else {
            $this->savings = 0;
        }

        $this->savings = round($this->savings, 2);

    }

    public function RemoveCoupon()
    {
        $this->couponCode = null;

        $this->calculate();
        // foreach ($this->cart as $item) {
        //     $item->update([
        //         'coupon_code' => null,
        //     ]);
        // }
    }

    public function applyCoupon()
    {

        $applyCouponcode = coupon::where('code', $this->applyCouponcode)->first();
        if ($applyCouponcode == null) {

            $this->applyCouponcode = null;
            $this->dispatch('swal-invalid-code');

            return;
        }

        if ($applyCouponcode->start_date >= now() || $applyCouponcode->end_date <= now()) {

            $this->applyCouponcode = null;
            $this->dispatch('swal-invalid-code');

            return;
        }

        if ($applyCouponcode->fast_price != null && $applyCouponcode->fast_price > $this->total) {
            $this->dispatch('swal_total_less');

            return;
        }

        if ($applyCouponcode->use_limites_type == 'one_time') {
            $coupon = RedeemCoupon::where('coupons_id', $applyCouponcode->id)->first();
            if ($coupon) {
                $this->dispatch('swal-one-time');

                return;
            }
        }

        if ($applyCouponcode->use_limites_type == 'limited') {

            $coupon = RedeemCoupon::where('coupons_id', $applyCouponcode->id)->get();

            if (count($coupon) >= $applyCouponcode->limit) {
                $this->dispatch('swal-limit');

                return;
            }
        }

        $this->couponCode = $applyCouponcode->code;

        $this->applyCouponcode = null;
        $this->calculate();
    }

    public function remove_item($id)
    {

        $cart = ShopcartModel::whereId($id)->first();

        if ($cart) {
            $cart->delete();
            $this->dispatch('updateCartCount');
        }

        $this->calculate();

    }

    public function incrementQty($id)
    {

        $cart = ShopcartModel::whereId($id)->first();

        // check if the product is in stock
        if ($cart->product->stock < $cart->quantity + 1) {
            $this->dispatch('swal-stock');

            return;
        }
        if ($cart) {
            $cart->update([
                'quantity' => $cart->quantity + 1,
            ]);

            $this->calculate();
        }

        session()->flash('success', 'de aantal is verhoogd');
    }

    public function decrementQty($id)
    {

        $cart = ShopcartModel::whereId($id)->first();

        if ($cart) {

            if ($cart->quantity <= 1) {
                return;
            }
            $cart->update([
                'quantity' => $cart->quantity - 1,

            ]);
        }  $this->calculate();
        session()->flash('success', 'de aantal is verlaagd');

    }

    public function render()
    {
        if (auth()->check()) {
            $this->cart = ShopcartModel::join('users', 'users.id', '=', 'shopcarts.user_id')
                ->join('products', 'products.id', '=', 'shopcarts.product_id')
                ->where('users.id', auth()->id())
                ->select('shopcarts.*', 'products.product_name', 'products.price', 'products.image')
                ->get();

            $coupon = ShopcartModel::where('coupon_code', '!=', null)->where('user_id', auth()->id())->first();
            if ($coupon) {
                $this->couponCode = $coupon->coupon_code;
            }

        } else {

            $session_id = session()->getId();
            $this->cart = ShopcartModel::join('products', 'products.id', '=', 'shopcarts.product_id')
                ->where('shopcarts.session_id', $session_id)
                ->select('shopcarts.*', 'products.product_name', 'products.price', 'products.image', 'products.stock')
                ->get();

            $coupon = ShopcartModel::where('coupon_code', '!=', null)->where('session_id', $session_id)->first();
            if ($coupon) {
                $this->couponCode = $coupon->coupon_code;
            }

        }

        $this->calculate();

        return view('livewire.shop-cart.shop-cart-items');
    }
}
