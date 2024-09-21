@extends('admin.layouts.master')

@section('title', 'Quản lý vai trò')

@section('content')
    <div class="card my-2">
        <div class="card-body d-flex align-items-center justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quản lý vai trò</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2 class="card-title mb-0">Danh sách vai trò</h2>

            <div class="card-tools">
                <a href="{{ route('admin.role.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tiêu đề</th>
                        <th>Vai trò (ROLE_NAME)</th>
                        <th>Nhóm quyền (GUARD_NAME)</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->title }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>
                                <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-sm btn-primary">
                                    <i class="mdi mdi-pencil"></i>
                                </a>

                                <a href="{{ route('admin.role.delete', $role->id) }}"
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
@endsection
