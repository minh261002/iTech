@extends('admin.layouts.master')

@section('title', 'Cài đặt SEO')

@section('content')
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cài đặt SEO</li>
                    </ol>
                </nav>
            </div>
        </div>

        <form action="{{ route('admin.setting.seo') }}" class="row" method="POST">
            @csrf

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h2 class="card-title mb-0">Cài đặt SEO</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="seo-preview border p-2 rounded mb-3">
                                    <div class="d-flex align-items-center justify-content-start gap-2 mb-2">
                                        <img src="{{ asset(config('settings.site_favicon')) }}" alt=""
                                            width="35px">

                                        <div class="col-12">
                                            <p class="mb-0 fs-20">{{ config('settings.site_name') }}</p>
                                            <div class="seo-preview-url fs-14">
                                                <span class="seo-preview-link-content">{{ env('APP_URL') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="seo-preview-title">
                                        <span class="seo-preview-title-content ">{{ config('settings.meta_title') }}</span>
                                    </div>

                                    <div class="seo-preview-description">

                                        <span
                                            class="seo-preview-description-content text-muted">{{ config('settings.meta_description') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="meta_title" class="form-label">
                                    Tiêu đề SEO
                                </label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title"
                                    value="{{ old('meta_title', config('settings.meta_title')) }}">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="meta_description" class="form-label">Mô tả SEO</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', config('settings.meta_description')) }}</textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="meta_keywords" class="form-label">Từ khóa SEO (Phân cách bằng dấu phẩy)</label>
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                    value="{{ old('meta_keywords', config('settings.meta_keywords')) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
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
            $('#meta_title').on('input', function() {
                $('.seo-preview-title-content').text($(this).val());
                if ($(this).val() == '') {
                    $('.seo-preview-title-content').text('{{ config('settings.site_name') }}');
                }
            });

            $('#meta_description').on('input', function() {
                $('.seo-preview-description-content').text($(this).val());
                if ($(this).val() == '') {
                    $('.seo-preview-description-content').text(
                        '{{ config('settings.meta_description') }}');
                }
            });
        })
    </script>
@endpush
