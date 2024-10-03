<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface AttributeServiceInterface
{
    public function store(Request $reuqest);

    public function update(Request $reuqest);

    public function delete($id);
}