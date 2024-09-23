<?php

namespace App\Repositories;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{

    protected $select = [];

    public function getModel()
    {
        return Post::class;
    }
    public function findOrFailWithRelations($id, array $relations = ['catalogues'])
    {
        $this->findOrFail($id);
        $this->instance = $this->instance->load($relations);
        return $this->instance;
    }

    public function attachCatalogues(Post $post, array $cataloguesId)
    {
        return $post->catalogues()->attach($cataloguesId);
    }

    public function syncCatalogues(Post $post, array $cataloguesId)
    {
        return $post->catalogues()->sync($cataloguesId);
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}