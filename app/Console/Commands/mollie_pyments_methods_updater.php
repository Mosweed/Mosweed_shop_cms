<?php

namespace App\Console\Commands;

use App\Models\API_configration;
use App\Models\Payments_methods;
use Illuminate\Console\Command;
use Mollie\Api\MollieApiClient;

class mollie_pyments_methods_updater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mollie_pyments_methods_updater';

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
        $this->info('Updating Payments Methods');
        $Mollie = API_configration::getValue('mollie_api_token');

        $test = new MollieApiClient();
        $test->setApiKey($Mollie);
        $Methods = $test->methods->allActive();

        foreach ($Methods as $Method) {

            $Payments_method = Payments_methods::where('Payments_methods_id', $Method->id)->first();
            if ($Payments_method) {
                $Payments_method->delete();
            }

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
                'api_token' => $Mollie,
            ];
            Payments_methods::create($Payments_methods);
        }

        $this->info('Payments Methods Updated');

    }
}
