<?php

namespace Database\Factories;

use App\Models\ProductReviews;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductComments>
 */
class ProductCommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productReview = ProductReviews::query()->inRandomOrder()->first();

        return [
            'product_review_id' => $productReview->id,
            'comment' => $this->faker->sentence(),
            'attachment_1' => $this->faker->imageUrl,
            'attachment_2' => $this->faker->imageUrl
        ];
    }
}
