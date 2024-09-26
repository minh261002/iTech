<?php

namespace App\Repositories;

use App\Models\Notification;
use App\Repositories\Interfaces\NotificationRepositoryInterface;

class NotificationRepository extends EloquentRepository implements NotificationRepositoryInterface
{
    public function getModel(){
        return Notification::class;
    }
}