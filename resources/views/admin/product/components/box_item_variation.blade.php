<div class="wrap-item-product-variation ui-sortable-handle bg-white">
    <div class="d-flex shadow-sm justify-content-between align-items-center border-bottom">
        <div class="wrap-select-attribute-for-variation d-flex gap-2 flex-fill p-2">
            @foreach ($attributeVariations as $keyParent => $attributeVariation)
                <select
                    name="products_variations[attribute_variation_id][{{ $identity ?? ($productVariation->id ?? '') }}][]"
                    class="form-select" required>
                    @foreach ($attributeVariation as $key => $value)
                        <option value="{{ $key }}"
                            {{ isset($selected[$keyParent]) && $selected[$keyParent] == $key ? 'selected' : '' }}
                            {{ isset($productVariation) && in_array($key, $productVariation->attributeVariations) ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            @endforeach
        </div>

        <div class="wrap-action d-flex justify-content-end align-items-center flex-fill p-2 gap-2"
            data-bs-toggle="collapse" data-bs-target="#collapseVariation{{ $identity ?? ($productVariation->id ?? '') }}"
            aria-expanded="false" aria-controls="collapseVariation{{ $identity ?? ($productVariation->id ?? '') }}">
            <button type="button" class="d-flex flex-end btn btn-sm btn-danger remove-product-variation-item">
                <i class="mdi mdi-close"></i>
            </button>
        </div>
    </div>
    <div class="collapse" id="collapseVariation{{ $identity ?? ($productVariation->id ?? '') }}">

        <input type="hidden" class="input-product-attribute-id"
            name="products_variations[id][{{ $identity ?? ($productVariation->id ?? '') }}]"
            value="{{ $productVariation->id ?? 0 }}" />

        <div class="row g-0 p-3 bg-light">
            <div class="col-12 col-md-6 pe-md-3">
                <label for="">{{ __('Hình ảnh') }}</label>
                <div class="form-group">
                    <span
                        class="btn-ckfinder image img-cover image-target{{ $identity ?? ($productVariation->id ?? '') }}"
                        data-input-id="productVariationImage{{ $identity ?? ($productVariation->id ?? '') }}">
                        <img class="w-100"
                            src="{{ asset($productVariation->image ?? 'admin/assets/images/not-found.jpg') }}"
                            alt="">
                    </span>
                    <input type="hidden"
                        data-input-id="productVariationImage{{ $identity ?? ($productVariation->id ?? '') }}"
                        name="products_variations[image][{{ $identity ?? ($productVariation->id ?? '') }}]"
                        id="productVariationImage{{ $identity ?? ($productVariation->id ?? '') }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label for="">Giá gốc</label>
                    <input type="text" id="inputPVP{{ $identity ?? ($productVariation->id ?? '') }}"
                        name="products_variations[price][{{ $identity ?? ($productVariation->id ?? '') }}]"
                        value="{{ $productVariation->price ?? '' }}" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="">Giá bán</label>
                    <input type="text"
                        name="products_variations[sale_price][{{ $identity ?? ($productVariation->id ?? '') }}]"
                        value="{{ $productVariation->sale_price ?? '' }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Số lượng</label>
                    <input type="text"
                        name="products_variations[qty][{{ $identity ?? ($productVariation->id ?? '') }}]"
                        value="{{ $productVariation->qty ?? '' }}" class="form-control" required />
                </div>
            </div>
        </div>
    </div>
</div>
