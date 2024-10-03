@extends('admin.layouts.master')

@section('title', 'Thông báo của tôi')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thông báo của tôi</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <input type="text" class="form-control" placeholder="Tìm kiếm thông báo">
                    </div>
                    <div class="card-body" style="height:60vh; overflow-y:auto">
                        @forelse($notifications as $noty)
                            <a href="{{ route('admin.myNotification', ['id' => $noty->id]) }}"
                                class="card-body d-block mt-1 rounded {{ $noty->is_read == 1 ? 'bg-light' : 'border' }}">

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <i data-feather="bell" class="text-success"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3 text-truncate">
                                        <h6 class="my-0 fw-medium text-dark fs-15">
                                            {{ $noty->title }}
                                        </h6>
                                        <small class="text-muted fs-13 fw-medium mb-0">
                                            {{ format_datetime($noty->created_at) }}
                                        </small>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 ms-3 text-truncate">
                                        <h6 class="my-0 fw-medium text-dark fs-15">Không có thông báo mới</h6>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <div class="card-footer text-center">
                        Đánh dấu đã đọc tất cả
                    </div>

                </div>
            </div>


            <div class="col-md-8">
                <div class="card">
                    @if ($notification)
                        <div class="card-header">
                            <h2 class="card-title py-2 mb-0"> {{ $notification->title }}</h2>
                        </div>
                        <div class="card-body" style="height:60vh; overflow-y:auto">
                            {!! $notification->content !!}
                        </div>
                    @else
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 ms-3 text-truncate">
                                    <h6 class="my-0 fw-medium text-dark fs-15">Không có thông báo mới</h6>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="card-footer">
                        <p class="text-center mb-0">
                            Notification push here
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
