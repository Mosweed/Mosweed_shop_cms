<?php

namespace App\Livewire\Admin\Customers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Support\Facades\Password;
use Laravel\Fortify\Contracts\FailedPasswordResetLinkRequestResponse;
use Laravel\Fortify\Contracts\SuccessfulPasswordResetLinkRequestResponse;
use Livewire\Component;

class Customerscreate extends Component
{
    public $user;

    public $firstname;

    public $lastname;

    public $password;

    public $email;

    public $phonenumber;

    public $role;

    protected function broker(): PasswordBroker
    {
        return Password::broker(config('fortify.passwords'));
    }

    // public function savenewCustomer()
    // {
    //     $this->validate([
    //         'firstname' => 'required',
    //         'lastname' => 'required',
    //         'email' => 'required|email',
    //         'phonenumber' => 'required',
    //         'role' => 'required',

    //     ]);

    //     // make first as User and then change it to Customer
    //     $user = User::Create([
    //         'name' => $this->first_name.' '.$this->last_name,
    //         'email' => $this->email,
    //         'role' => $this->role,
    //         'phonenumber' => $this->phonenumber,

    //     ]);
    //     // save the user

    //     // make the user a customer
    //     $customer = Customer::Create([
    //         'user_id' => $this->user->id,
    //         'name' => $this->first_name.' '.$this->last_name,
    //         'email' => $this->email,
    //         'phonenumber' => $this->phonenumber,
    //     ]);

    //     // save the customer
    //     $this->customer->save();

    //     return redirect()->to(route('admin.customers'));

    // }

    public function savenewCustomer()
    {
        $user = User::create([
            'name' => $this->firstname.' '.$this->lastname,
            'email' => $this->email,
            'role' => $this->role,

            'password' => bcrypt('defaultPassword123'), // Consider using a more secure handling or configuration.
        ]);

        $customer = Customer::create([
            'user_id' => $user->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phonenumber' => $this->phonenumber,
        ]);
        $status = $this->broker()->sendResetLink(
            ['email' => $user->email]
        );

        $status == Password::RESET_LINK_SENT
                   ? app(SuccessfulPasswordResetLinkRequestResponse::class, ['status' => $status])
                   : app(FailedPasswordResetLinkRequestResponse::class, ['status' => $status]);

        if ($status == Password::RESET_LINK_SENT) {
            $this->dispatch('swal_success');
        } else {
            $this->dispatch('swal_error');
        }

        return redirect()->to(route('admin.show.customers'));
    }

    public function render()
    {
        return view('livewire.admin.customers.customerscreate')->layout('components.admin');
    }
}
