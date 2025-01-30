<?php

namespace App\Livewire\Admin\OrdersPages;

use App\Models\Orders;
use Livewire\Component;

class Orderpage extends Component
{
    public $order;

    public $status;

    public $payment;

    public $order_note;

    public function save()
    {
        $this->order->order_note = $this->order_note;

        $this->order->save();
        $this->dispatch('swal_save');
    }

    public function Update_Status()
    {
        $this->order->status = $this->status;
        $this->order->save();
        $this->dispatch('swal_save');
    }

    public function mount($id)
    {
        $this->order = Orders::find($id);
        if (! $this->order) {
            return redirect()->route('admin.orders');
        }

        $this->order_note = $this->order->order_note;

        $this->status = $this->order->status;
        $this->payment = $this->order->payment_status;

    }

    public function render()
    {
        return view('livewire.admin.orders-pages.orderpage')->layout('components.admin');
    }
}
