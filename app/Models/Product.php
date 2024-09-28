<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
    }

    public function isSimple()
    {
        return $this->type == 1; //sản phẩm đơn giản
    }

    public function isVariable()
    {
        return $this->type == 2; //sản phẩm biến thể
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id')->orderBy('position', 'asc');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, ProductAttribute::class, 'product_id', 'attribute_id')->orderBy('position', 'asc');
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id')->orderBy('position', 'asc');
    }

    public function productVariations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id')->orderBy('position', 'asc');
    }

    public function productVariation()
    {
        return $this->hasOne(ProductVariation::class, 'product_id');
    }
}