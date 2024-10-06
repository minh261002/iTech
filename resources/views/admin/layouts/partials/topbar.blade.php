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
                    <a class="nav-link dropdown-toggle" href="{{ route('admin.myNotification') }}" role="button">
                        <i data-feather="bell" class="noti-icon"></i>

                        <span class="badge bg-danger rounded-circle noti-icon-badge" id="countUnreadNotification">
                            {{ $unreadNotifications->count() }}
                        </span>
                    </a>
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
