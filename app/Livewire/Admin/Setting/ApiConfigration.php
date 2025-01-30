<?php

namespace App\Livewire\Admin\Setting;

use App\Models\API_configration;
use App\Models\Payments_methods;
use Livewire\Component;

class ApiConfigration extends Component
{
    public $mollie_api_token;

    public $sendcloud_api_token;

    public $sendcloud_api_secret;

    public function mount()
    {
        $this->mollie_api_token = API_configration::getValue('mollie_api_token');
        $this->sendcloud_api_token = API_configration::getValue('sendcloud_api_token');
        $this->sendcloud_api_secret = API_configration::getValue('sendcloud_api_secret');
    }

    public function save()
    {

        if (strlen(trim($this->sendcloud_api_token)) == 0) {
            $this->sendcloud_api_token = null;
        }
        if (strlen(trim($this->mollie_api_token)) == 0) {
            $this->mollie_api_token = null;

        }
        if (strlen(trim($this->sendcloud_api_secret)) == 0) {
            $this->sendcloud_api_secret = null;
        }
        $this->mollie_api_token = $this->mollie_api_token ?: null;
        $this->sendcloud_api_token = $this->sendcloud_api_token ?: null;
        $this->sendcloud_api_secret = $this->sendcloud_api_secret ?: null;

        if ($this->mollie_api_token == null) {
            $Payments_methods = Payments_methods::where('api_token', '!=', null);

            $Payments_methods->delete();
        }
        API_configration::setValue('mollie_api_token', $this->mollie_api_token);
        API_configration::setValue('sendcloud_api_token', $this->sendcloud_api_token);
        API_configration::setValue('sendcloud_api_secret', $this->sendcloud_api_secret);

        session()->flash('message', 'API Configration saved successfully.');
    }

    public function render()
    {
        return view('livewire.admin.setting.api-configration')->layout('components.admin');
    }
}
