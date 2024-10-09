<?php

namespace App\Repositories\Interfaces;

use App\Repositories\Interfaces\EloquentRepositoryInterface;
use App\Models\Post;

interface PostRepositoryInterface extends EloquentRepositoryInterface
{
    public function findOrFailWithRelations($id, array $relations = ['categories']);
    public function attachCatalogues(Post $post, array $cataloguesId);
    public function syncCatalogues(Post $post, array $cataloguesId);
	public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}