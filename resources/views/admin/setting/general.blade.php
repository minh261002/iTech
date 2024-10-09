@extends('admin.layouts.master')

@section('title', 'Thêm vai trò mới')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cài đặt hệ thống</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form action="{{ route('admin.setting.general') }}" class="row" method="POST">
            @csrf

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Cài đặt hệ thống</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-3 mb-3">
                                <label for="image" class="form-label">Logo</label>
                                <span class="image img-cover image-target">
                                    <img class="w-100"
                                        src="{{ $general['site_logo'] ? asset($general['site_logo']) : asset('admin/assets/images/not-found.jpg') }}"
                                        alt="">
                                </span>
                                <input type="hidden" name="site_logo"
                                    value="{{ old('image', $general['site_logo'] ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="image" class="form-label">Admin Logo</label>
                                <span class="image img-cover image-target">
                                    <img class="w-100"
                                        src="{{ $general['site_admin_logo']
                                            ? asset($general['site_admin_logo'])
                                            : asset('admin/assets/images/not-found.jpg') }}"
                                        alt="">
                                </span>
                                <input type="hidden" name="site_admin_logo"
                                    value="{{ old('image', $general['site_logo'] ?? '') }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="image" class="form-label">Favicon</label>
                                <span class="image img-cover image-target">
                                    <img class="w-100"
                                        src="{{ $general['site_favicon'] ? asset($general['site_favicon']) : asset('admin/assets/images/not-found.jpg') }}"
                                        alt="">
                                </span>
                                <input type="hidden" name="site_favicon"
                                    value="{{ old('image', $general['site_favicon'] ?? '') }}">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="title" class="form-label">Tên website</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $general['site_name'] }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="site_email"
                                    value="{{ $general['site_email'] }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="site_phone"
                                    value="{{ $general['site_phone'] }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="site_address"
                                    value="{{ $general['site_address'] }}">
                                @error('address')
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
                            <button type="submit" class="w-100 btn btn-primary">Lưu Thay Đổi</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
