<?php

namespace App\Models;

use App\Helpers\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'position',
        'status',
        'parent_id',
    ];
}