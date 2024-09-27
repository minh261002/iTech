<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotificationStoreRequest;
use App\Models\Admin;
use App\Models\User;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Services\Interfaces\NotificationServiceInterface;
use Illuminate\Http\Request;

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

        return response()->json([
            'status' => 'success',
        ]);
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
        //
    }
}
