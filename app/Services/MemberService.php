<?php

namespace App\Services;

use App\Repositories\Interfaces\MemberRepositoryInterface;
use App\Services\Interfaces\MemberServiceInterface;
use Illuminate\Http\Request;

class MemberService implements MemberServiceInterface
{
    protected $memberRepository;

    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function store(Request $request)
    {
        $data = $request->validated();

        $data['username'] = explode('@', $data['email'])[0];
        $data['password'] = bcrypt($data['password']);

        unset($data['password_confirmation']);

        return $this->memberRepository->create($data);
    }

    public function update(Request $request)
    {
        $data = $request->validated();
        $member_id = $data['id'];

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
            unset($data['password_confirmation']);
        }


        return $this->memberRepository->update($member_id, $data);
    }

    public function updateStatus(Request $request)
    {
        $data = $request->all();
        $member_id = $data['member_id'];

        return $this->memberRepository->update($member_id, $data);
    }

    public function delete($id)
    {
        return $this->memberRepository->delete($id);
    }
}