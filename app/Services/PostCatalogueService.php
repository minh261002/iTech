<?php

namespace App\Services;

use App\Models\PostCatalogue;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface;
use App\Services\Interfaces\PostCatalogueServiceInterface;
use Illuminate\Http\Request;

class PostCatalogueService implements PostCatalogueServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    public function __construct(PostCatalogueRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {

        $this->data = $request->validated();

        return $this->repository->create($this->data);
    }

    public function update(Request $request)
    {

        $this->data = $request->validated();

        return $this->repository->update($this->data['id'], $this->data);

    }

    public function updateStatus(Request $request)
    {
        $this->data = $request->all();
        return $this->repository->update($this->data['catalogue_id'], $this->data);

    }

    public function delete($id)
    {
        return $this->repository->delete($id);

    }

}