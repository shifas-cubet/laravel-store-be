<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductReviews;
use Database\Factories\ProductReviewsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::all()->each(function ($product) {

            ProductReviews::factory()
                ->count(1)
                ->create();

        });
    }
}
