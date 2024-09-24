@extends('admin.layouts.master')

@section('title', 'Quản trị viên')

@section('content')
    <div class="card my-2">
        <div class="card-body d-flex align-items-center justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quản trị viên</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2 class="card-title mb-0">Danh sách quản trị viên</h2>

            <div class="card-tools">
                <a href="{{ route('admin.admin.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <table id="table" class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Vai trò</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->phone }}</td>
                            <td>{{ $admin->address ?? 'Địa chỉ' }},
                                {{ $admin->ward->full_name ?? 'Phường / Xã' }},
                                {{ $admin->district->full_name ?? 'Quận / Huyện' }},
                                {{ $admin->province->full_name ?? 'Tỉnh / Thành Phố' }},
                            </td>
                            <td>
                                @foreach ($admin->role as $role)
                                    <span class="">{{ $role->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('admin.admin.edit', $admin->id) }}" class="btn btn-sm btn-primary">
                                    <i data-feather="edit"></i>
                                </a>
                                <a href="{{ route('admin.admin.delete', $admin->id) }}"
                                    class="btn btn-sm btn-danger delete-item">
                                    <i data-feather="trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
