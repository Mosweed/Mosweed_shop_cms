<?php

namespace App\Providers;

use App\Events\Admin_mail;
use App\Events\EmailSettings;
use App\Events\Pickup_mail;
use App\Events\Send_Mail_Order;
use App\Events\User_Go_to_Checkout;
use App\Events\UserLoggedIn;
use App\Listeners\Admin_mail_Listener;
use App\Listeners\EmailSettingsListener;
use App\Listeners\Pickup_mail_Listener;
use App\Listeners\Send_Mail_Order_Listener;
use App\Listeners\User_Go_to_Checkout_Listener;
use App\Listeners\UserLoggedInListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserLoggedIn::class => [
            UserLoggedInListener::class,
        ],

        User_Go_to_Checkout::class => [
            User_Go_to_Checkout_Listener::class,
        ],
        Send_Mail_Order::class => [
            Send_Mail_Order_Listener::class,
        ],
        EmailSettings::class => [
            EmailSettingsListener::class,
        ],
        Pickup_mail::class => [
            Pickup_mail_Listener::class,
        ],
        Admin_mail::class => [
            Admin_mail_Listener::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
