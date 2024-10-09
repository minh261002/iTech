@extends('admin.layouts.master')

@section('title', 'Quản lý mã giảm giá')

@section('content')
    <div class="card my-2">
        <div class="card-body d-flex align-items-center justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quản lý mã giảm giá</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2 class="card-title mb-0">Danh sách mã giảm giá</h2>

            <div class="card-tools">
                <a href="{{ route('admin.discount.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Loại</th>
                        <th>Giá trị giảm</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($discounts as $discount)
                        <tr>
                            <td>{{ $discount->code }}</td>
                            <td>{{ $discount->date_start }}</td>
                            <td>{{ $discount->date_end }}</td>
                            <td>
                                @if ($discount->type == 1)
                                    <span class="badge text-bg-primary">Giảm theo phần trăm</span>
                                @else
                                    <span class="badge text-bg-info">Giảm theo số tiền</span>
                                @endif
                            </td>
                            <td>
                                @if ($discount->type == 1)
                                    {{ $discount->percent_value }}%
                                @else
                                    {{ number_format($discount->discount_value) }}đ
                                @endif
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch" data-id="{{ $discount->id }}"
                                    {{ $discount->status == 2 ? 'checked' : '' }}>
                            </td>
                            <td>
                                <a href="{{ route('admin.discount.edit', $discount->id) }}" class="btn btn-sm btn-primary">
                                    <i data-feather="edit"></i>
                                </a>
                                <a href="{{ route('admin.discount.delete', $discount->id) }}"
                                    class="btn btn-sm btn-danger delete-item">
                                    <i data-feather="trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-switch').change(function() {
                let status = $(this).prop('checked') === true ? 2 : 1;
                let discount_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('admin.discount.update.status') }}',
                    data: {
                        status: status,
                        discount_id: discount_id
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            FuiToast.success('Cập nhật trạng thái thành công');
                        } else {
                            FuiToast.error('Cập nhật trạng thái thất bại');
                            $('.js-switch').prop('checked', !status);
                        }
                    }
                });
            });
        });
    </script>
@endpush
