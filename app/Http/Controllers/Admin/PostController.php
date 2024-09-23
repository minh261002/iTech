<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostStoreRequest;
use App\Http\Requests\Admin\PostUpdateRequest;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\Interfaces\PostServiceInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;
    protected $postCatalogueRepository;
    protected $postService;

    public function __construct(
        PostRepositoryInterface $postRepository,
        PostCatalogueRepositoryInterface $postCatalogueRepository,
        PostServiceInterface $postService,
    ) {
        $this->postRepository = $postRepository;
        $this->postService = $postService;
        $this->postCatalogueRepository = $postCatalogueRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getQueryBuilderOrderBy('id', 'DESC')->get();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $postCatalogues = $this->postCatalogueRepository->getFlatTree();
        return view('admin.post.create', compact('postCatalogues'));
    }

    public function store(PostStoreRequest $request)
    {
        $this->postService->store($request);

        notyf()->success('Thêm bài viết thành công');
        return redirect()->route('admin.post.index');
    }

    public function edit($id)
    {
        $post = $this->postRepository->findOrFail($id);
        $postCatalogues = $this->postCatalogueRepository->getFlatTree();
        return view('admin.post.edit', compact('post', 'postCatalogues'));
    }

    public function update(PostUpdateRequest $request)
    {
        $this->postService->update($request);

        notyf()->success('Cập nhật bài viết thành công');
        return redirect()->route('admin.post.index');
    }

    public function delete($id)
    {
        $this->postRepository->delete($id);

        notyf()->success('Xóa bài viết thành công');
        return response()->json(['status' => 'success']);
    }
}