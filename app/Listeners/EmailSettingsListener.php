<?php

namespace App\Listeners;

use App\Events\EmailSettings;
use App\Mail\TestEmail;
use Config;
use Illuminate\Support\Facades\Crypt;
use Mail;

class EmailSettingsListener
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
    public function handle(EmailSettings $event): void
    {

        //SupportSleep::fake();

        $emailConfiguration = $event->emailConfigurations;

        $password = Crypt::decryptString($emailConfiguration->password);

        $data = [
            'driver' => 'smtp',
            'host' => $emailConfiguration->host,
            'port' => $emailConfiguration->port,
            'encryption' => $emailConfiguration->encryption,
            'username' => $emailConfiguration->email_from,
            'password' => $password,
            'from' => [
                'address' => $emailConfiguration->email_from,
                'name' => $emailConfiguration->name_from,
            ],
        ];
        Config::set('mail', $data);

        Mail::to($emailConfiguration->email_from)->send(new TestEmail());

    }
}
