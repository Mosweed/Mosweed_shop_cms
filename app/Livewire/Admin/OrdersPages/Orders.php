<?php

namespace App\Livewire\Admin\OrdersPages;

use App\Models\Order_items;
use App\Models\Orders as ModelsOrders;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    public $searchTerm = null;

    public $status = null;

    protected $queryString = ['searchTerm' => ['except' => ''], 'status' => ['except' => '']];

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function changeonstatus()
    {
        $this->resetPage();
    }

    public function deleteOrder($order)
    {

        //  dd($order);

        $order = ModelsOrders::find($order);

        $orderItems = Order_items::where('order_id', $order->id)->get();

        foreach ($orderItems as $orderItem) {
            $orderItem->delete();
        }

        $order->delete();
        session()->flash('success', 'Order succesvol verwijderd.');
    }

    public function render()
    {
        $orders = ModelsOrders::query();

        if ($this->status != null) {
            if ($this->status != 'Alle') {
                if ($this->searchTerm != null) {

                    $orders->where('id', 'like', '%'.$this->searchTerm.'%')
                        ->orWhere('total', 'like', '%'.$this->searchTerm.'%')
                        ->orWhere('date', 'like', '%'.$this->searchTerm.'%')
                        ->where('status', $this->status);
                } else {
                    $orders = $orders->where('status', $this->status);
                }
            } else {
                if ($this->searchTerm != null) {
                    $orders->where('id', 'like', '%'.$this->searchTerm.'%')
                        ->orWhere('total', 'like', '%'.$this->searchTerm.'%')
                        ->orWhere('date', 'like', '%'.$this->searchTerm.'%');
                } else {

                }

            }
        } else {
            if ($this->searchTerm != null) {
                $orders->where('id', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('total', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('date', 'like', '%'.$this->searchTerm.'%');
            }
        }
        $orders = $orders->paginate(5);

        // format the date to human readable
        foreach ($orders as $order) {
            $order->date = date('d-m-Y', strtotime($order->date));
        }

        return view('livewire.admin.orders-pages.orders', [
            'orders' => $orders,
        ])->layout('components.admin');
    }
}
