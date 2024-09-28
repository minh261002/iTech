<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ env('APP_URL') }}">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="adminId" content="{{ Auth::guard('admin')->user()->id }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!--select2 css-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Data table css -->
    <link href="{{ asset('admin/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('admin/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/switchery.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/lelinh014756/fui-toast-js@master/assets/css/toast@1.0.1/fuiToast.min.css">

    {{-- @vite(['resources/js/bootstrap.js', 'resources/js/app.js']) --}}
</head>

<!-- body start -->

<body data-menu-color="dark" data-sidebar="default">
    <div id="fui-toast"></div>

    <!-- Begin page -->
    <div id="app-layout">


        <!-- Topbar Start -->
        @include('admin.layouts.partials.topbar')
        <!-- end Topbar -->

        <!-- Left Sidebar Start -->
        @include('admin.layouts.partials.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                @yield('content')
            </div> <!-- content -->

            <!-- Footer Start -->
            @include('admin.layouts.partials.footer')
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>

    <script src="{{ asset('admin/assets/libs/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/gh/lelinh014756/fui-toast-js@master/assets/js/toast@1.0.1/fuiToast.min.js"></script>

    <!-- Vendor -->
    <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <!--Select2 js-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- App js-->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    <!--sweet alert js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--finder custom -->
    <script src="{{ asset('admin/assets/js/finder.js') }}"></script>

    <!-- Data table js -->
    <script src="{{ asset('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/ckfinder_2/ckfinder.js') }}"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <!-- Flatpickr Timepicker Plugin js -->
    <script src="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/pages/form-picker.js') }}"></script>
    <script src="{{ asset('admin/assets/js/switchery.js') }}"></script>

    @include('admin.layouts.partials.pusher')

    <script>
        $(document).ready(function() {

            $('#table').DataTable({
                'language': {
                    'url': '{{ asset('admin/assets/lang/dataTable.json') }}'
                },
                'order': [
                    [0, 'desc']
                ]
            });

            $('.delete-item').on('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Cảnh báo",
                    text: "Dữ liệu sẽ bị xóa vĩnh viễn. Bạn có chắc chắn muốn xóa không?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Xóa",
                    cancelButtonText: "Hủy"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                location.reload();
                            },
                        });
                    }
                });
            })
        });
    </script>

    @stack('scripts')
</body>

</html>
