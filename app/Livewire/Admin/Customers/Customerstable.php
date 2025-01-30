<?php

namespace App\Livewire\Admin\Customers;

use App\Models\Customer;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Customerstable extends Component
{
    use WithPagination;

    public $users;

    public $searchTerm = null;

    protected $queryString = ['searchTerm' => ['except' => '']];

    protected $listeners = ['deleteCustomer' => 'deletecustomer'];

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function conformDelete($id)
    {

        $customer = Customer::find($id);

        $this->dispatch('swal_confirm_delete', [
            'name' => $customer->firstname.' '.$customer->lastname,
            'id' => $id,
        ]);
    }

    public function deletecustomer($id)
    {
        //dd($id);
        $customer = Customer::find($id);
        $user = User::where('id', $customer->user_id)->first();

        if ($user) {
            $user->delete();
        }
        //$customer->delete();

    }

    public function render()
    {

        $customers = Customer::query();

        if ($this->searchTerm != null) {
            $customers = $customers->where('firstname', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('lastname', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('email', 'like', '%'.$this->searchTerm.'%')

                ->orWhere('phonenumber', 'like', '%'.$this->searchTerm.'%');
        }

        $customers = $customers->paginate(5);

        return view('livewire.admin.customers.customerstable', [
            'customers' => $customers,
        ])->layout('components.admin');
    }
}
