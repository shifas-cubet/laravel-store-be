<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function products() {
        return $this->belongsToMany(Product::class, 'product_category_pivots', 'product_category_id', 'product_id');
    }


}
