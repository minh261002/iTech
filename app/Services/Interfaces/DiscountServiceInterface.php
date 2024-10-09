<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface DiscountServiceInterface
{
    public function create(Request $request);

    public function updateStatus(Request $request);

    public function update(Request $request);

    public function delete($id);
}
