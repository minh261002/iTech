<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.Admin.{adminId}', function ($admin, $adminId) {
    return $admin->id === $adminId;
});

Broadcast::channel('App.Models.User.{userId}', function ($user, $userId) {
    return $user->id === $userId;
});