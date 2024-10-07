<?php

namespace App\Models;

use App\Helpers\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'attributes';

    protected $guarded = [];

    public function variations(){
        return $this->hasMany(AttributeVariation::class, 'attribute_id')->orderBy('position', 'asc');
    }
}