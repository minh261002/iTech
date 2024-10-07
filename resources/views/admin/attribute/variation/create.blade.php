@extends('admin.layouts.master')

@section('title', 'Thêm biến thể mới')

@section('content')
    @php
        $attrId = request()->route('id');
    @endphp

    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.attribute.index') }}">Thuộc tính sản phẩm</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.attribute.variation.index', $attrId) }}">
                                {{ App\Models\Attribute::find($attrId)->name }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Chỉnh sửa thông tin
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <form action="{{ route('admin.attribute.variation.store', $attrId) }}" class="row" method="POST">
            @csrf

            <input type="hidden" name="attribute_id" value="{{ $attrId }}">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0"> Biến thể của :
                            {{ App\Models\Attribute::find($attrId)->name }}
                        </h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Tên biến thể</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="position">Vị trí</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    value="{{ old('position') }}">
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @if (App\Models\Attribute::find($attrId)->type == 2)
                                <div class="col-md-6 mb-3">
                                    <label for="meta_value">Màu sắc</label>
                                    <input type="color" class="form-control form-control-color" id="meta_value"
                                        name="meta_value" value="{{ old('meta_value') }}">
                                    @error('meta_value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            <div class="col-12 mb-3">
                                <label for="desc">Mô tả</label>
                                <textarea class="form-control" id="desc" name="desc" rows="3">{{ old('desc') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Thao tác</h2>
                    </div>

                    <div class="card-body">
                        <div class="col-12 mb-3">
                            <button type="submit" class="w-100 btn btn-primary">Thêm mới</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
