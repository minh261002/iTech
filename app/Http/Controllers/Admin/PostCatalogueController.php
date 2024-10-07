<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostCatalogueStoreRequest;
use App\Http\Requests\Admin\PostCatalogueUpdateRequest;
use App\Models\PostCatalogue;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface;
use App\Services\Interfaces\PostCatalogueServiceInterface;
use Illuminate\Http\Request;

class PostCatalogueController extends Controller
{

    protected $repository;
    protected $service;

    public function __construct(
        PostCatalogueRepositoryInterface $repository,
        PostCatalogueServiceInterface $service
    ) {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        $post_catalogues = $this->repository->getFlatTree();
        return view('admin.post_catalogue.index', compact('post_catalogues'));
    }

    public function create()
    {
        $post_catalogues = $this->repository->getFlatTree();
        return view('admin.post_catalogue.create', compact('post_catalogues'));
    }

    public function store(PostCatalogueStoreRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('admin.post.catalogue.index');
    }

    public function edit($id)
    {
        $post_catalogue = $this->repository->find($id);
        $post_catalogues = $this->repository->getFlatTree();
        return view('admin.post_catalogue.edit', compact('post_catalogue', 'post_catalogues'));
    }

    public function update(PostCatalogueUpdateRequest $request)
    {
        $this->service->update($request);

        notyf()->success('Cập nhật danh mục thành công');
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->service->delete($id);
        notyf()->success('Xóa danh mục thành công');

        return response()->json(['status' => 'success']);
    }

    public function updateStatus(Request $request)
    {
        $this->service->updateStatus($request);
        return response()->json(['status' => 'success']);
    }

    public function get()
    {
        $offset = request()->get('offset', 0);
        $limit = 10;

        $catalogues = $this->repository->getFlatTree();
        $cataloguesArray = $catalogues->toArray();

        if (request()->has('search')) {
            $search = request()->get('search');
            $cataloguesArray = array_filter($cataloguesArray, function ($catalogue) use ($search) {
                return strpos($catalogue['name'], $search) !== false;
            });
        }

        $total = count($cataloguesArray);

        $cataloguesArray = array_slice($cataloguesArray, $offset, $limit);

        return response()->json([
            'catalogues' => $cataloguesArray,
            'total' => $total
        ]);
    }
}