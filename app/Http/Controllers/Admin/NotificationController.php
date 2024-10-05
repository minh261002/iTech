<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotificationStoreRequest;
use App\Models\Admin;
use App\Models\User;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Services\Interfaces\NotificationServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    protected $notificationService;
    protected $notificationRepository;

    public function __construct(
        NotificationServiceInterface $notificationService,
        NotificationRepositoryInterface $notificationRepository,
    ) {
        $this->notificationService = $notificationService;
        $this->notificationRepository = $notificationRepository;
    }

    public function index()
    {
        $notifications = $this->notificationRepository->getAll();
        return view('admin.notification.index', compact('notifications'));
    }

    public function create()
    {
        $users = User::orderBy('id', 'desc')->get();
        $admins = Admin::orderBy('id', 'desc')->get();
        return view('admin.notification.create', compact('users', 'admins'));
    }

    public function store(NotificationStoreRequest $request)
    {
        $this->notificationService->notification($request);

        notyf()->success('Gửi thông báo thành công');
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->notificationService->delete($id);

        notyf()->success('Xoá thông báo thành công');
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function get(Request $request)
    {
        $notifications = $this->notificationRepository->getByAdminId($request->admin_id);

        return response()->json([
            'status' => 'success',
            'notifications' => $notifications,
        ]);
    }

    public function read(Request $request)
    {
        $this->notificationService->read($request);

        return response()->json([
            'status' => 'success',
            'unreadNotifications' => $this->notificationRepository->countUnreadNotifications($request->admin_id),
        ]);
    }

    public function readAll(Request $request)
    {
        $admin_id = $request->admin_id;
        $this->notificationRepository->readAll($admin_id);

        return view('admin.notification.components.box_notificaiton', [
            'notifications' => $this->notificationRepository->getByAdminId($admin_id),
        ])->render();
    }

    public function myNotification(): View
    {
        return view('admin.notification.my');

    }

    function getMyNotification()
    {
        $notifications = $this->notificationRepository->getByAdminId(auth('admin')->user()->id);

        return view('admin.notification.components.box_notificaiton', compact('notifications'))->render();
    }

    function showNotification($id)
    {
        $notification = $this->notificationRepository->findOrFail($id);
        $this->notificationRepository->update($notification->id, ['is_read' => 2]);
        return view('admin.notification.components.container_notification', compact('notification'))->render();
    }

    public function deleteNotification($id)
    {
        $this->notificationRepository->delete($id);

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function deleteAll()
    {
        $this->notificationRepository->deleteAll(auth('admin')->user()->id);

        return view('admin.notification.components.box_notificaiton', [
            'notifications' => $this->notificationRepository->getByAdminId(auth('admin')->user()->id),
        ])->render();
    }
}