@extends('admin.layouts.master')

@section('title', 'Thuộc tính sản phẩm')

@section('content')
    <div class="card my-2">
        <div class="card-body d-flex align-items-center justify-content-between">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.attribute.index') }}">Thuộc tính sản phẩm</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.attribute.index') }}">
                            {{ App\Models\Attribute::find(request()->route('id'))->name }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách biến thể</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2 class="card-title mb-0">
                Biến thể của : {{ App\Models\Attribute::find(request()->route('id'))->name }}
            </h2>

            <div class="card-tools">
                <a href="{{ route('admin.attribute.variation.create', request()->route('id')) }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <table id="table" class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Tên biến thể</th>
                        <th>Vị trí</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($variations as $var)
                        <tr>

                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    @if ($var->meta_value)
                                        <div class="custom-meta-value" style="background-color: {{ $var->meta_value }}">

                                        </div>
                                    @endif
                                    {{ $var->name }}
                                </div>

                            </td>

                            <td>{{ $var->position }}</td>

                            <td>
                                <a href="{{ route('admin.attribute.variation.edit', $var->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i data-feather="edit"></i>
                                </a>
                                <a href="{{ route('admin.attribute.variation.delete', $var->id) }}"
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
