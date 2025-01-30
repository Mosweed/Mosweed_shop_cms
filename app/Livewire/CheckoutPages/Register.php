<?php

namespace App\Livewire\CheckoutPages;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Orders;
use App\Models\User;
use App\Rules\VatNumber;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Support\Facades\Password;
use Laravel\Fortify\Contracts\FailedPasswordResetLinkRequestResponse;
use Laravel\Fortify\Contracts\SuccessfulPasswordResetLinkRequestResponse;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('regex: /^[a-zA-Z\s]*$/', message: 'Dit mag alleen letters bevatten')]
    #[Validate('min:2', message: 'Dit moet minimaal 2 karakters zijn')]
    #[Validate('max:50', message: 'Dit mag niet meer dan 50 karakters zijn')]
    public $first_name;

    #[Validate('alpha', message: 'Dit moet een alfabet zijn')]
    #[Validate('regex: /^[a-zA-Z\s]*$/', message: 'Dit mag alleen letters bevatten')]
    #[Validate('max:50', message: 'Dit mag niet meer dan 50 karakters zijn')]
    public $last_name;

    #[Validate('email', message: 'Dit moet een email zijn')]
    public $email;

    #[Validate('numeric', message: 'Dit moet een nummer zijn')]
    #[Validate('min:10', message: 'Dit moet minimaal 10 karakters zijn')]
    #[Validate('regex:/^([0-9\s\-\+\(\)]*)$/', message: 'Dit moet een telefoonnummer zijn')]
    #[validate('starts_with:06,+31,04', message: 'Dit moet een geldig telefoonnummer zijn met 06, +31 of 04 als begin')]
    public $phone;

    #[Validate('required', message: 'Dit is een verplicht veld')]
    #[Validate('min:2', message: 'Dit moet minimaal 2 karakters zijn')]
    #[Validate('max:50', message: 'Dit mag niet meer dan 50 karakters zijn')]
    #[Validate('alpha', message: 'Dit moet een alfabet zijn')]
    public $address;

    #[Validate('required', message: 'Dit is een verplicht veld')]
    #[Validate('min:2', message: 'Dit moet minimaal 2 karakters zijn')]
    #[Validate('max:50', message: 'Dit mag niet meer dan 50 karakters zijn')]
    #[Validate('alpha', message: 'Dit moet een alfabet zijn')]
    public $city;

    #[Validate('required', message: 'Dit is een verplicht veld')]
    #[Validate('min:2', message: 'Dit moet minimaal 2 karakters zijn')]
    #[validate('regex:/^[1-9][0-9]{3}\s?([a-zA-Z]{2})$/', message: 'Dit moet een geldige postcode zijn')]
    public $zip;

    #[Validate('required', message: 'Dit is een verplicht veld')]
    #[Validate('min:2', message: 'Dit moet minimaal 2 karakters zijn')]
    #[Validate('alpha', message: 'Dit moet een alfabet zijn')]
    public $country;

    #[Validate('required', message: 'Dit is een verplicht veld')]
    #[Validate('min:1', message: 'Dit moet minimaal 1 zijn')]
    public $house_number;

    #[Validate('alpha', message: 'Dit moet een alfabet zijn')]
    public $bisiness_name;

    #[Validate([
        'vat_number' => new VatNumber,

    ])]
    #[Validate(('regex:/^[A-Z]{2}[0-9A-Z]{2,14}$/'), message: 'Dit moet een geldig BTW nummer zijn')]
    public $vat_number;

    public $is_a_customer = false;

    protected $listeners = ['CreateUser', 'Inloggen', 'Continue_as_guest'];

    public function Inloggen()
    {
        return redirect()->route('login');
    }

    protected function broker(): PasswordBroker
    {
        return Password::broker(config('fortify.passwords'));
    }

    public function CreateUser()
    {

        $customer = Customer::where('email', $this->email)->first();

        $user = User::Create([
            'name' => $this->first_name.' '.$this->last_name,
            'email' => $this->email,
            'password' => bcrypt('password'),

        ]);

        if ($customer != null) {
            $customer->user_id = $user->id;
            $customer->session_id = null;
            $customer->save();

            $status = $this->broker()->sendResetLink(
                ['email' => $user->email]
            );

            $status == Password::RESET_LINK_SENT
                       ? app(SuccessfulPasswordResetLinkRequestResponse::class, ['status' => $status])
                       : app(FailedPasswordResetLinkRequestResponse::class, ['status' => $status]);

        }

        if ($status == Password::RESET_LINK_SENT) {
            $this->dispatch('swal_success');
        } else {
            $this->dispatch('swal_error');
        }

    }

    public function Continue_as_guest()
    {
        $this->create_customer(null);
    }

    public function check_email($email)
    {

        if ($this->email != null) {
            $this->validateOnly('email');

            $user = User::where('email', $email)->first();
            if ($user != null) {
                $this->dispatch('swal_login');

            } else {
                $customer = Customer::where('email', $email)->first();

                if ($customer != null) {

                    $this->dispatch('swal');
                } else {
                    $this->create_customer(null);
                }
            }

        } else {
            $customer_session_id = Customer::where('session_id', session()->getId())->first();

            if ($customer_session_id != null) {

                $this->create_customer($customer_session_id->id);

            }
        }

    }

    public function create_customer($id)
    {

        $this->validateOnly('first_name');
        $this->validateOnly('last_name');

        $this->validateOnly('address');
        $this->validateOnly('city');
        $this->validateOnly('zip');
        $this->validateOnly('country');
        $this->validateOnly('house_number');

        if ($this->bisiness_name != null) {
            $this->validateOnly('bisiness_name');

        }

        if ($this->vat_number != null) {
            $this->validateOnly('vat_number');
        }

        if ($id == null) {

            $this->validateOnly('email');
            $this->validateOnly('phone');

            $customer = new Customer();
            $customer->session_id = session()->getId();
            $customer->firstname = $this->first_name;
            $customer->lastname = $this->last_name;
            $customer->email = $this->email;
            $customer->phonenumber = $this->phone;
            $customer->save();
        }

        $Address = new Address();
        $Address->firstname = $this->first_name;
        $Address->lastname = $this->last_name;

        $Address->address = $this->address;
        $Address->city = $this->city;
        $Address->zipcode = $this->zip;
        $Address->country = $this->country;
        $Address->housenumber = $this->house_number;
        if ($id == null) {
            $Address->customer_id = $customer->id;
        } else {
            $Address->customer_id = $id;
        }

        if ($this->bisiness_name != null) {
            $Address->bisiness_name = $this->bisiness_name;
        }

        if ($this->vat_number != null) {
            $Address->vat_number = $this->vat_number;
        }
        $Address->save();

        return redirect()->route('checkout');
    }

    public function save()
    {
        if (auth()->check()) {
            if (auth()->user()->customer == null) {

                $this->validateOnly('first_name');
                $this->validateOnly('last_name');
                $this->validateOnly('email');
                $this->validateOnly('phone');
                $this->validateOnly('address');
                $this->validateOnly('city');
                $this->validateOnly('zip');
                $this->validateOnly('country');
                $this->validateOnly('house_number');

                if ($this->bisiness_name != null) {
                    $this->validateOnly('bisiness_name');

                }

                if ($this->vat_number != null) {
                    $this->validateOnly('vat_number');
                }

                $customer = new Customer();
                $customer->firstname = $this->first_name;
                $customer->lastname = $this->last_name;
                $customer->email = $this->email;
                $customer->phonenumber = $this->phone;
                $customer->user_id = auth()->id();

                $customer->save();

                $Address = new Address();
                $Address->firstname = $this->first_name;
                $Address->lastname = $this->last_name;

                $Address->address = $this->address;
                $Address->city = $this->city;
                $Address->zipcode = $this->zip;
                $Address->country = $this->country;
                $Address->housenumber = $this->house_number;
                $Address->customer_id = $customer->id;

                if ($this->bisiness_name != null) {
                    $Address->bisiness_name = $this->bisiness_name;
                }

                if ($this->vat_number != null) {
                    $Address->vat_number = $this->vat_number;
                }

                $Address->save();

            } else {

                $customer = auth()->user()->customer;

                $this->validateOnly('first_name');
                $this->validateOnly('last_name');
                $this->validateOnly('email');
                $this->validateOnly('phone');
                $this->validateOnly('address');
                $this->validateOnly('city');
                $this->validateOnly('zip');
                $this->validateOnly('country');
                $this->validateOnly('house_number');

                if ($this->bisiness_name != null) {
                    $this->validateOnly('bisiness_name');

                }

                if ($this->vat_number != null) {
                    $this->validateOnly('vat_number');
                }

                $Address = new Address();
                $Address->firstname = $this->first_name;
                $Address->lastname = $this->last_name;

                $Address->address = $this->address;
                $Address->city = $this->city;
                $Address->zipcode = $this->zip;
                $Address->country = $this->country;
                $Address->housenumber = $this->house_number;
                $Address->customer_id = $customer->id;

                if ($this->bisiness_name != null) {
                    $Address->bisiness_name = $this->bisiness_name;
                }

                if ($this->vat_number != null) {
                    $Address->vat_number = $this->vat_number;
                }

                $Address->save();

            }

            return redirect()->route('checkout');

        } else {

            $this->check_email($this->email);

            //      $customer = Customer::where('session_id', session()->getId())->first();

            //      $this->validateOnly('email');

            //      $order = Orders::where('billing_email' , $this->email)->first();

            //     if ($customer != null ) {
            //         $this->validateOnly('first_name');
            //         $this->validateOnly('last_name');
            //         $this->validateOnly('email');
            //         $this->validateOnly('phone');
            //         $this->validateOnly('address');
            //         $this->validateOnly('city');
            //         $this->validateOnly('zip');
            //         $this->validateOnly('country');
            //         $this->validateOnly('house_number');

            //         if ($this->bisiness_name != null) {
            //             $this->validateOnly('bisiness_name');

            //         }

            //         if ($this->vat_number != null) {
            //             $this->validateOnly('vat_number');
            //         }

            //         $Address = new Address();
            //         $Address->firstname = $this->first_name;
            //         $Address->lastname = $this->last_name;
            //         $Address->email = $this->email;
            //         $Address->phonenumber = $this->phone;

            //         $Address->address = $this->address;
            //         $Address->city = $this->city;
            //         $Address->zipcode = $this->zip;
            //         $Address->country = $this->country;
            //         $Address->housenumber = $this->house_number;
            //         $Address->customer_id = $customer->id;

            //         if ($this->bisiness_name != null) {
            //             $Address->bisiness_name = $this->bisiness_name;
            //         }

            //         if ($this->vat_number != null) {
            //             $Address->vat_number = $this->vat_number;
            //         }
            //         $Address->save();
            //         return redirect()->route('checkout');
            //  } else {

            //         $this->validateOnly('first_name');
            //         $this->validateOnly('last_name');
            //         $this->validateOnly('email');
            //         $this->validateOnly('phone');
            //         $this->validateOnly('address');
            //         $this->validateOnly('city');
            //         $this->validateOnly('zip');
            //         $this->validateOnly('country');
            //         $this->validateOnly('house_number');

            //         if ($this->bisiness_name != null) {
            //             $this->validateOnly('bisiness_name');

            //         }

            //         if ($this->vat_number != null) {
            //             $this->validateOnly('vat_number');
            //         }

            //         $customer = new Customer();
            //         $customer->session_id = session()->getId();
            //         $customer->firstname = $this->first_name;
            //         $customer->lastname = $this->last_name;
            //         $customer->email = $this->email;
            //         $customer->phonenumber = $this->phone;
            //         $customer->save();

            //         $Address = new Address();
            //         $Address->firstname = $this->first_name;
            //         $Address->lastname = $this->last_name;
            //         $Address->email = $this->email;
            //         $Address->phonenumber = $this->phone;

            //         $Address->address = $this->address;
            //         $Address->city = $this->city;
            //         $Address->zipcode = $this->zip;
            //         $Address->country = $this->country;
            //         $Address->housenumber = $this->house_number;
            //         $Address->customer_id = $customer->id;

            //         if ($this->bisiness_name != null) {
            //             $Address->bisiness_name = $this->bisiness_name;
            //         }

            //         if ($this->vat_number != null) {
            //             $Address->vat_number = $this->vat_number;
            //         }
            //         $Address->save();
            // }
        }
        session()->flash('success', 'Uw gegevens zijn opgeslagen');

        // return redirect()->route('checkout');
    }

    public function render()
    {

        if (auth()->check()) {
            $customer = auth()->user()->customer;

        } else {
            $customer = Customer::where('session_id', session()->getId())->first();
            if ($customer != null) {
                $this->is_a_customer = true;
            }

        }

        return view('livewire.checkout-pages.register');

    }
}
