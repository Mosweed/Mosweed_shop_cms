<?php

namespace App\Livewire\Admin\PaymentsMethods;

use App\Models\Payments_methods;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PaymentsMethodsEdite extends Component
{
    use WithFileUploads;

    public $Payments_methods_id;

    public $description;

    public $image;

    #[Validate('required', message: 'this field is required')]
    #[Validate('mimes:jpeg,png,jpg,gif,svg', message: 'this field must be an image')]
    public $upload_image;

    public $status;

    public $api_token;

    public $PaymentsMethods;

    public function mount($id)
    {
        $PaymentsMethods = Payments_methods::where('Payments_methods_id', $id)->first();
        $this->Payments_methods_id = $PaymentsMethods->Payments_methods_id;
        $this->description = $PaymentsMethods->description;
        $this->image = $PaymentsMethods->image;
        $this->status = $PaymentsMethods->status;
        $this->api_token = $PaymentsMethods->api_token;

    }

    public function update_upload_image()
    {
        $this->validate([
            'upload_image' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);

    }

    public function updatePaymentsmethod()
    {

        // validate data if image
        $this->validate([
            'description' => 'required | string | max:255',
            'status' => 'required | in:active,inactive',
        ]);
        if ($this->upload_image) {

            $this->image = env('APP_URL').'/storage/'.$this->upload_image->store('images', 'public');

        }

        Payments_methods::where('Payments_methods_id', $this->Payments_methods_id)->update([
            'description' => $this->description,
            'image' => $this->image,
            'status' => $this->status,
        ]);

        return redirect()->route('admin.paymentmethods');
    }

    public function render()
    {
        return view('livewire.admin.payments-methods.payments-methods-edite')->layout('components.admin');
    }
}
