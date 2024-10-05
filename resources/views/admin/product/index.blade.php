@extends('admin.layouts.master')

@section('title', 'Quản lý sản phẩm')

@section('content')
    <div class="card my-2">
        <div class="card-body d-flex align-items-center justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quản lý sản phẩm</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2 class="card-title mb-0">Danh sách sản phẩm</h2>

            <div class="card-tools">
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>SKU</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td style="width:70px">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                    class="custom-img-table" />
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>
                                {{ $product->sku }}
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch" {{ $product->status == 2 ? 'checked' : '' }}
                                    data-id={{ $product->id }}>

                            </td>
                            <td>
                                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                    <i data-feather="edit"></i>
                                </a>

                                <a href="{{ route('admin.product.delete', $product->id) }}"
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
        $('.js-switch').change(function() {
            let status = $(this).prop('checked') === true ? 2 : 1;
            let productId = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('admin.product.update.status') }}',
                data: {
                    status: status,
                    product_id: productId
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
    </script>
@endpush
