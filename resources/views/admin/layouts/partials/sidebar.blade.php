<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="" height="32">
                    </span>
                </a>
                <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">
                <li class="menu-title">Dashboard</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title">Main</li>

                @foreach (config('admin_sidebar') as $item)
                    <li>
                        <a href="#{{ $item['href'] }}" data-bs-toggle="collapse">
                            {!! $item['icon'] !!}
                            <span>{{ $item['title'] }}</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div id="{{ $item['href'] }}" class="collapse">
                            <ul class="nav-second-level">
                                @foreach ($item['sub_menu'] as $subItem)
                                    <li>
                                        <a href="{{ route($subItem['route']) }}">
                                            {{ $subItem['title'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
