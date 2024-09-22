@extends('admin.layouts.master')

@section('title', 'Thêm chuyên mục mới')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.catalogue.index') }}">Quản lý chuyên mục bài
                                viết</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form action="{{ route('admin.post.catalogue.store') }}" class="row" method="POST">
            @csrf

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Thêm chuyên mục</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Tên chuyên mục</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="position" class="form-label">Vị Trí</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    value="{{ old('position') }}">
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Chuyên mục cha</label>
                                <select class="form-select" name="parent_id" id="parent_id">
                                    <option value="">-- Chọn chuyên mục cha --</option>
                                    @foreach ($post_catalogues as $catalogue)
                                        <option value="{{ $catalogue->id }}">
                                            {{ generate_text_depth_tree($catalogue->depth) }}
                                            {{ $catalogue->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Trạng thái</label>
                                <select class="form-select" name="status" id="status">
                                    <option value="1">Bản nháp</option>
                                    <option value="2">Đã xuất bản</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="desc" class="form-label">Mô tả</label>
                                <textarea name="description" class="ck-editor" id="ckDescription" {{ isset($disabled) ? 'disabled' : '' }}>{{ old('description') }}</textarea>
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
                        <h2 class="card-title">Ảnh đại diện</h2>
                    </div>

                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <span class="image img-cover image-target"><img class="w-100"
                                        src="{{ old('image', $catalogue->image ?? '') ? old('image', $catalogue->image ?? '') : asset('admin/assets/images/not-found.jpg') }}"
                                        alt=""></span>
                                <input type="hidden" name="image" value="{{ old('image', $catalogue->image ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title">Thao tác</h2>
                    </div>
                    <div class="card-body">
                        <div class="col-12 mb-3">
                            <button type="submit" class="w-100 btn btn-primary">Thêm mới</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
