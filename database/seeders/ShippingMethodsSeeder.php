<?php

namespace Database\Seeders;

use App\Models\Shipping_methods;
use Illuminate\Database\Seeder;

class ShippingMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $shippingMethods = [

            [
                'name' => 'Free Shipping',
                'enabled' => true,
                'image' => 'free-shipping.png',
                'type' => 'Free',
                'cost' => 10.00,
                'min_order_amount' => 50,

            ],

            [
                'name' => 'Flat Rate',
                'enabled' => true,
                'image' => 'flat-rate.png',
                'type' => 'Fixed_rate',
                'cost' => 5.99,
            ],

            [
                'name' => 'Local Pickup',
                'enabled' => true,
                'image' => 'local-pickup.png',
                'type' => 'Local_pickup',
                'cost' => 0,
            ],

        ];

        foreach ($shippingMethods as $shippingMethod) {
            Shipping_methods::create($shippingMethod);
        }

    }
}
