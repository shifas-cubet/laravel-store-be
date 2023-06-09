<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComments extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'attachment_1',
        'attachment_2'
    ];

    public function review() {
        return $this->belongsTo(ProductReviews::class, 'product_review_id');
    }
}
