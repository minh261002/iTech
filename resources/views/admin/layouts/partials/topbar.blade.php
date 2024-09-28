@php
    $notifications = App\Models\Notification::where('admin_id', Auth::guard('admin')->user()->id)
        ->orderBy('created_at', 'desc')
        ->get();

    $unreadNotifications = App\Models\Notification::where('admin_id', Auth::guard('admin')->user()->id)
        ->where('is_read', 1)
        ->orderBy('created_at', 'desc')
        ->get();
@endphp

<div class="topbar-custom">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                <li>
                    <button class="button-toggle-menu nav-link">
                        <i data-feather="menu" class="noti-icon"></i>
                    </button>
                </li>
            </ul>
            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <i data-feather="bell" class="noti-icon"></i>

                        <span class="badge bg-danger rounded-circle noti-icon-badge" id="countUnreadNotification">
                            {{ $unreadNotifications->count() }}
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-end">
                                    @if ($unreadNotifications->count() > 0)
                                        <a class="text-dark">
                                            <small>Xoá hết</small>
                                        </a>
                                    @endif

                                </span>Thông báo
                            </h5>
                        </div>

                        <div class="noti-scroll" data-simplebar>
                            @forelse ($notifications as $notification)
                                <a href="{{ route('admin.myNotification', ['id' => $notification->id]) }}"
                                    class="dropdown-item notify-item text-muted link-primary {{ $notification->is_read == 1 ? 'active' : '' }}">
                                    <div class="notify-icon">
                                        <i data-feather="bell" class="text-success"></i>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="notify-details">
                                            Thông báo
                                        </p>
                                        <small class="text-muted">
                                            {{ format_datetime($notification->created_at) }}
                                        </small>
                                    </div>
                                    <p class="mb-0 user-msg">
                                        <small class="fs-14">
                                            {!! $notification->content !!}
                                        </small>
                                    </p>
                                </a>
                            @empty
                                <div class="dropdown-item notify-item text-muted link-primary">
                                    <div class="d-flex align-items-center justify-content-center notify-details">
                                        Không có thông báo mới
                                    </div>
                                </div>
                            @endforelse

                        </div>

                        <!-- All-->
                        <a href="{{ route('admin.myNotification') }}"
                            class="dropdown-item text-center text-primary notify-item notify-all">
                            Xem tất cả
                            <i class="fe-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link " href="" role="button" aria-haspopup="false" aria-expanded="false">
                        <i data-feather="mail" class="noti-icon"></i>
                        <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                    </a>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ Auth::guard('admin')->user()->image }}" alt="user-image"
                            class="custom-topbar-avatar">
                        <span class="pro-user-name ms-1">
                            {{ Auth::guard('admin')->user()->name }}
                            <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Xin Chào !</h6>
                        </div>

                        <!-- item-->
                        <a href="pages-profile.html" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                            <span>Tài Khoản</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <form action="{{ route('admin.logout') }}" class="dropdown-item notify-item" method="POST">
                            @csrf
                            <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                            <span onclick="event.preventDefault(); this.closest('form').submit();"
                                class="cursor-pointer">Đăng xuất</span>
                        </form>
                    </div>
                </li>

            </ul>
        </div>

    </div>

</div>

@push('scripts')
@endpush
