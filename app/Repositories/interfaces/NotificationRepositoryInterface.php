<?php

namespace App\Repositories\Interfaces;

interface NotificationRepositoryInterface extends EloquentRepositoryInterface
{
    public function countUnreadNotifications($admin_id);

    public function getByAdminId($admin_id);
}