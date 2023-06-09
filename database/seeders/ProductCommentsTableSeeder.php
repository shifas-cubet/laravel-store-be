<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductComments;
use App\Models\ProductReviews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductReviews::all()->each(function ($product) {
            ProductComments::factory()
                ->count(1)
                ->create();
        });
    }
}
