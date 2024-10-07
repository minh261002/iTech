@extends('admin.layouts.master')

@section('title', 'Thêm bài viết mới')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Quản lý bài viết</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form action="{{ route('admin.post.store') }}" class="row" method="POST">
            @csrf

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Thêm bài viết mới</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="title" class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title', $catalogue->title ?? '') }}">
                                <span class="error-title text-danger"></span>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="content" class="form-label">Nội dung</label>
                                <textarea name="content" class="ck-editor" id="ckDescription" {{ isset($disabled) ? 'disabled' : '' }}>{{ old('content') }}</textarea>
                                @error('content')
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
                        <h2 class="card-title">Danh mục</h2>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3" id="catalogues_result">

                            @error('catalogue_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-center mt-3">
                            <p id="loadMoreCategory" style="cursor:pointer">Xem thêm</p>
                            <p id="hideCategory" class="hidden" style="cursor:pointer">Ẩn bớt</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title">Tuỳ chọn</h2>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Bản Nháp</option>
                                <option value="0" {{ old('status') == 2 ? 'selected' : '' }}>Đã xuất bản</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="is_feature">Nổi bật</label>
                            <select name="is_featured" id="is_feature" class="form-control">
                                <option value="0" {{ old('is_feature') == 0 ? 'selected' : '' }}>Không nổi bật
                                </option>
                                <option value="1" {{ old('is_feature') == 1 ? 'selected' : '' }}>Nổi bật</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title">Ảnh đại diện</h2>
                    </div>

                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <span class="image img-cover image-target"><img class="w-100"
                                        src="{{ old('image', $catalogue->image ?? '') ? old('image', $catalogue->image ?? '') : asset('admin/assets/images/not-found.jpg') }}"
                                        alt=""></span>
                                <input type="hidden" name="image"
                                    value="{{ old('image', $catalogue->image ?? '') }}">
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
            $('#title').on('input', function() {
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
                    '{{ env('APP_URL') }}bai-viet/' +
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
                    '{{ env('APP_URL') }}bai-viet/' +
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

        // Load more category
        $(document).ready(function() {
            let offset = 0;
            let totalCategories = 0;
            const limit = 10;
            let keyword = '';

            function getCategories(hidePrevious = false) {
                let url = "{{ route('admin.post.catalogue.get') }}";
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        offset: offset,
                        search: keyword
                    },
                    beforeSend: function() {
                        $('#catalogues_result').append(
                            '<div class="d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>'
                        );
                    },
                    success: function(response) {
                        let catalogues = response.catalogues;
                        totalcatalogues = response.total;
                        let html = '';

                        catalogues.forEach(catalogue => {
                            html += `
                                <div class="form-check" style="margin-left: ${catalogue.depth * 20}px;">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        value="${catalogue.id}"
                                        name="catalogue_id[]"
                                        data-lft="${catalogue._lft}"
                                        data-rgt="${catalogue._rgt}"
                                        id="catalogue_id-${catalogue.id}"
                                        >
                                    <label class="form-check-label" for="catalogue_id-${catalogue.id}">
                                        ${catalogue.name}
                                    </label>
                                </div>
                            `;
                        });

                        if (hidePrevious) {
                            $('#catalogues_result').html(html);
                        } else {
                            $('#catalogues_result').append(html);
                        }

                        if (offset + catalogues.length >= totalcatalogues) {
                            $('#loadMoreCategory').hide();
                        } else {
                            $('#loadMoreCategory').show();
                        }

                        if (offset > 0) {
                            $('#hideCategory').show();
                        } else {
                            $('#hideCategory').hide();
                        }
                    },
                    complete: function() {
                        $('#catalogues_result').find('.spinner-border').remove();
                    }
                });
            }

            $('#loadMoreCategory').click(function() {
                offset += limit;
                getCategories();
            });

            $('#hideCategory').click(function() {
                offset = 0;
                getCategories(true);
            });

            $('#search_category').on('input', function() {
                clearTimeout($.data(this, 'timer'));
                let search = $(this).val();
                $(this).data('timer', setTimeout(function() {
                    keyword = search;
                    offset = 0;
                    getCategories(true);
                }, 500));
            });

            getCategories();
        })

        $(document).on('change', 'input[type="checkbox"]', function() {
            let lft = $(this).data('lft');
            let rgt = $(this).data('rgt');
            let checked = $(this).prop('checked');

            if (checked) {
                $('input[type="checkbox"]').each(function() {
                    let parentLft = $(this).data('lft');
                    let parentRgt = $(this).data('rgt');

                    if (parentLft < lft && parentRgt > rgt) {
                        $(this).prop('checked', true);
                    }
                });
            } else {
                $('input[type="checkbox"]').each(function() {
                    let parentLft = $(this).data('lft');
                    let parentRgt = $(this).data('rgt');

                    if (parentLft < lft && parentRgt > rgt) {
                        $(this).prop('checked', false);
                    }
                });
            }
        });
    </script>
@endpush
