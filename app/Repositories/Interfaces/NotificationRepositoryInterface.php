<?php

namespace App\Repositories\Interfaces;

interface NotificationRepositoryInterface extends EloquentRepositoryInterface
{
    public function countUnreadNotifications($admin_id);

    public function getByAdminId($admin_id);

    public function readAll($admin_id);

    public function deleteAll($admin_id);
}