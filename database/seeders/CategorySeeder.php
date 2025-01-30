<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create  30 new category

        $categories = [

            'Home',
            'Garden',
            'Tools',
            'Grocery',
            'Beauty',
            'Health',
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
            ]);
        }
    }
}
