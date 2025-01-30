<?php

namespace App\Livewire\CheckoutPages;

use App\Models\Payments_methods;
use Livewire\Component;

class PaymentsMethods extends Component
{
    public $Mollie;

    public $selctedPaymentsMethod;

    public $selctedShippingMethodType;

    public $Methods;

    protected $listeners = ['ShippingMethodSelectedType'];

    public function ShippingMethodSelectedType($ShippingMethod)
    {

        $this->selctedShippingMethodType = $ShippingMethod;
        $this->selctedPaymentsMethod = null;
        $this->dispatch('PymentMethodSelected', $this->selctedPaymentsMethod)->to(Checkout::class);

    }

    public function selectmethod($value)
    {

        $this->dispatch('PymentMethodSelected', $this->selctedPaymentsMethod)->to(Checkout::class);
    }

    public function render()
    {

        $this->Methods = Payments_methods::where('status', 'active')->get();
        if ( $this->Methods->count() == 0) {
            $this->dispatch('updatePaymentMethodcount', 0);
            $this->dispatch('getCachPaymentMethod', 0);

        } else {
            $this->dispatch('updatePaymentMethodcount',  $this->Methods->count());

            $cachPaymentMethod =  $this->Methods->where('Payments_methods_id', 'cash')->first();
            if ($cachPaymentMethod) {
                $this->dispatch('getCachPaymentMethod', 1);
            }

        }

        return view('livewire.checkout-pages.payments-methods');
    }
}