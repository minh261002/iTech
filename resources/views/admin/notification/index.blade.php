@extends('admin.layouts.master')

@section('title', 'Quản lý thông báo')

@section('content')
    <div class="card my-2">
        <div class="card-body d-flex align-items-center justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thông báo</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2 class="card-title mb-0">Danh sách thông báo</h2>

            <div class="card-tools">
                <a href="{{ route('admin.notification.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <table id="table" class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Khách hàng</th>
                        <th>Quản trị viên</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                        <th>Ngày gửi</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($notifications as $noty)
                        <tr>
                            <td>{{ $noty->user->name ?? 'N/A' }}</td>
                            <td>{{ $noty->admin->name ?? 'N/A' }}</td>
                            <td>{{ $noty->title }}</td>
                            <td>{{ $noty->content }}</td>
                            <td>
                                @if ($noty->is_read == 2)
                                    <span class="badge bg-success">Đã đọc</span>
                                @else
                                    <span class="badge bg-danger">Chưa đọc</span>
                                @endif
                            </td>
                            <td>
                                {{ $noty->created_at->format('H:i d/m/Y') }}
                            </td>
                            <td>
                                <a href="{{ route('admin.notification.delete', $noty->id) }}"
                                    class="btn btn-danger btn-sm delete-item ">
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
@endpush
