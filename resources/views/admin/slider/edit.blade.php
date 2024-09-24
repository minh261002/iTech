@extends('admin.layouts.master')

@section('title', 'Chỉnh sửa thông tin')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.slider.index') }}">Quản lý slider</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form action="{{ route('admin.slider.update') }}" class="row" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $slider->id }}">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Chỉnh sửa thông tin</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Tên slider</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $slider->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="guard_name" class="form-label">Mô tả </label>
                                <textarea name="desc" id="desc" class="form-control" rows="5">{{ $slider->desc }}</textarea>

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
                        <h2 class="card-title">Trạng thái</h2>
                    </div>
                    <div class="card-body">
                        <div class="col-12 mb-3">
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Bản nháp</option>
                                <option value="2" {{ $slider->status == 2 ? 'selected' : '' }}>Đã xuất bán</option>
                            </select>
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
