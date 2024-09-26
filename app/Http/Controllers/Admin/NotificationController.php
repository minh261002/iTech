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

        notyf()->success('Gửi thông báo thành công');
        return redirect()->route('admin.notification.index');
    }

    public function delete($id)
    {
        $this->notificationService->delete($id);

        notyf()->success('Xoá thông báo thành công');
        return response()->json([
            'status' => 'success',
        ]);
    }

}