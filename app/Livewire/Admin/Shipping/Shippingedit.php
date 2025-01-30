<?php

namespace App\Livewire\Admin\Shipping;

use App\Models\Shipping_methods as ShippingMethod;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Shippingedit extends Component
{
    use WithFileUploads;

    public $shippingMethodId;

    public $name;

    public $enabled = true;

    public $image;

    public $current_image;

    public $type = 'Free';

    public $cost;

    public $min_order_amount;

    public function mount($id)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);
        $this->shippingMethodId = $shippingMethod->id;
        $this->name = $shippingMethod->name;
        $this->enabled = $shippingMethod->enabled;
        $this->current_image = $shippingMethod->image;
        $this->type = $shippingMethod->type;
        $this->cost = $shippingMethod->cost;
        $this->min_order_amount = $shippingMethod->min_order_amount;
    }

    public function updateShippingMethod()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'enabled' => 'required|boolean',
            'image' => 'nullable|image|max:1024', // 1MB Max
            'type' => 'required|in:Free,Fixed_rate,Local_pickup',
            'cost' => 'nullable|numeric|min:0',
            'min_order_amount' => 'nullable|numeric|min:0',
        ]);

        $shippingMethod = ShippingMethod::findOrFail($this->shippingMethodId);

        if ($this->image) {

            $imagePath = $this->image->store('public/shipping_images');
            $filename = basename($imagePath);
            $imageUrl = asset('storage/shipping_images/'.$filename);
            $shippingMethod->image = $imageUrl;
        }
        if ($this->min_order_amount != 0) {
            $this->cost = 0;
        }
        if ($this->type == 'Free') {
            $this->cost = 0;
        }

        $shippingMethod->update([
            'name' => $this->name,
            'enabled' => $this->enabled,
            'type' => $this->type,
            'cost' => $this->cost,
            'min_order_amount' => $this->type === 'Free' ? $this->min_order_amount : 0,
        ]);

        session()->flash('message', 'Shipping method updated successfully.');

        return redirect()->route('admin.show.shipping');
    }

    public function render()
    {
        return view('livewire.admin.shipping.shippingedit')->layout('components.admin');
    }
}
