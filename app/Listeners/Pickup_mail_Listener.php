<?php

namespace App\Listeners;

use App\Events\Pickup_mail;
use App\Mail\Pickup_mail as MailPickup_mail;
use Mail;
use PDF;

class Pickup_mail_Listener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Pickup_mail $event): void
    {
        $order = $event->order;

        $order->date = date('d-m-Y', strtotime($order->date));
        $OrderItemsData = $event->OrderItemsData;

        $castomerOrderData = [

            'email' => $order->billing_email,
            'title' => 'Pickup Order #'.$order->id,
            'OrderItems' => $OrderItemsData,
            'Order' => $order,
        ];

        $pdfcastomerOrder = PDF::loadView('Mail.PDF.InvoicePDF', $castomerOrderData);
        // return $pdf->stream();

        $pdfcastomerOrder->setPaper('A4', 'portrait');
        $pdfcastomerOrder->output();
        $canvas = $pdfcastomerOrder->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.3, 'Multiply');

        // $canvas->set_opacity(.2,"Normal");

        if ($order->payment_status == 'Betaaled') {
            $canvas->page_text($width / 5, $height / 2, 'Betaaled', null,
                55, [255, 0, 0], 2, 2, -20);

        } else {
            $canvas->page_text($width / 5, $height / 2, 'In afwachting', null,
                55, [255, 0, 0], 2, 2, -20);
        }

        //  dd($order, $OrderItemsData);
        $castomerOrderData['pdf'] = $pdfcastomerOrder;

        Mail::to($castomerOrderData['email'])->send(new MailPickup_mail($castomerOrderData));
    }
}
