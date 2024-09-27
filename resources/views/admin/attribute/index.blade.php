@extends('admin.layouts.master')

@section('title', 'Thuộc tính sản phẩm')

@section('content')
    <div class="card my-2">
        <div class="card-body d-flex align-items-center justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thuộc tính sản phẩm</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2 class="card-title mb-0">Danh sách thuộc tính sản phẩm</h2>

            <div class="card-tools">
                <a href="{{ route('admin.attribute.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <table id="table" class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Tên thuộc tính</th>
                        <th>Loại</th>
                        <th>Vị trí</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($attributes as $attr)
                        <tr>
                            <td>{{ $attr->name }}</td>
                            <td>{{ $attr->type == 1 ? 'Nút' : 'Màu sắc' }}</td>
                            <td>{{ $attr->position }}</td>
                            <td>
                                <a href="{{ route('admin.attribute.variation.index', $attr->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i data-feather="list"></i>
                                </a>
                                <a href="{{ route('admin.attribute.edit', $attr->id) }}" class="btn btn-sm btn-primary">
                                    <i data-feather="edit"></i>
                                </a>
                                <a href="{{ route('admin.attribute.delete', $attr->id) }}"
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
