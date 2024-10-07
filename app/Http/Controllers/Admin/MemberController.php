<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberStoreRequest;
use App\Http\Requests\Admin\MemberUpdateRequest;
use App\Models\Province;
use App\Repositories\Interfaces\MemberRepositoryInterface;
use App\Services\Interfaces\MemberServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    protected $memberRepository;
    protected $memberService;

    public function __construct(
        MemberRepositoryInterface $memberRepository,
        MemberServiceInterface $memberService
    ) {
        $this->memberRepository = $memberRepository;
        $this->memberService = $memberService;
    }

    public function index(): View
    {
        $members = $this->memberRepository->getAll();
        return view('admin.member.index', compact('members'));
    }

    public function create(): View
    {
        $provinces = Province::all();
        return view('admin.member.create', compact('provinces'));
    }

    public function store(MemberStoreRequest $request)
    {
        $this->memberService->store($request);

        notyf()->success('Thêm thành viên mới thành công');
        return redirect()->route('admin.member.index');
    }

    public function edit($id): View
    {
        $member = $this->memberRepository->findOrFail($id);
        $provinces = Province::all();
        return view('admin.member.edit', compact('member', 'provinces'));
    }

    public function update(MemberUpdateRequest $request)
    {
        $this->memberService->update($request);

        notyf()->success('Cập nhật thành viên thành công');
        return redirect()->back();
    }

    public function updateStatus(Request $request)
    {
        $this->memberService->updateStatus($request);

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function delete($id)
    {
        $this->memberService->delete($id);

        notyf()->success('Xóa thành viên thành công');
        return response()->json([
            'status' => 'success',
        ]);
    }
}