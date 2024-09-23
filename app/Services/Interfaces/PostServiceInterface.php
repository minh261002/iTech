<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface PostServiceInterface
{

    public function store(Request $request);

    public function update(Request $request);

    public function delete($id);

}