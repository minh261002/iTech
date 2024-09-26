<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <base href="{{ env('APP_URL') }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo.svg') }}">

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

    <!-- User css  -->
    <link href="{{ asset('user/assets/css/main.css') }}" rel="stylesheet" type="text/css" id="app-style" />

</head>

<!-- body start -->

<body data-menu-color="dark" data-sidebar="default">

    <!-- Begin page -->
    <div id="app-layout">
        <!-- Topbar Start -->
        @include('user.partials.topbar')
        <!-- end Topbar -->


        <!-- Header Start -->
        @include('user.partials.header')
        <!-- end Header -->

        <!-- Slider Start -->
        @include('user.partials.slider')
        <!-- end Slider-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content">
            @yield('content')
        </div> <!-- content -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


        <!-- Footer Start -->
        <!-- end Footer -->



    </div>
    <!-- END wrapper -->
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

</body>

</html>