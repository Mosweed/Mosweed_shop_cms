<?php

namespace App\Livewire\Admin\PaymentsMethods;

use App\Models\API_configration;
use App\Models\Payments_methods;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class PaymentsMethods extends Component
{
    public $PaymentsMethods;

    public $mollie_api_token;

    public function mount()
    {
        $this->PaymentsMethods = Payments_methods::all();
        $this->mollie_api_token = API_configration::getValue('mollie_api_token');
    }

    public function deletePaymentsmethod($Payments_methods_id)
    {
        Payments_methods::where('Payments_methods_id', $Payments_methods_id)->delete();

        $this->PaymentsMethods = Payments_methods::all();

    }

    // get mollie payment methods
    public function getPaymentsMethods()
    {
        Artisan::call('app:mollie_pyments_methods_updater');
        $this->PaymentsMethods = Payments_methods::all();
    }

    public function render()
    {
        return view('livewire.admin.payments-methods.payments-methods')->layout('components.admin');
    }
}
