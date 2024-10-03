<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;
    protected $table = 'product_variations';

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function attributeVariations(){
        return $this->belongsToMany(AttributeVariation::class, 'product_variation_variations', 'product_variation_id', 'attribute_variation_id')->orderBy('position', 'asc');
    }
}