<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(20)->create();

        $product_ids = Product::select('id')->get();

        foreach ($product_ids as $product_id) {
            $product_id->addMediaFromUrl(fake()->imageUrl())->toMediaCollection();
        }
    }
}
