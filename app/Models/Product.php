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

    public function categories() {
        return $this->belongsToMany(ProductCategories::class, 'product_category_pivot');
    }

    public function reviews() {
        return $this->hasMany(ProductReviews::class, 'product_id');
    }
}
