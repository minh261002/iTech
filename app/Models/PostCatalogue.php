<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCatalogue extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'post_catalogues';

    protected $fillable = [
        '_lft',
        '_rgt',
        'parent_id',
        'name',
        'image',
        'slug',
        'position',
        'status',
        'desc'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}