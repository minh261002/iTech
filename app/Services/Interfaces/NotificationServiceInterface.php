<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface NotificationServiceInterface
{
    public function notification(Request $request);

    public function delete($id);

    public function read(Request $request);

    public function readAll(Request $request);
}