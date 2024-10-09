@forelse ($products as $product)
    <div class="list-group">
        <div class="list-group-item">
            <div class="row align-items-center click-{{ $product['id'] }}" style="cursor: pointer;">
                <div class="col-auto">
                    <img class="avatar" src="{{ asset($product['image']) }}" alt="" width="50">
                </div>

                <div class="col text-truncate d-flex justify-content-between">
                    <div class="">
                        <span class="d-block fw-medium">
                            {{ $product['name'] }}
                        </span>
                        <span class="">
                            SKU: {{ $product['sku'] }}
                        </span>

                        @if ($product['type'] == 1)
                            <span class="d-block ">
                                @if ($product['sale_price'])
                                    <del class="text-muted">{{ format_price($product['price']) }}</del>
                                    <span
                                        class="text-danger fw-medium">{{ format_price($product['sale_price']) }}</span>
                                @else
                                    {{ format_price($product['price']) }}
                                @endif
                            </span>
                        @endif
                    </div>
                </div>

                @if ($product['type'] == 2 && is_array($product['product_variation']))
                    <ul class="product-variations mt-1 product-variations-{{ $product['id'] }} d-none">
                        @foreach ($product['product_variation'] as $key => $var)
                            {{-- @dump($key, $var) --}}
                            <li class="mb-1 product-variations-item">
                                <div class="row">
                                    <div class="col">
                                        <small class="text-success">
                                            {{-- {{ implode(' - ', array_column($product['product_variation']['attribute_variations'], 'name')) }} --}}
                                        </small>

                                        <small>
                                            <span class="mx-1">-</span>
                                            {{-- @if ($var['sale_price'] != null)
                                                <del class="text-muted">{{ format_price($var['price']) }}</del>
                                                <span
                                                    class="text-danger fw-medium">{{ format_price($var['sale_price']) }}</span>
                                            @else
                                                {{ format_price($var['price']) }}
                                            @endif --}}
                                        </small>
                                    </div>

                                    <div class="col-auto">
                                        <button type="button"
                                            class="btn add-product-variation btn-sm btn-outline-primary"
                                            style="cursor: pointer" data-product-id="{{ $product['id'] }}">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if ($product['type'] == 1)
                    <div class="col-auto">
                        <button type="button" class="btn add-product-variation btn-sm btn-outline-primary"
                            data-product-id="{{ $product['id'] }}">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.click-{{ $product['id'] }}').click(function() {
                $('.product-variations-{{ $product['id'] }}').toggleClass('d-none');
            });
        });
    </script>
@empty
    <div class="list-group">
        <div class="list-group-item">
            <div class="row align-items-center">
                <div class="col text-center">
                    <span class="text-muted">Không có sản phẩm nào</span>
                </div>
            </div>
        </div>
    </div>
@endforelse
