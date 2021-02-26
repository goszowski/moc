<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'standard',
            'is_active' => true,
            'is_archived' => false,
            'min_sum' => 1000.00,
            'max_sum' => 10000.00,
            'min_term' => 1,
            'max_term' => 14,
            'percent_per_day' => 5.00,
            'penalty_per_day' => 5.00,
        ]);
    }
}
