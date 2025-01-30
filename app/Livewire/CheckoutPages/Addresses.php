<?php

namespace App\Livewire\CheckoutPages;

use App\Models\Address;
use App\Models\Customer;
use Livewire\Component;

class Addresses extends Component
{
    public $selcted_Billing_aadress;

    public $selcted_Shipping_aadress;

    public function add_new_billing()
    {
        return redirect()->route('checkout.register');
    }

    public function add_new_shipping()
    {
        return redirect()->route('checkout.register');
    }

    public function delete_shipping($id)
    {

        $address = Address::where('id', $id)->first();
        $address->delete();

        if (! auth()->check()) {
            $Customer = Customer::where('session_id', session()->getId())->first();
            $address = Address::where('customer_id', $Customer->id)->get();

            if ($address->isEmpty()) {
                return redirect()->route('checkout.register');

            }
        } else {
            $address = auth()->user()->customer->addresses;

            if ($address->isEmpty()) {
                return redirect()->route('checkout.register');

            }
        }

    }

    public function delete_billing($id)
    {

        $address = Address::where('id', $id)->first();
        $address->delete();

        if (! auth()->check()) {
            $Customer = Customer::where('session_id', session()->getId())->first();
            $address = Address::where('customer_id', $Customer->id)->get();

            if ($address->isEmpty()) {
                return redirect()->route('checkout.register');

            }
        } else {
            $address = auth()->user()->customer->addresses;

            if ($address->isEmpty()) {
                return redirect()->route('checkout.register');

            }
        }

    }

    public function selectbillingaddress($id)
    {
        $this->selcted_Billing_aadress = $id;

        // //dd($this->selctedaadress);

        $this->dispatch('BillingAddressSelected', $this->selcted_Billing_aadress)->to(Checkout::class);
    }

    public function selectshippingaddress($id)
    {
        $this->selcted_Shipping_aadress = $id;

        // //dd($this->selctedaadress);

        $this->dispatch('ShippingAddressSelected', $this->selcted_Shipping_aadress)->to(Checkout::class);
    }

    public function render()
    {
        if (! auth()->check()) {
            $Customer = Customer::where('session_id', session()->getId())->first();
            $billing_addresses = Address::where('customer_id', $Customer->id)->get();
            $shipping_addresses = Address::where('customer_id', $Customer->id)->get();

        } else {

            $shipping_addresses = auth()->user()->customer->addresses;
            $billing_addresses = auth()->user()->customer->addresses;

        }

        // $this->selctedaadress = $address->first()->address;
        return view('livewire.checkout-pages.addresses', compact('billing_addresses'), compact('shipping_addresses'));
    }
}
