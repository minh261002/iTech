<?php

namespace App\Services;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\Interfaces\PostServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostService implements PostServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {

        $this->data = $request->validated();

        $dataPost = $request->only('title', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'status', 'is_featured', 'image');
        $cataloguesId = $this->data['catalogue_id'];

        DB::beginTransaction();
        try {
            $post = $this->repository->create($dataPost);

            $this->repository->attachCatalogues($post, $cataloguesId ?? []);
            DB::commit();
            return $post;
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            return false;
        }
    }

    public function update(Request $request)
    {

        $this->data = $request->validated();
        $this->data['is_featured'] = $this->data['is_featured'] ?? 0;

        $cataloguesId = $this->data['catalogue_id'];
        unset($this->data['catalogues_id']);
        DB::beginTransaction();

        try {
            $post = $this->repository->update($this->data['id'], $this->data);

            $this->repository->syncCatalogues($post, $cataloguesId ?? []);
            DB::commit();
            return $post;
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            return false;
        }

    }

    public function delete($id)
    {
        return $this->repository->delete($id);

    }

}