<?php

namespace App\Models;

use App\Helpers\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, Sluggable, NodeTrait;

    protected $table = 'categories';

    protected $fillable = [
        '_lft',
        '_rgt',
        'name',
        'slug',
        'image',
        'position',
        'status',
        'parent_id',
        'desc',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected static function boot()
    {
        parent::boot();
    }
    public function isPublished()
    {
        return $this->status == 2;
    }

    // public function posts()
    // {
    //     return $this->belongsToMany(Post::class, 'post_catalogue_posts', 'post_catalogue_id', 'post_id');
    // }


    public function scopePublished($query)
    {
        return $query->where('status', 2);
    }
}