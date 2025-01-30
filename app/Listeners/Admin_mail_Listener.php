<?php

namespace App\Listeners;

use App\Events\Admin_mail;
use App\Mail\Admin_mail as MailAdmin_mail;
use App\Models\OrdersEmails;
use Mail;
use PDF;

class Admin_mail_Listener
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
    public function handle(Admin_mail $event): void
    {
        $order = $event->order;

        $order->date = date('d-m-Y', strtotime($order->date));
        $OrderItemsData = $event->OrderItemsData;
        $castomerOrderData = [

            'email' => $order->billing_email,
            'title' => 'New Order #'.$order->id,
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

        if ($order->payment_status == 'Paid') {
            $canvas->page_text($width / 5, $height / 2, 'Paid', null,
                80, [255, 0, 0], 2, 2, -20);

        } else {
            $canvas->page_text($width / 5, $height / 2, 'Not Paid', null,
                80, [255, 0, 0], 2, 2, -20);
        }

        $emails = OrdersEmails::all();

        foreach ($emails as $email) {
            $adminOrderData = [

                'email' => $email->email,
                'name' => $email->name, // 'name' => 'John Doe
                'title' => 'Order #'.$order->id,
                'OrderItems' => $OrderItemsData,
                'Order' => $order,
            ];

            $adminOrderData['pdf'] = $pdfcastomerOrder;
            Mail::to($adminOrderData['email'])->send(new MailAdmin_mail($adminOrderData));
        }

    }
}
