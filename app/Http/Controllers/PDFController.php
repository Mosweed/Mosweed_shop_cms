<?php

namespace App\Http\Controllers;

use App\Models\Order_items;
use App\Models\Orders;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function index($id)
    {
        $Order = Orders::find($id);
        $order_items = Order_items::where('order_id', $id)->get();

        $data = [
            'OrderItems' => $order_items,
            'Order' => $Order,
        ];

        $pdf = Pdf::loadView('pdf.Invoice', $data)->setPaper('a4', 'landscape');

        return $pdf->download('invoice.pdf', [
            'Content-Type' => 'application/pdf',
        ]);

    }
}
