<?php

namespace App\Repositories;

use App\Models\Notification;
use App\Repositories\Interfaces\NotificationRepositoryInterface;

class NotificationRepository extends EloquentRepository implements NotificationRepositoryInterface
{
    public function getModel()
    {
        return Notification::class;
    }

    public function countUnreadNotifications($admin_id)
    {
        return $this->model->where('admin_id', $admin_id)->where('is_read', 1)->count();
    }

    public function getByAdminId($admin_id)
    {
        return $this->model->where('admin_id', $admin_id)->orderBy('created_at', 'desc')->get();
    }
}