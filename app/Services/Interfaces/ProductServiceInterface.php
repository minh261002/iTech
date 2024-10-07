<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface ProductServiceInterface
{
    public function store(Request $request);

    public function update(Request $request);

    public function updateStatus(Request $request);

    public function createProductVariations(Request $request);

    public function delete($id);
}