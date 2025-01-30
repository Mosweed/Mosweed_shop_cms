<?php

namespace App\Listeners;

use App\Events\User_Go_to_Checkout;
use App\Models\Mollie_pyments_methods;
use App\Models\Payments_methods;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mollie\Api\MollieApiClient;

class User_Go_to_Checkout_Listener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(User_Go_to_Checkout $event): void
    {
        // $Mollie = Payments_methods::first();

        $test = new MollieApiClient();
        $test->setApiKey($event->key);
        $Methods = $test->methods->allActive();

        $data = Mollie_pyments_methods::all();
        foreach ($data as $item) {
            $item->delete();
        }

        foreach ($Methods as $Method) {

            $status = '';
            if ($Method->status == 'activated') {
                $status = 'active';
            } else {
                $status = 'inactive';

            }

            $Payments_methods = [
                'Payments_methods_id' => $Method->id,
                'description' => $Method->description,
                'image' => $Method->image->size2x,
                'status' => $status,
                'api_token' => $event->key,
            ];
            Mollie_pyments_methods::create($Payments_methods);
        }
    }
}
