<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountApplication extends Model
{
    use HasFactory;

    protected $table = 'discount_applications';

    protected $fillable = [
        'discount_id',
        'user_id',
        'product_id',
        'product_variation_id',
    ];

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function productVariation()
    {
        return $this->belongsTo(ProductVariation::class, 'product_variation_id');
    }
}