<?php

namespace App\Livewire\Admin\Customers\Info;

use App\Models\Customer;
use Illuminate\Http\Request;
use Livewire\Component;

class Editgegevens extends Component
{
    public $customer;

    public function mount(Request $request, $id)
    {
        $this->customer = Customer::find($id);
        //dd($this->customer);
    }

    public function render()
    {
        return view('livewire.admin.customers.info.editgegevens')->layout('components.admin');
    }
}
