@extends('admin.layouts.master')

@section('title', 'Quản lý slider')

@section('content')
    <div class="card my-2">
        <div class="card-body d-flex align-items-center justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quản lý slider</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2 class="card-title mb-0">Danh sách slider</h2>

            <div class="card-tools">
                <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Tên slider</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ $slider->name }}</td>
                            <td>{{ $slider->desc }}</td>
                            <td>
                                <input type="checkbox" class="js-switch" {{ $slider->status == 2 ? 'checked' : '' }}
                                    data-id={{ $slider->id }}>
                            </td>
                            <td>
                                <a href="{{ route('admin.slider.item.index', $slider->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i data-feather="image"></i>
                                </a>
                                <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-sm btn-primary">
                                    <i data-feather="edit"></i>
                                </a>
                                <a href="{{ route('admin.slider.delete', $slider->id) }}"
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
                let sliderId = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('admin.slider.update.status') }}',
                    data: {
                        status: status,
                        slider_id: sliderId
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
