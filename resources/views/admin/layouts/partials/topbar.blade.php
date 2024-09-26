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
                                <div class="dropdown-item notify-item text-muted link-primary {{ $notification->is_read == 1 ? 'active' : '' }}"
                                    style="cursor: pointer" data-notyId = "{{ $notification->id }}">
                                    <div class="notify-icon">
                                        <i data-feather="bell" class="text-success"></i>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="notify-details">
                                            {{ $notification->title }}
                                        </p>
                                        <small class="text-muted">
                                            {{ format_datetime($notification->created_at) }}
                                        </small>
                                    </div>
                                    <p class="mb-0 user-msg">
                                        <small class="fs-14">
                                            {{ $notification->content }}
                                        </small>
                                    </p>
                                </div>
                            @empty
                                <div class="dropdown-item notify-item text-muted link-primary">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="notify-details">
                                            Không có thông báo mới
                                        </p>
                                    </div>
                                </div>
                            @endforelse

                        </div>

                        <!-- All-->
                        @if (count($unreadNotifications) > 0)
                            <div class="dropdown-item text-center text-primary notify-item notify-all">
                                Xem tất cả
                                <i class="fe-arrow-right"></i>
                            </div>
                        @endif

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
    <script>
        $(document).ready(function() {

            $('.notify-item').click(function(e) {
                e.preventDefault();
                e.stopPropagation();

                $.ajax({
                    url: "/ajax/notification/read",
                    type: "PUT",
                    data: {
                        id: $(this).data('notyid'),
                        is_read: 2,
                        admin_id: "{{ Auth::guard('admin')->user()->id }}",
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            // $('.notify-item').removeClass('active');
                            $(e.currentTarget).removeClass('active');
                            $('#countUnreadNotification').text(response
                                .unreadNotifications);
                        }
                    }
                })
            });

            $('.noty-all').click(function(e) {
                $.ajax({
                    url: "/ajax/notification/read-all",
                    type: "PUT",
                    data: {
                        admin_id: "{{ Auth::guard('admin')->user()->id }}",
                        is_read: 2,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $('.notify-item').removeClass('active');
                            $('#countUnreadNotification').text(0);
                            $('.notify-all').remove();
                        }
                    }
                })
            })

            // function getNotification() {
            //     $.ajax({
            //         url: "/ajax/notification",
            //         type: "GET",
            //         data: {
            //             admin_id: "{{ Auth::guard('admin')->user()->id }}",
            //         },
            //         success: function(response) {
            //             if (response.status == 'success') {
            //                 $('.noti-scroll').append(renderHtml(response
            //                     .notifications));
            //             }
            //         }
            //     })
            // }

            // function renderHtml(notification) {
            //     //lặp qua mảng thông báo
            //     var html = '';
            //     $.each(notification, function(index, value) {
            //         html += `
        //         <div class="dropdown-item notify-item text-muted link-primary ${value.is_read == 1 ? 'active' : ''}" style="cursor: pointer" data-notyId = "${value.id}">
        //             <div class="notify-icon">
        //                 <i data-feather="bell" class="text-success"></i>
        //             </div>
        //             <div class="d-flex align-items-center justify-content-between">
        //                 <p class="notify-details">
        //                     ${value.title}
        //                 </p>
        //                 <small class="text-muted">
        //                     ${value.created_at}
        //                 </small>
        //             </div>
        //             <p class="mb-0 user-msg">
        //                 <small class="fs-14">
        //                     ${value.content}
        //                 </small>
        //             </p>
        //         </div>`;
            //     });

            //     return html;
            // }

            // getNotification();
        })
    </script>
@endpush
