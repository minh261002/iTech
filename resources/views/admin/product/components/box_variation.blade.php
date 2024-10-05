<div class="d-flex align-items-center justify-content-between">
    <select name="variation_action" id="variation_action" class="form-control">
        <option value="1">Thêm biến thể</option>
        <option value="2">Tạo biến thể từ tất cả các thuộc tính</option>
    </select>

    <button type="button" class="btn btn-primary" id="btn_variation_action">Thêm</button>
</div>

@isset($productVariations)
    @foreach ($productVariations as $productVariation)
        @include('admin.product.components.box_item_variation', [
            'productVariation' => $productVariation,
            'attributeVariations' => $arrProductAttributes,
        ])
    @endforeach
@endisset
