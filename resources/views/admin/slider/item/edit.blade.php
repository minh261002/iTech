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
                        <li class="breadcrumb-item active">
                            <a href="{{ route('admin.slider.item.index', $item->slider_id) }}">
                                {{ $item->slider->name }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form action="{{ route('admin.slider.item.update') }}" class="row" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $item->id }}">
            <input type="hidden" name="slider_id" value="{{ $item->slider->id }}">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">
                            {{ $item->slider->name }}
                        </h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="title" class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $item->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="link" class="form-label">Đường dẫn </label>
                                <input type="text" class="form-control" id="link" name="link"
                                    value="{{ $item->link }}">
                                @error('link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="position" class="form-label">Vị trí</label>
                                <input type="number" class="form-control" id="position" name="position"
                                    value="{{ $item->position }}">
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h2 class="card-title">Ảnh</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <span class="image img-cover image-target"><img class="w-100"
                                            src="{{ $item->image ? $item->image : asset('admin/assets/images/not-found.jpg') }}"
                                            alt=""></span>
                                    <input type="hidden" name="image" value="{{ $item->image }}">
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h2 class="card-title">Ảnh mobile</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <span class="image img-cover image-target"><img class="w-100"
                                            src="{{ $item->mobile_image ? $item->mobile_image : asset('admin/assets/images/not-found.jpg') }}"
                                            alt=""></span>
                                    <input type="hidden" name="mobile_image" value="{{ $item->mobile_image }}">
                                </div>
                                @error('image_mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                            <button type="submit" class="w-100 btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
