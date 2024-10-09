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
            <h2 class="card-title mb-0">
                {{ \App\Models\Slider::where('id', $sliderId)->first()->name }}
            </h2>

            <div class="card-tools">
                <a href="{{ route('admin.slider.item.create', $sliderId) }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tiêu đề</th>
                        <th>Đường dẫn</th>
                        <th>Thứ tự</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td style="width:70px">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="custom-img-table">
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->link }}</td>
                            <td>{{ $item->position }}</td>
                            <td>
                                <a href="{{ route('admin.slider.item.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                    <i data-feather="edit"></i>
                                </a>

                                <a href="{{ route('admin.slider.item.delete', $item->id) }}"
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
