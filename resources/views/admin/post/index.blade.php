@extends('admin.layouts.master')

@section('title', 'Quản lý bài viết')

@section('content')
    <div class="card my-2">
        <div class="card-body d-flex align-items-center justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quản lý bài viết</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2 class="card-title mb-0">Danh sách bài viết</h2>

            <div class="card-tools">
                <a href="{{ route('admin.post.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Tên bài viết</th>
                        <th>Nổi bật</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                @if ($post->is_featured === 1)
                                    <span class="badge text-bg-primary">Nổi bật</span>
                                @elseif($post->is_featured === 0)
                                    <span class="badge text-bg-danger">Không nổi bật</span>
                                @endif
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch" {{ $post->status == 2 ? 'checked' : '' }}
                                    data-id={{ $post->id }}>
                            </td>
                            <td>
                                <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-primary">
                                    <i data-feather="edit"></i>
                                </a>

                                <a href="{{ route('admin.post.delete', $post->id) }}"
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
                let postId = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('admin.post.update.status') }}',
                    data: {
                        status: status,
                        post_id: postId
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
