<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductCategoryPivot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategoryPivotsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::all()->each(function ($product) {

            $category = ProductCategories::query()->inRandomOrder()->first();

            ProductCategoryPivot::factory()
                ->count(1)
                ->create(['product_id' => $product->id, 'product_category_id' => $category->id]);
        });

    }
}
