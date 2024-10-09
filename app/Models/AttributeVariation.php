<?php

namespace App\Models;

use App\Helpers\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeVariation extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'attribute_variations';

    protected $guarded = [];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}