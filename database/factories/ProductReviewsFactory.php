<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductReviews>
 */
class ProductReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::query()->inRandomOrder()->first();
        $user = User::query()->inRandomOrder()->first();

        return [
            'product_id' => $product->id,
            'user_id' => $user->id,
            'stars' => $this->faker->randomFloat(1, 1, 5)
        ];
    }
}
