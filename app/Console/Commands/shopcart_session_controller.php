<?php

namespace App\Console\Commands;

use App\Models\Sessions;
use App\Models\Shopcart;
use Illuminate\Console\Command;

class shopcart_session_controller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:shopcart_session_controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $shopcart = Shopcart::where('session_id', '!=', null)->get();
        // check if there is any shopcart with session id
        if ($shopcart->count() > 0) {

            foreach ($shopcart as $cart) {
                $session = Sessions::where('id', $cart->session_id)->first();

                if ($session == null) {
                    $cart->delete();
                }

            }
        }

    }
}
