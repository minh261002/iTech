<?php

namespace App\Services;

use App\Events\NotificationEvent;
use App\Models\Admin;
use App\Models\User;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Services\Interfaces\NotificationServiceInterface;
use Illuminate\Http\Request;
use Log;

class NotificationService implements NotificationServiceInterface
{
    protected $notificationRepository;

    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function notification(Request $request)
    {
        $data = $request->validated();
        $notificationTypes = $data['types'];

        switch ($notificationTypes) {
            case 1:
                $this->notifyAll($data);
                break;
            case 2:
                $this->notifyUsers($data);
                break;
            case 3:
                $this->notifyAdmins($data);
                break;
            default:
                break;
        }
    }

    protected function notifyAll($data)
    {
        $users = User::all();
        $admins = Admin::all();

        foreach ($users as $user) {
            $this->sendNotification($data, $user->id);
        }

        foreach ($admins as $admin) {
            $adminId = \Auth::guard('admin')->user()->id;
            if ($admin->id == $adminId) {
                continue;
            }
            $this->sendNotification($data, $admin->id, true);
        }
    }

    protected function notifyUsers($data)
    {
        if ($data['user_types'] == 1) {
            $users = User::all();
            foreach ($users as $user) {
                $this->sendNotification($data, $user->id);
            }
        } else {
            foreach ($data['user_id'] as $userId) {
                $this->sendNotification($data, $userId);
            }
        }
    }

    protected function notifyAdmins($data)
    {
        if ($data['admin_types'] == 1) {
            $admins = Admin::all();
            foreach ($admins as $admin) {
                $adminId = \Auth::guard('admin')->user()->id;
                if ($admin->id == $adminId) {
                    continue;
                }
                $this->sendNotification($data, $admin->id, true);
            }
        } else {
            foreach ($data['admin_id'] as $adminId) {
                $this->sendNotification($data, $adminId, true);
            }
        }
    }

    protected function sendNotification($data, $recipientId, $isAdmin = false)
    {
        if ($isAdmin) {
            $data['admin_id'] = $recipientId;
            $data['user_id'] = null;
        } else {
            $data['user_id'] = $recipientId;
            $data['admin_id'] = null;
        }
        $noty = $this->notificationRepository->create($data);

        $body = [
            'content' => $noty->content,
            'created_at' => $noty->created_at,
            'notyId' => $noty->id,
        ];

        broadcast(new NotificationEvent(
            $noty->title,
            $body,
            $isAdmin ? $noty->admin_id : $noty->user_id,
            $isAdmin ? 'admin' : 'user',
        ))->toOthers();
    }

    public function delete($id)
    {
        return $this->notificationRepository->delete($id);
    }

    public function read($request)
    {
        $data = $request->all();
        $id = $data['id'];
        $admin_id = $data['admin_id'];

        $noty = $this->notificationRepository->find($id);

        if ($noty->admin_id == $admin_id) {
            $noty->update(['is_read' => 2]);
        }

        return $noty;
    }

    public function readAll($request)
    {
        dd($request->all());
    }
}