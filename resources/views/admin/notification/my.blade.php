@extends('admin.layouts.master')

@section('title', 'Thông báo của tôi')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thông báo của tôi</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <input type="text" class="form-control" placeholder="Tìm kiếm thông báo">
                    </div>
                    <div class="card-body" style="height:60vh; overflow-y:auto" id="notification-box">

                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between" style="cursor:pointer">
                        <span id="readAll">
                            Đánh dấu đọc tất cả
                        </span>

                        <span id="deleteAll" class="text-danger">
                            Xóa tất cả
                        </span>
                    </div>

                </div>
            </div>


            <div class="col-md-8">
                <div class="card" id="notification-container">
                    @include('admin.notification.components.container_notification')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "/ajax/admin/notification/get",
                type: 'GET',
                beforeSend: function() {
                    $('#notification-box').html(
                        '<div class="d-flex justify-content-center align-items-center" style="height: 60vh"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>'
                    )
                },
                data: {
                    admin_id: {{ Auth::guard('admin')->user()->id }}
                },
                success: function(response) {
                    $('#notification-box').html(response)
                }
            })

            $(document).on('click', ('.notification-item'), function(e) {
                e.preventDefault();

                let notification_id = $(this).data('notification-id');

                $.ajax({
                    url: "/ajax/admin/notification/show/" + notification_id,
                    type: 'GET',
                    beforeSend: function() {
                        $('#notification-container').html(
                            '<div class="d-flex justify-content-center align-items-center" style="height: 74vh"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>'
                        )
                    },
                    success: function(response) {
                        $('#notification-container').html(response);
                        $(`.box-noty-${notification_id}`).removeClass('bg-light');
                    },
                })
            });

            $('#readAll').on('click', function() {

                $.ajax({
                    url: "/ajax/admin/notification/readAll",
                    type: 'GET',
                    data: {
                        admin_id: {{ Auth::guard('admin')->user()->id }}
                    },
                    beforeSend: function() {
                        $('#notification-box').html(
                            '<div class="d-flex justify-content-center align-items-center" style="height: 60vh"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>'
                        )
                    },
                    success: function(response) {
                        $('#notification-box').html(response)
                        $('#countUnreadNotification').text(0)
                        FuiToast.success('Đánh dấu đã đọc tất cả thông báo')
                    }
                })
            });

            $(document).on('click', '.delete-notification', function(e) {
                e.preventDefault();

                let notyId = $(this).data('notyid');

                $.ajax({
                    url: "/ajax/admin/notification/delete/" + notyId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $(`.box-noty-${notyId}`).remove();
                        FuiToast.success('Xóa thông báo thành công')
                    }
                })
            });

            $('#deleteAll').on('click', function() {
                $.ajax({
                    url: "/ajax/admin/notification/deleteAll",
                    type: 'GET',
                    data: {
                        admin_id: {{ Auth::guard('admin')->user()->id }}
                    },
                    beforeSend: function() {
                        $('#notification-box').html(
                            '<div class="d-flex justify-content-center align-items-center" style="height: 60vh"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>'
                        )
                    },
                    success: function(response) {
                        $('#notification-box').html(response)
                        $('#countUnreadNotification').text(0)
                        FuiToast.success('Xóa tất cả thông báo thành công')
                    }
                })
            });
        })
    </script>
@endpush
