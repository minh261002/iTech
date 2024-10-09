<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\MemberRepositoryInterface;

class MemberRepository extends EloquentRepository implements MemberRepositoryInterface
{
    /**
     * get model
     *
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }


}