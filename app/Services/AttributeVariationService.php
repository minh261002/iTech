<?php

namespace App\Services;

use App\Repositories\Interfaces\AttributeVariationRepositoryInterface;
use App\Services\Interfaces\AttributeVariationServiceInterface;

class AttributeVariationService implements AttributeVariationServiceInterface
{
    protected $attributeVariationRepository;

    public function __construct(AttributeVariationRepositoryInterface $attributeVariationRepository)
    {
        $this->attributeVariationRepository = $attributeVariationRepository;
    }

    public function store($request)
    {
        $data = $request->validated();

        return $this->attributeVariationRepository->create($data);
    }

    public function update($request)
    {
        $data = $request->validated();
        $varId = $data['id'];

        return $this->attributeVariationRepository->update($varId, $data);
    }

    public function delete($id)
    {
        return $this->attributeVariationRepository->delete($id);
    }
}