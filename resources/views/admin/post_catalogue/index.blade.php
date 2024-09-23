@extends('admin.layouts.master')

@section('title', 'Quản lý chuyên mục bài viết')

@section('content')
    <div class="card my-2">
        <div class="card-body d-flex align-items-center justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quản lý chuyên mục bài viết</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- <pre>{{ print_r($post_catalogues, true) }}</pre> --}}

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2 class="card-title mb-0">Danh sách chuyên mục bài viết</h2>

            <div class="card-tools">
                <a href="{{ route('admin.post.catalogue.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post_catalogues as $catalogue)
                        <tr>
                            <td>{{ generate_text_depth_tree($catalogue->depth) . '' . $catalogue->name }}</td>
                            <td>
                                <input type="checkbox" class="js-switch" {{ $catalogue->status == 2 ? 'checked' : '' }}
                                    data-id={{ $catalogue->id }}>
                            </td>
                            <td>
                                <a href="{{ route('admin.post.catalogue.edit', $catalogue->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="mdi mdi-pencil"></i>
                                </a>

                                <a href="{{ route('admin.post.catalogue.delete', $catalogue->id) }}"
                                    class="btn btn-sm btn-danger delete-item">
                                    <i class="mdi mdi-delete"></i>
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
                let catalogueId = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('admin.post.catalogue.update.status') }}',
                    data: {
                        status: status,
                        catalogue_id: catalogueId
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
