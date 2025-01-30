<?php

namespace App\Livewire\Admin\Customers\Info;

use App\Mail\PasswordResetMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Userinfo extends Component
{
    public $id;

    public $user;

    public $email;

    public $customer;

    #[Validate('min:8', message: 'Dit moet minimaal 8 karakters zijn')]
    #[Validate('max:255', message: 'Dit mag niet meer dan 255 karakters zijn')]
    // validate password
    #[Validate('regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', message: 'Het wachtwoord moet minimaal 1 hoofdletter, 1 kleine letter en 1 cijfer bevatten')]
    public $newPassword;

    #[Validate('required', message: 'Dit veld is verplicht')]
    #[Validate('min:8', message: 'Dit moet minimaal 8 karakters zijn')]
    #[Validate('max:255', message: 'Dit mag niet meer dan 255 karakters zijn')]
    #[Validate('same:newPassword', message: 'De wachtwoorden komen niet overeen')]
    #[Validate('regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', message: 'Het wachtwoord moet minimaal 1 hoofdletter, 1 kleine letter en 1 cijfer bevatten')]
    public $confirmPassword;

    public $role;

    protected $listeners = ['refreshUserinfo' => 'refresh'];

    public function refresh()
    {
        $this->mount($this->id);
    }

    public function mount($id)
    {
        $this->user = User::find($id);
        $this->email = $this->user->email;
    }

    public function resetPassword()
    {
        $tempPassword = Str::random(10);

        $this->user->password = bcrypt($tempPassword);
        $this->user->save();

        Mail::to($this->user->email)->send(new PasswordResetMail($tempPassword));

    }

    public function save()
    {
        // Validate email and password fields
        if ($this->email) {
            $this->validate([
                'email' => 'email|max:255|unique:users,email,'.$this->user->id,
            ]);

        }
        if ($this->newPassword) {
            $this->validateOnly('newPassword');
            $this->validateOnly('confirmPassword');

        }

        $this->user->update(['email' => $this->email]);
        if ($this->user->customer) {
            $this->user->customer->update(['email' => $this->email]);
        }

        $this->user->password = bcrypt($this->newPassword);
        $this->user->save();

        $this->dispatch('swal_save');

        $this->dispatch('refreshCustomerinfo');

        $this->reset(['newPassword', 'confirmPassword', 'email']);

    }

    public function Update_Status()
    {
        $this->user->role = $this->role;
        $this->user->save();
        $this->dispatch('swal_save');
    }

    public function render()
    {

        $this->role = $this->user->role;

        return view('livewire.admin.customers.info.userinfo')->layout('components.admin');
    }
}
