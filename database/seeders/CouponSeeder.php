<?php

namespace Database\Seeders;

use App\Models\coupon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function generateUniqueCode()
    {
        $code = strtoupper(Str::random(10)); // Generate a random 10-character string
        while (coupon::where('code', $code)->exists()) {
            $code = strtoupper(Str::random(10)); // Keep generating until a unique code is found
        }

        return $code;
    }

    public function run(): void
    {
        // Define the number of coupons to create
        $numberOfCoupons = 10;

        for ($i = 0; $i < $numberOfCoupons; $i++) {
            coupon::create([
                'name' => 'Coupon '.($i + 1),
                'code' => $this->generateUniqueCode(),
                'start_date' => now(),
                'end_date' => now()->addMonth(),
                'percentage' => rand(10, 50), // Random discount between 10% and 50%
                //'fast_price' => rand(1000, 10000) / 100, // Random fast price between $10.00 and $100.00
            ]);
        }
    }
}
