<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Menu;
use App\Models\Payments_methods;
use App\Models\Role;
use App\Models\User;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(ProductSeeder::class);
        $this->call(ShippingMethodsSeeder::class);
        $this->call(CouponSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(APIConfigrationSeeder::class);

        Payments_methods::create([
            'Payments_methods_id' => 'cash',
            'description' => 'Cash',
            'image' => 'http://127.0.0.1:8000/storage/images/cash.png',
            'status' => "active",
            'api_token' => null
        ]);

      

        $roles = [
            ['id' => 1, 'name' => 'Admin'],
            ['id' => 2, 'name' => 'Beheerder'],
            ['id' => 3, 'name' => 'Klant'],
        ];

        foreach ($roles as $role) {
            // create the role
            Role::create($role);
        }

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Admin123'),
            'role' => 1,
        ]);

        Customer::create([
            'user_id' => $user->id,
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@gmail.com',
            'phonenumber' => '0612345678',

        ]);
    }
}