<?php

namespace App\Livewire\CheckoutPages;

use App\Events\Pickup_mail;
use App\Models\Address;
use App\Models\API_configration;
use App\Models\coupon;
use App\Models\Customer;
use App\Models\Order_items;
use App\Models\Orders;
use App\Models\RedeemCoupon;
use App\Models\Shopcart;
use Carbon\Carbon;
use Livewire\Component;
use Mollie\Api\MollieApiClient;

class Checkout extends Component
{
    protected $listeners = ['PymentMethodSelected', 'BillingAddressSelected', 'ShippingAddressSelected', 'ShippingMethodSelected', 'CartTotalPrice'];

    public $downloadLink;

    public $PymentMethod;

    // public string  $total;

    public function PymentMethodSelected($PymentMethod)
    {
        // dd($PymentMethod);
        $this->PymentMethod = $PymentMethod;
    }

    public $BillingAddress;

    public function BillingAddressSelected($Address)
    {
        //dd($Address . 'from checkout');
        $this->BillingAddress = $Address;
    }

    public $ShippingAddress;

    public function ShippingAddressSelected($Address)
    {
        //dd($Address . 'from checkout');
        $this->ShippingAddress = $Address;
    }

    public $ShippingMethod;

    public $ShippingMethodCost;

    public $ShippingMethodType;

    public function ShippingMethodSelected($ShippingMethod, $cost, $type)
    {
        $this->ShippingMethod = $ShippingMethod;
        $this->ShippingMethodCost = $cost;
        $this->ShippingMethodType = $type;
    }

    public $savings;

    public $Subtotal;

    public $TotalPrice;

    public $couponcode;

    public function CartTotalPrice($TotalPrice, $savings, $couponcode)
    {
        $this->Subtotal = $TotalPrice;
        $this->savings = $savings;

        $this->couponcode = $couponcode;
        $this->TotalPrice = ($this->Subtotal - $this->savings);

        $this->dispatch('updatetotalprice', $this->TotalPrice);

    }

    public function Place_order()
    {

        $order = new Orders();

        if (! auth()->check()) {
            $Customer = Customer::where('session_id', session()->getId())->first();
            $order->customer_id = $Customer->id;

        } else {
            $Customer = auth()->user()->customer;
            $order->customer_id = $Customer->id;

        }

        $billingAddress = Address::where('id', $this->BillingAddress)->first();
        $shippingAddress = Address::where('id', $this->ShippingAddress)->first();

        $order->billing_firstname = $billingAddress->firstname;
        $order->billing_lastname = $billingAddress->lastname;
        $order->billing_email = $Customer->email;

        $order->billing_bisiness_name = $billingAddress->bisiness_name;
        $order->billing_vat_number = $billingAddress->vat_number;
        $order->billing_country = $billingAddress->country;
        $order->billing_city = $billingAddress->city;
        $order->billing_address = $billingAddress->address;
        $order->billing_zipcode = $billingAddress->zipcode;
        $order->billing_housenumber = $billingAddress->housenumber;
        $order->billing_addition = $billingAddress->addition;
        $order->billing_phonenumber = $Customer->phonenumber;

        $order->shipping_firstname = $shippingAddress->firstname;
        $order->shipping_lastname = $shippingAddress->lastname;
        $order->shipping_email = $Customer->email;
        $order->shipping_bisiness_name = $shippingAddress->bisiness_name;
        $order->shipping_vat_number = $shippingAddress->vat_number;
        $order->shipping_country = $shippingAddress->country;
        $order->shipping_city = $shippingAddress->city;
        $order->shipping_address = $shippingAddress->address;
        $order->shipping_zipcode = $shippingAddress->zipcode;
        $order->shipping_housenumber = $shippingAddress->housenumber;
        $order->shipping_addition = $shippingAddress->addition;
        $order->shipping_phonenumber = $Customer->phonenumber;

        $order->Savings = $this->savings;
        $order->shipping_cost = $this->ShippingMethodCost;

        $order->coupon_code = $this->couponcode;
        $order->date = Carbon::now()->addHour(1)->format('Y-m-d');
        $order->shipping_method = $this->ShippingMethod;

        if ($this->ShippingMethodType != 'Local_pickup') {
            $order->pyment_method = $this->PymentMethod;

        }

        $order->total = $this->TotalPrice + $this->ShippingMethodCost;
        $order->save();

        if (! auth()->check()) {
            $cartItems = Shopcart::where('session_id', session()->getId())->get();

        } else {
            $cartItems = Shopcart::where('user_id', auth()->id())->get();

        }

        foreach ($cartItems as $cartItem) {
            $orderItem = new Order_items();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->product_price = $cartItem->product->price;
            $orderItem->price = $cartItem->shopcartitem_price;
            $orderItem->save();
        }

        if ($this->ShippingMethodType == 'Local_pickup' && $this->PymentMethod == 'cash') {

            $cartItems->each->delete();

            $OrderItemsData = Order_items::where('order_id', $order->id)->get();

            // format the date to the right format
            $order->date = date('d-m-Y', strtotime($order->date));

            $coupon = coupon::where('code', $this->couponcode)->first();

            if ($coupon != null) {
                $coupon->is_used = $coupon->is_used + 1;
                $coupon->save();

                $RedeemCoupon = new RedeemCoupon();
                $RedeemCoupon->customer_id = $order->customer_id;
                $RedeemCoupon->coupons_id = $coupon->id;
                $RedeemCoupon->save();
            }

            $mailConfig = config('mail.from');
            if ($mailConfig['address'] != 'hello@example.com') {
                event(new Pickup_mail($order, $OrderItemsData));
            } 

            return redirect()->route('successfully_placed');

        } else {
            $Mollie = API_configration::getValue('mollie_api_token');
            if ($Mollie != null) {
             
            $mollie = new MollieApiClient();
            $mollie->setApiKey($Mollie);

            // convert the total price to string
            $total = number_format($this->TotalPrice + $this->ShippingMethodCost, 2, '.', '');

            $payment = $mollie->payments->create([
                'amount' => [
                    'currency' => 'EUR',
                    'value' => $total,
                ],

                'description' => 'My first API payment',
                'redirectUrl' => 'http://127.0.0.1:8000/',
                'method' => $this->PymentMethod,
                'metadata' => [
                    'order_id' => $order->id,
                ],
            ]);

            $paymentId = $payment->id;
            $p = $mollie->payments->update($paymentId, [
                'description' => 'Order #'.$order->id,
                'redirectUrl' => 'http://127.0.0.1:8000/checkout/check/'.$paymentId,
            ]);


            return redirect($payment->getCheckoutUrl(), 303);
        } else {
            return redirect()->route('checkout');
        }
    }

    }

    public function mount()
    {
        //  event(new User_Go_to_Checkout());

        if (! auth()->check()) {
            $cartItems = Shopcart::where('session_id', session()->getId())->get();

        } else {
            $cartItems = Shopcart::where('user_id', auth()->id())->get();

        }

        if ($cartItems->count() == 0) {
            return redirect()->route('cart');
        }

        if (! auth()->check()) {
            $address = Customer::where('session_id', session()->getId())->first()->addresses ?? null;
            if ($address == null) {

                return redirect()->route('checkout.register');

            } elseif ($address->count() == 0) {
                return redirect()->route('checkout.register');
            }
        } else {

            $address = Customer::where('user_id', auth()->id())->first()->addresses ?? null;

            if ($address == null) {
                return redirect()->route('checkout.register');

            } elseif ($address->count() == 0) {
                return redirect()->route('checkout.register');
            }
        }

    }

    public function render()
    {
        return view('livewire.checkout-pages.checkout');
    }
}
