<?php

namespace App\Livewire\Admin\Email;

use App\Models\emailconfiguratie;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Emailcreate extends Component
{
    #[Layout('components.admin')]
    public $name_from;

    public $email_from;

    public $password;

    public $host;

    public $port;

    public $encryption;

    protected $rules = [
        'name_from' => 'required|string|max:255',
        'email_from' => 'required|email|max:255',
        'password' => 'required|string|max:255',
        'host' => 'required|string|max:255',
        'port' => 'required|integer',
        'encryption' => 'required|in:tls,ssl',
    ];

    public function save()
    {
        $this->validate();

        emailconfiguratie::create([
            'name_from' => $this->name_from,
            'email_from' => $this->email_from,
            'password' => Crypt::encryptString($this->password),
            'host' => $this->host,
            'port' => $this->port,
            'encryption' => $this->encryption,
            'status' => 'Inactive', // Always set status to Inactive
        ]);

        session()->flash('message', 'Email configuration added successfully.');

        $this->reset(['name_from', 'email_from', 'password', 'host', 'port', 'encryption']);

        return redirect()->route('admin.show.emailconfiguratie');
    }

    public function render()
    {
        return view('livewire.admin.email.emailcreate');
    }
}
