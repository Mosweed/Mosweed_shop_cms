<?php

namespace App\Livewire\Admin\Ordersemail;

use App\Models\OrdersEmails;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Ordermailcreate extends Component
{
    #[Layout('components.admin')]
    public $name;

    public $email;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:orders_emails,email',
    ];

    public function save()
    {
        $this->validate();

        OrdersEmails::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Order email added successfully.');

        // Reset form fields
        $this->reset(['name', 'email']);

        return redirect()->route('admin.show.ordermails');
    }

    public function render()
    {
        return view('livewire.admin.ordersemail.ordermailcreate');
    }
}
