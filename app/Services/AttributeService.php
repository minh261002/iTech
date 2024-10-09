<?php

namespace App\Services;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use App\Services\Interfaces\AttributeServiceInterface;

class AttributeService implements AttributeServiceInterface
{
    protected $attributeRepository;

    public function __construct(AttributeRepositoryInterface $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function store($request)
    {
        $data = $request->validated();

        return $this->attributeRepository->create($data);
    }

    public function update($request)
    {
        $data = $request->validated();
        $attrId = $data['id'];

        return $this->attributeRepository->update($attrId, $data);
    }

    public function delete($id)
    {
       return $this->attributeRepository->delete($id);
    }
}