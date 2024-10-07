@extends('admin.layouts.master')

@section('title', 'Thêm thành viên mới')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.member.index') }}">Thành viên</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form class="row" action="{{ route('admin.member.store') }}" method="POST">
            @csrf
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Thông tin cá nhân</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="birthday" class="form-label">Ngày sinh</label>
                                <input type="text" class="form-control flatpickr-input" id="basic-datepicker"
                                    name="birthday" readonly="readonly">
                                @error('birthday')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="desc" class="form-label">Mô tả</label>
                                <textarea name="description" cols="3" class="form-control">{{ old('description') }}</textarea>
                                @error('desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Mật khẩu</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Địa chỉ</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="province_id" class="form-label">Chọn Tỉnh / Thành Phố</label>
                                <select name="province_id" class="form-control select2 province location"
                                    data-target="districts">
                                    <option value="0">[Chọn Tỉnh / Thành Phố]</option>
                                    @if (isset($provinces))
                                        @foreach ($provinces as $province)
                                            <option @if (old('province_id') == $province->code) selected @endif
                                                value="{{ $province->code }}">{{ $province->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="" class="form-label">Chọn Quận / Huyện </label>
                                <select name="district_id" class="form-control districts select2 location"
                                    data-target="wards">
                                    <option value="0">[Chọn Quận / Huyện]</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="" class="form-label">Chọn Phường / Xã </label>
                                <select name="ward_id" class="form-control select2 wards">
                                    <option value="0">[Chọn Phường / Xã]</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ old('address', $user->address ?? '') }}">
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
                        <h2 class="card-title mb-0">Trạng thái</h2>
                    </div>
                    <div class="card-body">
                        <select name="status" id="status" class="form-control select2">
                            <option value="">[Chọn trạng thái]</option>
                            <option value="1"> Đang hoạt động </option>
                            <option value="2"> Đã khóa </option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Ảnh đại diện</h2>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <span class="image img-cover image-target"><img class="w-100"
                                        src="{{ old('image') ? old('image') : asset('admin/assets/images/not-found.jpg') }}"
                                        alt=""></span>
                                <input type="hidden" name="image"
                                    value="{{ old('image') ?? 'https://i0.wp.com/sbcf.fr/wp-content/uploads/2018/03/sbcf-default-avatar.png?ssl=1	' }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Thao tác</h2>
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

    <script>
        var province_id = '{{ isset($user->province_id) ? $user->province_id : old('province_id') }}'
        var district_id = '{{ isset($user->district_id) ? $user->district_id : old('district_id') }}'
        var ward_id = '{{ isset($user->ward_id) ? $user->ward_id : old('ward_id') }}'
    </script>
@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/js/location.js') }}"></script>
@endpush
