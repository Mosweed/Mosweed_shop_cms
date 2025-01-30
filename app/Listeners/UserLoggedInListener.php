<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\Shopcart;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLoggedInListener implements ShouldQueue
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
    public function handle(UserLoggedIn $event): void
    {
        $cart = Shopcart::where('session_id', $event->session_id)->get();

        if ($cart->count() > 0) {
            foreach ($cart as $item) {
                $item->user_id = $event->user_id;
                $item->session_id = null;
                $item->save();
            }

        }

    }
}
