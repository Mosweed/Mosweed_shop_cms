<?php

namespace App\Livewire\Admin\Shipping;

use App\Models\Shipping_methods as ShippingMethod;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Shippingcreate extends Component
{
    use WithFileUploads;

    public $name;

    public $enabled = true;

    public $image;

    public $type = '';

    public $cost = 0.00;

    public $min_order_amount = 0.00;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'enabled' => 'required|boolean',
            'image' => 'nullable|image|max:1024', // 1MB Max
            'type' => 'required|in:Free,Fixed_rate,Local_pickup',
            'cost' => 'nullable|numeric|min:0',
            'min_order_amount' => 'nullable|numeric|min:0',
        ]);

        $imagePath = $this->image ? $this->image->store('shipping_images', 'public') : null;
        $imageUrl = $imagePath ? asset('storage/'.$imagePath) : null;
        if ($this->min_order_amount != 0) {
            $this->cost = 0;
        }
        if ($this->type === 'Free') {
            $this->cost = 0;
        }

        ShippingMethod::create([
            'name' => $this->name,
            'enabled' => $this->enabled,
            'image' => $imageUrl,
            'type' => $this->type,
            'cost' => $this->cost,
            'min_order_amount' => $this->min_order_amount,
        ]);

        session()->flash('message', 'Shipping method added successfully.');
        $this->reset();

        return redirect()->route('admin.show.shipping');
    }

    public function render()
    {
        return view('livewire.admin.shipping.shippingcreate')->layout('components.admin');
    }
}
