<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductCategoryPivot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductCategoryPivotFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategoryPivot::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::query()->inRandomOrder()->first();
        $category = ProductCategories::query()->inRandomOrder()->first();

        return [
            'product_id' => $product->id,
            'product_category_id' => $category->id
        ];
    }
}
