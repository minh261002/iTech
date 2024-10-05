<?php

namespace App\Http\Controllers\Admin\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use App\Repositories\Interfaces\AttributeVariationRepositoryInterface;
use App\Repositories\Interfaces\Product\ProductVariationRepositoryInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Traits\Setup;

class ProductVariationController extends Controller
{
    use Setup;
    protected $repositoryAttribute;
    protected $repositoryAttributeVariation;
    protected $repository;
    protected $service;

    public function __construct(
        ProductVariationRepositoryInterface $repository,
        AttributeRepositoryInterface $repositoryAttribute,
        AttributeVariationRepositoryInterface $repositoryAttributeVariation,
        ProductServiceInterface $service
    ) {
        $this->repository = $repository;
        $this->repositoryAttribute = $repositoryAttribute;
        $this->repositoryAttributeVariation = $repositoryAttributeVariation;
        $this->service = $service;
    }

    public function check(Request $request)
    {
        return view('admin.product.components.box_variation')->render();
    }

    public function create(Request $request)
    {
        $instance = $this->service->createProductVariations($request);

        return $instance;
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        return response()->json([
            'status' => 200,
        ], 200);
    }
}