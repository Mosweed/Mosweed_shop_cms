<?php

namespace App\Livewire\Admin\Email;

use App\Events\EmailSettings;
use App\Models\emailconfiguratie;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Emailedit extends Component
{
    #[Layout('components.admin')]
    public $emailConfigurationId;

    public $name_from;

    public $email_from;

    public $host;

    public $port;

    public $encryption;

    public $password;

    public function mount($id)
    {
        $emailConfiguration = EmailConfiguratie::findOrFail($id);
        $this->emailConfigurationId = $emailConfiguration->id;
        $this->name_from = $emailConfiguration->name_from;
        $this->email_from = $emailConfiguration->email_from;
        $this->host = $emailConfiguration->host;
        $this->port = $emailConfiguration->port;
        $this->encryption = $emailConfiguration->encryption;
    }

    protected $rules = [
        'name_from' => 'required|string|max:255',
        'email_from' => 'required|email|max:255',
        'host' => 'required|string|max:255',
        'port' => 'required|integer',
        'encryption' => 'required|in:tls,ssl',
    ];

    public function save()
    {
        $this->validate();

        $emailConfiguration = emailconfiguratie::findOrFail($this->emailConfigurationId);
        $emailConfiguration->update([
            'name_from' => $this->name_from,
            'email_from' => $this->email_from,
            'host' => $this->host,
            'port' => $this->port,
            'encryption' => $this->encryption,
        ]);

        if ($this->password) {
            $emailConfiguration->password = Crypt::encryptString($this->password);
            $emailConfiguration->save();
        }

        event(new EmailSettings($emailConfiguration));

        session()->flash('message', 'Email configuration updated successfully.');

        return redirect()->route('admin.show.emailconfiguratie');

    }

    public function render()
    {
        return view('livewire.admin.email.emailedit');
    }
}
