<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_name' => 'Ferdy',
            'category' => 'Male',
            'price' => '5000000',
            'quantity' => '73',
        ]);
        Product::create([
            'product_name' => 'Hahan',
            'category' => 'Male',
            'price' => '5000000',
            'quantity' => '73',
        ]);
        Product::create([
            'product_name' => 'Pradana',
            'category' => 'Male',
            'price' => '5000000',
            'quantity' => '73',
        ]);
    }
}
