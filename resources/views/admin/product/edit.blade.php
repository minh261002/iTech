@extends('admin.layouts.master')

@section('title', 'Chỉnh sửa thông tin')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Quản lý sản phẩm</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form action="{{ route('admin.product.update', $product->id) }}" class="row" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title mb-0">Thông tin sản phẩm</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="name" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="product[name]"
                                    value="{{ old('product[name]', $product->name) }}">
                                @error('product[name]')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="sku" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="sku" name="product[sku]"
                                    value="{{ old('product[sku]', $product->sku) }}">
                                @error('product[sku]')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="desc" class="form-label">Mô tả</label>
                                <textarea class="form-control ck-editor" id="desc" name="product[desc]" rows="5">{!! $product->desc !!}</textarea>
                                @error('product[desc]')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Bộ sưu tập ảnh</h2>
                        <div class="upload-album"><a href="" class="upload-picture">Tải lên</a></div>
                    </div>
                    @php
                        $product->gallery ? ($gallery = json_decode($product->gallery)) : ($gallery = []);
                    @endphp
                    <div class="card-body">
                        <div class="col-lg-12">
                            @if (!isset($gallery) || count($gallery) == 0)
                                <div class="click-to-upload">
                                    <div class="icon">
                                        <a href="" class="upload-picture">
                                            <svg style="width:80px;height:80px;fill: #d3dbe2;margin-bottom: 10px;"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
                                                <path
                                                    d="M80 57.6l-4-18.7v-23.9c0-1.1-.9-2-2-2h-3.5l-1.1-5.4c-.3-1.1-1.4-1.8-2.4-1.6l-32.6 7h-27.4c-1.1 0-2 .9-2 2v4.3l-3.4.7c-1.1.2-1.8 1.3-1.5 2.4l5 23.4v20.2c0 1.1.9 2 2 2h2.7l.9 4.4c.2.9 1 1.6 2 1.6h.4l27.9-6h33c1.1 0 2-.9 2-2v-5.5l2.4-.5c1.1-.2 1.8-1.3 1.6-2.4zm-75-21.5l-3-14.1 3-.6v14.7zm62.4-28.1l1.1 5h-24.5l23.4-5zm-54.8 64l-.8-4h19.6l-18.8 4zm37.7-6h-43.3v-51h67v51h-23.7zm25.7-7.5v-9.9l2 9.4-2 .5zm-52-21.5c-2.8 0-5-2.2-5-5s2.2-5 5-5 5 2.2 5 5-2.2 5-5 5zm0-8c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3zm-13-10v43h59v-43h-59zm57 2v24.1l-12.8-12.8c-3-3-7.9-3-11 0l-13.3 13.2-.1-.1c-1.1-1.1-2.5-1.7-4.1-1.7-1.5 0-3 .6-4.1 1.7l-9.6 9.8v-34.2h55zm-55 39v-2l11.1-11.2c1.4-1.4 3.9-1.4 5.3 0l9.7 9.7c-5.2 1.3-9 2.4-9.4 2.5l-3.7 1h-13zm55 0h-34.2c7.1-2 23.2-5.9 33-5.9l1.2-.1v6zm-1.3-7.9c-7.2 0-17.4 2-25.3 3.9l-9.1-9.1 13.3-13.3c2.2-2.2 5.9-2.2 8.1 0l14.3 14.3v4.1l-1.3.1z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="small-text">
                                        <p>Click vào nút "Tải lên" để thêm ảnh</p>
                                    </div>
                                </div>
                            @endif

                            <div class="upload-list {{ isset($gallery) && count($gallery) ? '' : 'hidden' }}">
                                <ul id="sortable" class="clearfix data-album sortui ui-sortable">
                                    @if (isset($gallery) && count($gallery))
                                        @foreach ($gallery as $key => $val)
                                            <li class="ui-state-default">
                                                <div class="thumb">
                                                    <span class="span image img-scaledown">
                                                        <img src="{{ $val }}" alt="{{ $val }}">
                                                        <input type="hidden" name="gallery[]" value="{{ $val }}">
                                                    </span>
                                                    <button class="delete-image">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-start gap-2">
                        <h2 class="card-title mb-0">
                            Loại sản phẩm
                        </h2>
                        <span>----</span>
                        <select name="product[type]" id="type" class="form-select w-25">
                            <option value="1" {{ $product->type == 1 ? 'selected' : '' }}>Sản phẩm đơn giản</option>
                            <option value="2" {{ $product->type == 2 ? 'selected' : '' }}>Sản phẩm có biến thể
                            </option>
                        </select>
                    </div>

                    <div class="card-body">


                        @include('admin.product.components.simple_type', [
                            'product' => $product,
                            'style' => 'd-none',
                        ])

                        @include('admin.product.components.variable_type', [
                            'style' => 'd-flex',
                            'product' => $product,
                        ])

                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">SEO</h2>
                    </div>

                    <div class="card-body">
                        <div class="seo-preview border p-2 rounded mb-3">
                            <div class="seo-preview-title">
                                <span class="seo-preview-title-content">
                                    {{ $product->meta_title ?? $product->name }}
                                </span>
                            </div>
                            <div class="seo-preview-url">
                                <span class="seo-preview-link-content">{{ env('APP_URL') }}san-pham/{{ $product->slug }}
                                </span>
                            </div>
                            <div class="seo-preview-description">

                                <span class="seo-preview-description-content">
                                    {{ $product->meta_desc ?? 'Mô tả SEO' }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="meta_title" class="form-label">Tiêu đề SEO</label>
                            <input type="text" class="form-control" id="meta_title" name="product[meta_title]"
                                value="{{ $product->meta_title }}">
                            <span class="error-title text-danger"></span>
                            @error('product[meta_title]')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="meta_description" class="form-label">Mô tả SEO</label>
                            <textarea name="product[meta_desc]" class="form-control" id="meta_description">{{ $product->meta_desc }}</textarea>
                            <span class="error-desc text-danger"></span>
                            @error('product[meta_desc]')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="meta_keywords" class="form-label">Từ khóa SEO
                                (Phân cách bằng dấu phẩy)
                            </label>
                            <input type="text" class="form-control" id="meta_keywords" name="product[meta_keywords]"
                                value="{{ $product->meta_keywords }}">
                            @error('product[meta_keywords]')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title">Trạng thái</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <select name="product[status]" id="status" class="form-select">
                                <option value="1"
                                    {{ old('product[status]', $product->status) == 1 ? 'selected' : '' }}>Bản nháp</option>
                                <option value="2"
                                    {{ old('product[status]', $product->status) == 2 ? 'selected' : '' }}>Đã xuất bản
                                </option>
                            </select>
                            @error('product[status]')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header ">
                        <h2 class="card-title">Danh mục sản phẩm</h2>

                        <input type="text" class="form-control" id="search_category" placeholder="Tìm kiếm danh mục">
                    </div>
                    <div class="card-body">
                        <div class="form-group" id="categories_result">

                            @error('category_id')
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
                        <h2 class="card-title">Ảnh đại diện</h2>
                    </div>

                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <span class="image img-cover image-target"><img class="w-100"
                                        src="{{ asset($product->image ?? 'admin/assets/images/not-found.jpg') }}"
                                        alt=""></span>
                                <input type="hidden" name="product[image]"
                                    value="{{ old('image', $product->image ?? '') }}">
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
                            <button type="submit" class="w-100 btn btn-primary">Lưu Thay Đổi</button>
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
                    '{{ env('APP_URL') }}san-pham/' +
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
                    '{{ env('APP_URL') }}san-pham/' +
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

            $('#type').on('change', function() {
                let type = $(this).val();
                if (type == 2) {
                    $('.product-variable').removeClass('d-none');
                    $('.product-simple').addClass('d-none');
                } else {
                    $('.product-variable').addClass('d-none');
                    $('.product-simple').removeClass('d-none');
                }
            });
        });

        // Load more category
        $(document).ready(function() {
            let offset = 0;
            let totalCategories = 0;
            const limit = 10;
            let keyword = '';

            let list_categories = {{ json_encode($product->categories->pluck('id')) }};

            function getCategories(hidePrevious = false) {
                let url = "{{ route('admin.category.get') }}";
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        offset: offset,
                        search: keyword
                    },
                    beforeSend: function() {
                        $('#categories_result').append(
                            '<div class="d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>'
                        );
                    },
                    success: function(response) {
                        let categories = response.categories;
                        totalCategories = response.total;
                        let html = '';

                        categories.forEach(category => {
                            html += `
                                <div class="form-check" style="margin-left: ${category.depth * 20}px;">
                                    <input class="form-check-input"
                                        type="checkbox" value="${category.id}"
                                        name="category_id[]"
                                        data-lft="${category._lft}"
                                        data-rgt="${category._rgt}"
                                        id="category_id-${category.id}"
                                        ${list_categories.includes(category.id) ? 'checked' : ''}
                                        >
                                    <label class="form-check-label" for="category_id-${category.id}">
                                        ${category.name}
                                    </label>
                                </div>
                            `;

                        });

                        if (hidePrevious) {
                            $('#categories_result').html(html);
                        } else {
                            $('#categories_result').append(html);
                        }

                        if (offset + categories.length >= totalCategories) {
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
                        $('#categories_result').find('.spinner-border').remove();
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
