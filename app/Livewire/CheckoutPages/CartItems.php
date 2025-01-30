<?php

namespace App\Livewire\CheckoutPages;

use App\Models\coupon;
use App\Models\Shopcart;
use Livewire\Component;

class CartItems extends Component
{
    public $cartItems;

    public $totalPrice;

    public function mount()
    {
        if (auth()->guest()) {
            $this->cartItems = Shopcart::where('session_id', session()->getId())->get();

        } else {
            $this->cartItems = Shopcart::where('user_id', auth()->id())->get();

        }

        $this->totalPrice = $this->cartItems->sum('shopcartitem_price');
        $couponcode = null;
        $savingcost = 0;
        if ($this->cartItems->count() != 0) {
            $saving = 0;
            foreach ($this->cartItems as $item) {
                if ($item->coupon_code != null) {

                    $coupon = coupon::where('code', $item->coupon_code)->first();

                    $couponcode = $coupon->code;

                    if ($coupon->percentage != null) {
                        $saving = $coupon->percentage / 100;
                        $savingcost = $this->totalPrice * $saving;
                    } else {
                        $saving = $coupon->fast_price;
                        $savingcost = $saving;
                    }
                    break;
                }
            }

            $this->dispatch('CartTotalPrice', $this->totalPrice, $savingcost, $couponcode)->to(Checkout::class);

        }

    }

    public function render()
    {
        return view('livewire.checkout-pages.cart-items');
    }
}
