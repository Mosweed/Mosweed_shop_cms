<?php

namespace App\Http\Controllers;

use App\Events\Pickup_mail;
use App\Events\Send_Mail_Order;
use App\Models\API_configration;
use App\Models\coupon;
use App\Models\Order_items;
use App\Models\Orders;
use App\Models\Product;
use App\Models\RedeemCoupon;
use App\Models\Shopcart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Mollie\Api\MollieApiClient;

class CheckoutController extends Controller
{
    private $apiUrl = 'https://panel.sendcloud.sc/api/v2/parcels';

    private function createParcel($order, $orderItems)
    {
        $apiKey = API_configration::getValue('sendcloud_api_token');
        $apiSecret = API_configration::getValue('sendcloud_api_secret');
        $parcelItems = [];

        if ($apiKey == null || $apiSecret == null) {
            return;
        }
        foreach ($orderItems as $item) {
            $product = Product::find($item->product_id);

            $parcelItems[] = [
                'description' => $product->product_name,
                'weight' => 1,
                'quantity' => $item->quantity,
                'value' => $item->product_price,
            ];

        }

        $body = [
            'parcel' => [
                'order_number' => $order->id, // Include order number for tracking
                'name' => $order->shipping_firstname.' '.$order->shipping_lastname,
                'company_name' => $order->shipping_bisiness_name,
                'country' => 'NL',
                'address' => $order->shipping_address.' '.$order->shipping_housenumber,
                'address_divided' => [
                    'street' => $order->shipping_address,
                    'house_number' => $order->shipping_housenumber,
                ],
                'status' => [
                    'id' => 9999,
                    'message' => 'Order status',
                ],
                'city' => $order->shipping_city,
                'postal_code' => $order->shipping_zipcode,
                'telephone' => $order->shipping_phonenumber,
                'email' => $order->shipping_email,
                'parcel_items' => $parcelItems,
                'total_order_value_currency' => 'EUR',
                'total_order_value' => $order->total,
            ],
        ];

        $response = Http::withBasicAuth($apiKey, $apiSecret)
            ->withoutVerifying()
            ->post($this->apiUrl, $body);

    }

    public function check($id)
    {

        $Mollie = API_configration::getValue('mollie_api_token');

        if ($Mollie == null) {
            return redirect()->route('cart')->with('error', 'Mollie API key is not set!');
        }
        $mollie = new MollieApiClient();
        $mollie->setApiKey($Mollie);

        $payment = $mollie->payments->get($id);
        // dd($payment -> metadata->order_id , $payment -> status);
        // if(!$id == null){
        //     $payment = $mollie->payments->get($id);
        //     dd($payment );
        // }

        $order = Orders::whereId($payment->metadata->order_id)->first();
        switch ($payment->status) {
            case 'paid':

                $order->payment_status = 'Paid';
                $order->save();
                if (! Auth::check()) {
                    $cart = Shopcart::where('session_id', session()->getId())->get();

                } else {
                    $cart = Shopcart::where('user_id', Auth::id())->get();
                }
                foreach ($cart as $item) {
                    $item->delete();
                }

                $OrderItemsData = Order_items::where('order_id', $payment->metadata->order_id)->get();

                // format the date to the right format
                $order->date = date('d-m-Y', strtotime($order->date));

                $coupon = coupon::where('code', $order->coupon_code)->first();

                if ($coupon != null) {
                    $coupon->is_used = $coupon->is_used + 1;
                    $coupon->save();

                    $RedeemCoupon = new RedeemCoupon();
                    $RedeemCoupon->customer_id = $order->customer_id;
                    $RedeemCoupon->coupons_id = $coupon->id;
                    $RedeemCoupon->save();
                }

                $shipping = $order->shippingMethod->type;
                if ($shipping == 'Local_pickup') {
                    $mailConfig = config('mail.from');
                    if ($mailConfig['address'] != 'hello@example.com') {
                        event(new Pickup_mail($order, $OrderItemsData));
                    }
                } else {
                    $mailConfig = config('mail.from');
                    if ($mailConfig['address'] != 'hello@example.com') {
                        event(new Send_Mail_Order($order, $OrderItemsData));
                    }
                    $this->createParcel($order, $OrderItemsData);

                }

                return redirect()->route('successfully_paid');
                break;
            case 'canceled':
                $order->payment_status = 'Not Paid';
                $order->status = 'Canceled';
                $order->save();

                return redirect()->route('cart')->with('error', 'Bestelling is geannuleerd!');
                break;
            case 'failed':

                $order->payment_status = 'Not Paid';
                $order->status = 'Canceled';
                $order->save();
                // $order = Orders::whereId($payment->metadata->order_id)->first();
                // $order->delete();

                return redirect()->route('cart')->with('error', 'Bestelling is mislukt!');
                break;

            default:
                return redirect()->route('cart')->with('error', 'Bestelling is mislukt!');
                break;

        }

    }
}
