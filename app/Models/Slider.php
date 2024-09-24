<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(SliderItem::class, 'slider_id')->orderBy('position', 'asc');
    }

    public function scopeActive($query)
    {
        $query->where('status', 2);
    }
}