<?php

namespace App\Providers;

use App\Models\emailconfiguratie;
use Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(125);

        if (Schema::hasTable('emailconfiguraties')) {

            $emailConfiguration = emailconfiguratie::where('status', 'Active')->first();
            if ($emailConfiguration) {
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
                        'name' => 'yazan',
                    ],
                ];
                Config::set('mail', $data);
            }
        }

    }
}
