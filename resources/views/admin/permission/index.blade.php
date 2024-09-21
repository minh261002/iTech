@extends('admin.layouts.master')

@section('title', 'Quản lý quyền')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quản lý quyền</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h2 class="card-title mb-0">Danh sách quyền</h2>

                <div class="card-tools">
                    <a href="{{ route('admin.permission.create') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus"></i> Thêm mới
                    </a>
                </div>
            </div>

            <div class="card-body">
                <p class="text-danger">
                    <strong>Lưu ý:</strong> Đây là phần chỉ dành riêng cho Nhà phát triển. Các Dev sẽ sử dụng Slug (
                    Permission_name ) để lập
                    trình, đóng gói các chức năng để có thể phân quyền.<br /> Vui lòng không xóa hoặc điều chỉnh các
                    Quyền
                    nếu
                    bạn
                    không phải Dev hoặc không biết về nó để tránh bị Lỗi toàn bộ hệ thống.
                </p>
                <table class="table table-striped table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tiêu đề</th>
                            <th>Quyền (PERMISSION_NAME)</th>
                            <th>Nhóm quyền (GUARD_NAME)</th>
                            <th>Module</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($permissions as $per)
                            <tr>
                                <td>{{ $per->id }}</td>
                                <td>{{ $per->title }}</td>
                                <td>{{ $per->name }}</td>
                                <td>{{ $per->guard_name }}</td>
                                <td>{{ $per->module->name ?? 'Không thuộc module nào' }}</td>
                                <td>
                                    <a href="{{ route('admin.permission.edit', $per->id) }}" class="btn btn-sm btn-primary">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>

                                    <a href="{{ route('admin.permission.delete', $per->id) }}"
                                        class="btn btn-sm btn-danger delete-item">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
