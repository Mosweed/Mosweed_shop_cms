<?php

namespace App\Livewire\OrderPages;

use App\Models\Order_items;
use App\Models\Orders;
use Livewire\Component;

class OrderDetails extends Component
{
    public $order;

    public $order_items;

    public function mount($id)
    {
        $this->order = Orders::find($id);
        $this->order_items = Order_items::where('order_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.order-pages.order-details');
    }
}
