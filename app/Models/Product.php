<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'discount'
    ];

    protected $appends = ['actual_price', 'average_review'];

    public function categories() {
        return $this->belongsToMany(ProductCategories::class, 'product_category_pivots', 'product_id', 'product_category_id');
    }

    public function reviews() {
        return $this->hasMany(ProductReviews::class, 'product_id');
    }

    public function getActualPriceAttribute()
    {
        $price = $this->price;
        $discount = $this->discount;

        if((int)$discount <= 0) {
            return $price;
        }

        return round($price - ($discount / 100) * $price, 2);
    }

    public function getAverageReviewAttribute() {
        return ceil($this->reviews()->avg('stars'));
    }

}
