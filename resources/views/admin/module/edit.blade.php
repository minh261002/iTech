@extends('admin.layouts.master')

@section('title', 'Chỉnh sửa module')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.module.index') }}">Quản lý module</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form class="row" action="{{ route('admin.module.update', $module->id) }}" method="POST">
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
                                <label for="name" class="form-label">Tên module</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $module->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <ul class="list-group">
                                    @forelse ($permissions as $permission)
                                        <li class="list-group-item">{{ $permission->name }}</li>
                                    @empty
                                        <li class="list-group-item">
                                            Module này chưa có quyền nào
                                        </li>
                                    @endforelse
                                </ul>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="desc" class="form-label">Mô tả</label>
                                <textarea name="description" class="ck-editor" id="ckDescription" {{ isset($disabled) ? 'disabled' : '' }}>{{ $module->description }}</textarea>
                                @error('desc')
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
                        <h2 class="card-title mb-0">Trạng Thái</h2>
                    </div>

                    <div class="card-body">
                        <div class="col-12 mb-3">
                            <select class="form-select" name="status" id="status">
                                <option value="1" {{ $module->status == 1 ? 'selected' : '' }}>Chưa xong</option>
                                <option value="2" {{ $module->status == 2 ? 'selected' : '' }}>Đã xong</option>
                            </select>

                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

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
