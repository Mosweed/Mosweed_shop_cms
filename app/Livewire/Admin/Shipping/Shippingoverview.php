<?php

namespace App\Livewire\Admin\Shipping;

use App\Models\Shipping_methods as ShippingMethod;
use Livewire\Component;

class Shippingoverview extends Component
{
    public $searchTerm = '';

    public $shippingMethods;

    public function mount()
    {
        $this->shippingMethods = ShippingMethod::all();
    }

    public function deleteShippingMethod($id)
    {
        ShippingMethod::find($id)->delete();
        $this->shippingMethods = ShippingMethod::all();
        session()->flash('message', 'Shipping method deleted successfully.');
    }

    public function render()
    {

        $searchTerm = '%'.$this->searchTerm.'%';
        $this->shippingMethods = ShippingMethod::where('name', 'like', $searchTerm)->get();

        return view('livewire.admin.shipping.shippingoverview', [
            'shippingMethods' => $this->shippingMethods,
        ])->layout('components.admin');
    }
}
