<?php

namespace App\Livewire\Admin\PaymentsMethods;

use App\Models\Payments_methods;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PaymentsMethodsCreate extends Component
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

    public function update_upload_image()
    {
        $this->validate([
            'upload_image' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);

    }

    public function CreatePaymentsmethod()
    {

        $this->Payments_methods_id = Str::slug($this->description);
        $this->validate([
            'Payments_methods_id' => 'required | string | max:255 | unique:payments_methods',
            'description' => 'required | string | max:255',
            'status' => 'required | in:active,inactive',
            'upload_image' => 'required | mimes:jpeg,png,jpg,gif,svg',
        ], [
            'Payments_methods_id.required' => 'The Name field is required.',
            'Payments_methods_id.unique' => 'The Name has already been taken.',
            'description.required' => 'The Description field is required.',
            'status.required' => 'The Status field is required.',
            'upload_image.required' => 'The Image field is required.',
            'upload_image.mimes' => 'The Image must be a file of type: jpeg, png, jpg, gif, svg.',
        ]
        );

        $this->image = env('APP_URL').'/storage/'.$this->upload_image->store('images', 'public');

        Payments_methods::create([

            'Payments_methods_id' => $this->Payments_methods_id,
            'description' => $this->description,
            'image' => $this->image,
            'status' => $this->status,
            'api_token' => $this->api_token,
        ]);

        session()->flash('message', 'Payments Method Created Successfully.');

        return redirect()->route('admin.paymentmethods');

    }

    public function render()
    {
        return view('livewire.admin.payments-methods.payments-methods-create')->layout('components.admin');
    }
}
