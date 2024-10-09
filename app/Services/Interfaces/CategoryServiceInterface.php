<?php

namespace App\Services\Interfaces;
use Illuminate\Http\Request;

interface CategoryServiceInterface
{
    public function store(Request $request);
    public function update(Request $request);
    public function updateStatus(Request $request);
    public function delete(Request $request);

}
