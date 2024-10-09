<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.Admin.{adminId}', function ($admin, $adminId) {
    return $admin->id === (int) $adminId;
}, ['guards' => ['admin']]);

Broadcast::channel('App.Models.User.{userId}', function ($user, $userId) {
    return $user->id === (int) $userId;
}, ['guards' => ['web']]);