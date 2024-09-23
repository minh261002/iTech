@extends('admin.layouts.master')

@section('title', 'Chỉnh sửa thông tin')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.member.index') }}">Thành viên</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form class="row" action="{{ route('admin.member.update') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $member->id }}">

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
                                    value="{{ $member->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $member->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $member->phone }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="birthday" class="form-label">Ngày sinh</label>
                                <input type="text" class="form-control flatpickr-input" id="basic-datepicker"
                                    value="{{ $member->birthday }}" name="birthday" readonly="readonly">
                                @error('birthday')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="desc" class="form-label">Mô tả</label>
                                <textarea name="description" cols="3" class="form-control">{{ $member->description }}</textarea>
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
                                    value="{{ old('address', $member->address ?? '') }}">
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
                            <option value="1" {{ old('status', $member->status ?? '') == 1 ? 'selected' : '' }}> Đang
                                hoạt động </option>
                            <option value="2" {{ old('status', $member->status ?? '') == 2 ? 'selected' : '' }}> Đã
                                khóa </option>
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
                                        src="{{ old('image', $member->image ?? '') ? old('image', $member->image ?? '') : asset('admin/assets/images/not-found.jpg') }}"
                                        alt=""></span>
                                <input type="hidden" name="image" value="{{ old('image', $member->image ?? '') }}">
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
                            <button type="submit" class="w-100 btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        var province_id = '{{ isset($member->province_id) ? $member->province_id : old('province_id') }}'
        var district_id = '{{ isset($member->district_id) ? $member->district_id : old('district_id') }}'
        var ward_id = '{{ isset($member->ward_id) ? $member->ward_id : old('ward_id') }}'
    </script>
@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/js/location.js') }}"></script>
@endpush
