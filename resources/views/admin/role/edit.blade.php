@php
    $permissionIdArray = $role->permissions->pluck('id');
@endphp

@extends('admin.layouts.master')

@section('title', 'Thêm vai trò mới')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">Quản lý vai trò</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form action="{{ route('admin.role.update') }}" class="row" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $role->id }}">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Thêm vai trò mới</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="title" class="form-label">Tên vai trò</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $role->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Vai trò (ROLE_NAME)</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $role->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="guard_name" class="form-label">Nhóm quyền (GUARD_NAME): </label>
                                <select name="guard_name" id="guard_name" class="form-control">
                                    <option value="">Chọn nhóm quyền</option>
                                    <option value="admin" {{ $role->guard_name === 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                </select>

                                @error('guard_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="permissions" class="form-label">Phân quyền</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                    <label class="form-check-label" for="checkAll">
                                        Chọn tất cả quyền
                                    </label>
                                </div>

                                <div class="row">
                                    @foreach ($modules as $module)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="form-check">
                                                        <input class="form-check-input module-check-all" type="checkbox"
                                                            id="moduleCheckAll{{ $module->id }}"
                                                            data-module-id="{{ $module->id }}">
                                                        <label class="form-check-label"
                                                            for="moduleCheckAll{{ $module->id }}">
                                                            {{ $module->name }}
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    @foreach ($module->permissions as $permission)
                                                        <div class="form-check">
                                                            <input class="form-check-input permission-check" type="checkbox"
                                                                id="permissionCheck{{ $permission->id }}"
                                                                data-module-id="{{ $module->id }}" name="permissions[]"
                                                                value="{{ $permission->id }}">
                                                            <label class="form-check-label"
                                                                for="permissionCheck{{ $permission->id }}">
                                                                {{ $permission->title }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                @error('permissions')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title">Thao tác</h2>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            var permissionIdArray = @json($permissionIdArray);
            if (permissionIdArray.length) {
                permissionIdArray.forEach(function(permissionId) {
                    $('#permissionCheck' + permissionId).prop('checked', true);
                });
            }

            $('#checkAll').on('change', function() {
                var isChecked = $(this).is(':checked');
                $('.module-check-all, .permission-check').prop('checked', isChecked);
            });

            $('.module-check-all').on('change', function() {
                var moduleId = $(this).data('module-id');
                var isChecked = $(this).is(':checked');
                $('.permission-check[data-module-id="' + moduleId + '"]').prop('checked', isChecked);

                updateCheckAllStatus();
            });

            $('.permission-check').on('change', function() {
                var moduleId = $(this).data('module-id');
                var allCheckedInModule = $('.permission-check[data-module-id="' + moduleId + '"]')
                    .length ===
                    $('.permission-check[data-module-id="' + moduleId + '"]:checked').length;

                $('#moduleCheckAll' + moduleId).prop('checked', allCheckedInModule);

                updateCheckAllStatus();
            });

            function updateCheckAllStatus() {
                var allModulesChecked = $('.module-check-all').length === $('.module-check-all:checked').length;
                var allPermissionsChecked = $('.permission-check').length === $('.permission-check:checked').length;

                $('#checkAll').prop('checked', allModulesChecked && allPermissionsChecked);
            }
        });
    </script>
@endpush
