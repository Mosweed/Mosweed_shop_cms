<?php

namespace App\Livewire\CheckoutPages;

use App\Models\Shipping_methods;
use Livewire\Component;

class ShippingMethods extends Component
{
    public $shippingMethods;

    public $selctedShippingMethod;

    public $totalprice = 0;

    public $paymentMethodcount;

    public $cachPaymentMethod;

    protected $listeners = ['updatetotalprice' => 'settotalprice', 'updatePaymentMethodcount' => 'setPaymentMethodcount', 'getCachPaymentMethod' => 'setCachPaymentMethod'];

    public function setCachPaymentMethod($value)
    {
        $this->cachPaymentMethod = $value;
    }

    public function settotalprice($totalprice)
    {
        $this->totalprice = $totalprice;
    }

    public function setPaymentMethodcount($value)
    {
        //dd($value);
        $this->paymentMethodcount = $value;
    }

    // when selected shipping method is changed
    public function changemethod($value)
    {
        $this->selctedShippingMethod = $value;

        $shippingMethods = Shipping_methods::where('id', $this->selctedShippingMethod)->first();

        $this->dispatch('ShippingMethodSelected', $this->selctedShippingMethod, $shippingMethods->cost, $shippingMethods->type)->to(Checkout::class);

        $this->dispatch('ShippingMethodSelectedType', $shippingMethods->type);
        //$this->dispatch('ShippingMethodSelected', ShippingMethod: $this->shippingMethods);
        // session()->flash('success', 'Shipping method changed to {$value}.');
        //dd($value);
    }

    public function render()
    {
        $this->shippingMethods = Shipping_methods::where('enabled', 1)->get();

        return view('livewire.checkout-pages.shipping-methods');
    }
}
