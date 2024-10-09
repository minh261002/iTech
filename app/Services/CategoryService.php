<?php

namespace App\Services;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Http\Request;


class CategoryService implements CategoryServiceInterface
{
    protected $repository;
    protected $data;

    public function __construct(CategoryRepositoryInterface $repository)
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
        return $this->repository->update($this->data['category_id'], $this->data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);

    }
}