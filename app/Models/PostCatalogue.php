<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use App\Helpers\Sluggable;

class PostCatalogue extends Model
{
    use HasFactory, NodeTrait, Sluggable;

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

    protected static function boot()
    {
        parent::boot();
    }
    public function isPublished()
    {
        return $this->status == 2;
    }

    public function categories()
    {
        return $this->belongsToMany(PostCatalogue::class, 'post_catalogue_post', 'post_catalogue_id', 'post_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 2);
    }
}