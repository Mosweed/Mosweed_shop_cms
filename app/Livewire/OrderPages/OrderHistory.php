<?php

namespace App\Livewire\OrderPages;

use App\Models\Order_items;
use App\Models\Orders;
use Livewire\Component;
use PDF;

class OrderHistory extends Component
{
    public $orders;

    public function mount()
    {
        if (! auth()->user()) {
            return redirect()->route('login');
        }

        $this->orders = auth()->user()->orders;

    }

    // public function downloadInvoice($id)
    // {
    //     $Order = Orders::find($id);
    //     $order_items  = Order_items::where('order_id', $id)->get();

    //     $data = [
    //         'OrderItems' => $order_items,
    //         'Order' => $Order,
    //     ];

    //     // convert the data  to a  UTF-8 encoded

    //     $data = mb_convert_encoding($data, 'UTF-8', 'UTF-8');

    //     $pdf = PDF::loadView('pdf.Invoice', $data);

    //     return $pdf->stream('fuctuur'.$Order->id.'.pdf');

    // }

    public function render()
    {
        return view('livewire.order-pages.order-history');
    }
}
