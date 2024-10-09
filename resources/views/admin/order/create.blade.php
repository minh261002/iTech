@extends('admin.layouts.master')

@section('title', 'Tạo đơn hàng')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Quản lý đơn hàng</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form class="row" action="{{ route('admin.order.store') }}" method="POST">
            @csrf
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Thông tin khách hàng</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="user_id" class="form-label">Khách hàng</label>

                                <select name="user_id" id="user_id" class="form-control select2">
                                    <option value="">Chọn khách hàng</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Điện thoại</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

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
                                    value="{{ old('address', $admin->address ?? '') }}">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea name="note" id="note" class="form-control" rows="4"></textarea>
                                @error('note')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Giỏ hàng</h2>

                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                            data-bs-target=".bs-example-modal" id="showModal">
                            <i data-feather="plus"></i>
                            Chọn sản phẩm</button>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Thanh toán</h2>
                    </div>

                    <div class="card-body">
                        <div class="col-12 mb-3">
                            <label for="payment_method" class="form-label">Phương thức thanh toán</label>
                            <select name="payment_method" id="payment_method" class="form-control select2">
                                <option value="">Chọn phương thức thanh toán</option>
                                <option value="1">Thanh toán khi nhận hàng</option>
                                <option value="2">Chuyển khoản ngân hàng</option>
                                <option value="3">Ví MoMo</option>
                                <option value="4">Ví VNPay</option>
                            </select>
                            @error('payment_method')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="payment_status">Trạng thái thanh toán</label>
                            <select name="payment_status" id="payment_status" class="form-control select2">
                                <option value="">Chọn trạng thái thanh toán</option>
                                <option value="1">Chưa thanh toán</option>
                                <option value="2">Đã thanh toán</option>
                            </select>
                            @error('payment_status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Vận chuyển</h2>
                    </div>

                    <div class="card-body">
                        <div class="col-12 mb-3">
                            <select name="shipping_method" id="shipping_method" class="form-control select2">
                                <option value="">Chọn phương thức vận chuyển</option>
                                <option value="1">Giao hàng tiết kiệm</option>
                                <option value="2">Nhận tại cửa hàng</option>
                            </select>

                            @error('shipping_method')
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
                            <button type="submit" class="w-100 btn btn-primary">Tạo mới</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="renderModal">

    </div>
    {{-- @include('admin.order.components.modal') --}}

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#user_id').on('change', function() {
                let user_id = $(this).val();

                $.ajax({
                    url: "/admin/order/userInfo",
                    type: 'GET',
                    data: {
                        user_id: user_id
                    },
                    success: function(response) {
                        $('#email').val(response.email);
                        $('#phone').val(response.phone);

                        var province_id = response.province_id ?? '';
                        var district_id = response.district_id ?? '';
                        var ward_id = response.ward_id ?? '';

                        $('.province').val(province_id);
                        $('.province').trigger('change');

                        setTimeout(() => {
                            $('.districts').val(district_id);
                            $('.districts').trigger('change');
                        }, 700);

                        setTimeout(() => {
                            $('.wards').val(ward_id);
                            $('.wards').trigger('change');
                        }, 1400);

                        setTimeout(() => {
                            $('#address').val(response.address);
                        }, 1500);
                    }
                });
            });
        });

        $(document).ready(function() {
            function getDataProduct() {
                $.ajax({
                    url: "/admin/order/productInfo",
                    type: 'GET',
                    success: function(response) {
                        $('#renderModal').html(response);
                    }
                });
            }

            $(document).on('keyup', '#search', function() {
                clearTimeout($.data(this, 'timer'));

                let search = $(this).val();
                // $.ajax({
                //     url: "/admin/order/productInfo",
                //     type: 'GET',
                //     data: {
                //         search: search
                //     },
                //     beforeSend: function() {
                //         $('#product-container').html(
                //             '<div class="d-flex justify-content-center align-items-center" style="height: 200px"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>'
                //         );
                //     },
                //     success: function(response) {
                //         // $('#renderModal').html(response);
                //         console.log(response)
                //     }
                // });

                $(this).data('timer', setTimeout(function() {
                    $.ajax({
                        url: "/admin/order/productInfo",
                        type: 'GET',
                        data: {
                            search: search
                        },
                        beforeSend: function() {
                            $('#product-container').html(
                                '<div class="d-flex justify-content-center align-items-center" style="height: 200px"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>'
                            );
                        },
                        success: function(response) {
                            $('#product-container').html(response);
                        }
                    });
                }, 500));
            });

            getDataProduct();
        })
    </script>


    <script src="{{ asset('admin/assets/js/location.js') }}"></script>
@endpush
