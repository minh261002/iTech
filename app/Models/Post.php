<?php

namespace App\Models;

use App\Helpers\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'is_featured',
        'image',
    ];

    protected $guarded = [];

    protected $columnSlug = 'title';

    protected static function boot()
    {
        parent::boot();
    }

    public function isFeatured(){
        return $this->is_featured == 1;
    }

    public function isPublished(){
        return $this->status == 2;
    }

    public function catalogues(){
        return $this->belongsToMany(PostCatalogue::class, 'post_catalogue_posts', 'post_id', 'post_catalogue_id');
    }

    public function scopeFeatured($query){
        return $query->where('is_featured', 1);
    }

    public function scopePublished($query){
        return $query->where('status',2);
    }

    public function scopeHasCatalogues($query, array $cataloguesId){
        return $query->whereHas('catalogues', function($query) use($cataloguesId) {
            $query->whereIn('id', $cataloguesId);
        });
    }
}