@extends('admin.layouts.master')

@section('title', 'Thêm danh mục mới')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Quản lý danh mục sản
                                phẩm</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form action="{{ route('admin.category.store') }}" class="row" method="POST">
            @csrf

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Thêm danh mục sản phẩm</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="position" class="form-label">Vị Trí</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    value="{{ old('position') }}">
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Danh mục cha</label>
                                <select class="form-control select2" name="parent_id" id="parent_id">
                                    <option value="">-- Chọn danh mục cha --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ generate_text_depth_tree($category->depth) }}
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Trạng thái</label>
                                <select class="form-select" name="status" id="status">
                                    <option value="1">Bản nháp</option>
                                    <option value="2">Đã xuất bản</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="desc" class="form-label">Mô tả</label>
                                <textarea name="description" class="ck-editor" id="ckDescription" {{ isset($disabled) ? 'disabled' : '' }}>{{ old('description') }}</textarea>
                                @error('desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title">SEO</h2>
                    </div>

                    <div class="card-body">
                        <div class="seo-preview border p-2 rounded mb-3">
                            <div class="seo-preview-title">
                                <span class="seo-preview-title-content">Tiêu đề SEO</span>
                            </div>
                            <div class="seo-preview-url">
                                <span class="seo-preview-link-content">{{ env('APP_URL') }}</span>
                            </div>
                            <div class="seo-preview-description">

                                <span class="seo-preview-description-content">Mô tả SEO</span>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="meta_title" class="form-label">Tiêu đề SEO</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{ old('meta_title') }}">
                            <span class="error-title text-danger"></span>
                            @error('meta_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="meta_description" class="form-label">Mô tả SEO</label>
                            <textarea name="meta_description" class="form-control" id="meta_description">{{ old('meta_description') }}</textarea>
                            <span class="error-desc text-danger"></span>
                            @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="meta_keywords" class="form-label">Từ khóa SEO
                                (Phân cách bằng dấu phẩy)
                            </label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                value="{{ old('meta_keywords') }}">
                            @error('meta_keywords')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title">Ảnh đại diện</h2>
                    </div>

                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <span class="image img-cover image-target"><img class="w-100"
                                        src="{{ old('image', $category->image ?? '') ? old('image', $category->image ?? '') : asset('admin/assets/images/not-found.jpg') }}"
                                        alt=""></span>
                                <input type="hidden" name="image" value="{{ old('image', $category->image ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title">Thao tác</h2>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#name').on('input', function() {
                let title = $(this).val();
                if ($('#meta_title').val()) {
                    title = $('#meta_title').val();
                }


                if (title.length > 70) {
                    $(this).css('border-color', 'red');
                    $('.error-title').text('Tiêu đề không nên vượt quá 70 ký tự');
                } else {
                    $(this).css('border-color', '#ced4da');
                    $('.error-title').text('');
                }

                $('.seo-preview-link-content').text(
                    '{{ env('APP_URL') }}chuyen-muc/' +
                    slugify(title));
                $('.seo-preview-title-content').text(title);

            });

            $('#meta_title').on('input', function() {
                let meta_title = $(this).val();

                if (meta_title.length > 70) {
                    $(this).css('border-color', 'red');
                    $('.error-title').text('Tiêu đề SEO không nên vượt quá 70 ký tự');
                } else {
                    $(this).css('border-color', '#ced4da');
                    $('.error-title').text('');
                }

                $('.seo-preview-title-content').text(meta_title);
                $('.seo-preview-link-content').text(
                    '{{ env('APP_URL') }}chuyen-muc/' +
                    slugify(meta_title));
            });

            $('#meta_description').on('input', function() {
                let meta_description = $(this).val();

                if (meta_description.length > 160) {
                    $(this).css('border-color', 'red');
                    $('.error-desc').text('Mô tả SEO không nên vượt quá 160 ký tự');
                } else {
                    $(this).css('border-color', '#ced4da');
                    $('.error-desc').text('');
                }
                $('.seo-preview-description-content').text(meta_description);
            });


            function slugify(input) {
                if (!input)
                    return '';

                // make lower case and trim
                var slug = input.toLowerCase().trim();

                // remove accents from charaters
                slug = slug.normalize('NFD').replace(/[\u0300-\u036f]/g, '')

                // replace invalid chars with spaces
                slug = slug.replace(/[^a-z0-9\s-]/g, ' ').trim();

                // replace multiple spaces or hyphens with a single hyphen
                slug = slug.replace(/[\s-]+/g, '-');

                return slug;
            }
        })
    </script>
@endpush
