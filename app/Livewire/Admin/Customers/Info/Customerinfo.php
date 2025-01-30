<?php

namespace App\Livewire\Admin\Customers\Info;

use App\Models\Customer;
use App\Models\User;
use Livewire\Component;

class Customerinfo extends Component
{
    public $id;

    public $customer;

    public $user;

    public $email;

    public $firstname;

    public $lastname;

    public $phonenumber;

    protected $listeners = ['refreshCustomerinfo' => 'refresh'];

    public function refresh()
    {
        $this->mount($this->id);
    }

    public function mount($id)
    {
        $this->customer = Customer::find($id);
        $this->user = User::find($this->customer->user_id);
        $this->email = $this->customer->email;
        $this->firstname = $this->customer->firstname;
        $this->lastname = $this->customer->lastname;
        $this->phonenumber = $this->customer->phonenumber;
    }

    public function saveCustomer()
    {
        $this->validate([
            'email' => 'email|max:255',
            'firstname' => 'min:2|max:255',
            'lastname' => 'min:2|max:255',
            'phonenumber' => 'min:10|max:15',

        ]);
        // $this->customer->email = $this->email;
        // $this->customer->user = $this->email;
        // $this->customer->firstname = $this->firstname;
        // $this->customer->lastname = $this->lastname;
        // $this->customer->phonenumber = $this->phonenumber;
        // $this->customer->save();
        // $this->dispatch('swal_save');

        //     $this->customer->firstname = $this->firstname;
        // $this->customer->lastname = $this->lastname;
        // $this->customer->phonenumber = $this->phonenumber;

        // // Save the customer information
        // $this->customer->save();

        // Update the associated user's email if it exists

        $this->customer->firstname = $this->firstname;
        $this->customer->lastname = $this->lastname;

        $this->customer->phonenumber = $this->phonenumber;

        $this->customer->email = $this->email;
        $this->customer->save();
        if ($this->user !== null) {

            $this->user->name = $this->firstname.' '.$this->lastname;

            $this->user->email = $this->email;
            $this->user->save();
            $this->dispatch('refreshUserinfo');
        }

        $this->dispatch('swal_save');

    }

    public function render()
    {
        $this->email = $this->customer->email;

        return view('livewire.admin.customers.info.customerinfo')->layout('components.admin');
    }
}
