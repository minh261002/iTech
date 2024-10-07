@extends('admin.layouts.master')

@section('title', 'Thêm mã giảm giá')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Quản lý mã giảm giá</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form action="{{ route('admin.discount.store') }}" class="row" method="POST">
            @csrf

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Thêm mã giảm giá</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="code" class="form-label">Mã</label>
                                <input type="text" class="form-control" id="code" name="code"
                                    value="{{ old('code') }}">
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date_start" class="form-label">Ngày bắt đầu</label>
                                <input type="text" class="form-control flatpickr-input active" id="datetime-datepicker"
                                    readonly="readonly" name="date_start" value="{{ old('date_start') }}">
                                @error('date_start')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date_end" class="form-label">Ngày kết thúc</label>
                                <input type="text" class="form-control flatpickr-input active" id="datetime-datepicker"
                                    readonly="readonly" name="date_end" value="{{ old('date_end') }}">
                                @error('date_end')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="max_usage">Lượt sử dụng</label>
                                <input type="number" class="form-control" id="max_usage" name="max_usage"
                                    value="{{ old('max_usage') }}">
                                @error('max_usage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="min_order_amount">Giá trị tối thiểu</label>
                                <input type="number" class="form-control" id="min_order_amount" name="min_order_amount"
                                    value="{{ old('min_order_amount') }}">
                                @error('min_order_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="type">Loại giảm giá</label>
                                <select class="form-select" name="type" id="type">
                                    <option value="1">Phần trăm</option>
                                    <option value="2">Số tiền</option>
                                </select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="value">Giá trị</label>
                                <input type="number" class="form-control" id="percent_value" name="percent_value"
                                    value="{{ old('percent_value') }}" placeholder="%">
                                @error('percent_value')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3 d-none">
                                <label for="value">Giá trị</label>
                                <input type="number" class="form-control" id="discount_value" name="discount_value"
                                    value="{{ old('discount_value') }}" placeholder="VNĐ">
                                @error('discount_value')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="user_id">Khách hàng</label>
                                <select class="form-control select2" name="user_id[]" id="user_id" multiple>
                                    {{-- <option value="">Áp dụng cho tất cả khách hàng</option> --}}
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="product_id">Sản phẩm</label>
                                <select class="form-control select2" name="product_id[]" id="product_id" multiple>
                                    {{-- <option value="">Áp dụng cho tất cả sản phẩm</option> --}}
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="product_variation_id">Biến thể sản phẩm</label>
                                <select class="form-control select2" name="product_variation_id[]"
                                    id="product_variation_id">
                                    <option value="">Áp dụng cho tất cả biến thể</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="desc" class="form-label">Mô tả</label>
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
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
                        <select class="form-select" name="status" id="status">
                            <option value="1">Bản nháp</option>
                            <option value="2">Đã xuất bản</option>
                        </select>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#type').change(function() {
                let discountType = $(this).val();

                if (discountType == 1) {
                    $('#percent_value').parent().removeClass('d-none');
                    $('#discount_value').parent().addClass('d-none');
                } else {
                    $('#percent_value').parent().addClass('d-none');
                    $('#discount_value').parent().removeClass('d-none');
                }
            });
        });
    </script>
@endpush
