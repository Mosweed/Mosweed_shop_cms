<?php

namespace App\Livewire\Admin\OrdersPages;

use App\Models\Order_items;
use Livewire\Component;
use Livewire\WithPagination;

class Orderitems extends Component
{
    use WithPagination;

    public $id;

    public $order_items;

    public function render()
    {

        $this->order_items = Order_items::where('order_id', $this->id)->get();

        return view('livewire.admin.orders-pages.orderitems');
    }
}
