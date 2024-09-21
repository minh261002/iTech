@extends('admin.layouts.master')

@section('title', 'Quản lý module')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quản lý module</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h2 class="card-title mb-0">Danh sách module</h2>

                <div class="card-tools">
                    <a href="{{ route('admin.module.create') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus"></i> Thêm mới
                    </a>
                </div>
            </div>

            <div class="card-body">
                <p class="text-danger">
                    <strong>Lưu ý:</strong> Đây là phần chỉ dành riêng cho Nhà phát triển. <br />Các Dev sẽ dùng chức năng
                    này để
                    quản lý module của hệ thống.
                </p>
                <table class="table table-striped table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên module</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($modules as $module)
                            <tr>
                                <td>{{ $module->id }}</td>
                                <td>{{ $module->name }}</td>
                                <td>{!! $module->description !!}</td>
                                <td>
                                    @if ($module->status == 1)
                                        <span class="badge bg-danger">Chưa xong</span>
                                    @else
                                        <span class="badge bg-success">Đã xong</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.module.edit', $module->id) }}" class="btn btn-sm btn-primary">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>

                                    <a href="{{ route('admin.module.delete', $module->id) }}"
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
