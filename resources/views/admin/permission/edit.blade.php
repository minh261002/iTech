@extends('admin.layouts.master')

@section('title', 'Quản lý quyền')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card my-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.permission.index') }}">Quản lý quyền</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <form class="row" action="{{ route('admin.permission.update', $permission->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Chỉnh sửa thông tin</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="title" class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $permission->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Quyền (PERMISSION_NAME)</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $permission->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="guard_name" class="form-label">Nhóm quyền (GUARD_NAME): </label>
                                <select name="guard_name" id="guard_name" class="form-control">
                                    <option value="">Chọn nhóm quyền</option>
                                    <option value="admin" {{ $permission->guard_name == 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                </select>

                                @error('guard_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="module_id" class="form-label">Thuộc module</label>
                                <select name="module_id" id="module_id" class="form-control select2">
                                    <option value="">Không thuộc module nào</option>
                                    @foreach ($modules as $module)
                                        <option value="{{ $module->id }}"
                                            {{ $permission->module_id == $module->id ? 'selected' : '' }}>
                                            {{ $module->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Thao tác</h2>
                    </div>

                    <div class="card-body">
                        <div class="col-12 mb-3">
                            <button type="submit" class="w-100 btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
