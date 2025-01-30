<?php

namespace Database\Seeders;

use App\Models\API_configration;
use Illuminate\Database\Seeder;

class APIConfigrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiConfigration = [
            'mollie_api_token' => null,
            'sendcloud_api_token' => null,
            'sendcloud_api_secret' => null,
        ];

        foreach ($apiConfigration as $config => $value) {
            API_configration::create([
                'key' => $config,
                'value' => $value,
            ]);
        }

    }
}