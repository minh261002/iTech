<div class="row border product-variable {{ isset($style) ? $style : ' d-none ' }}">

    <div class="col-md-3 p-0 border">
        <div class="nav flex-column nav-pills" id="v-pills-tab-variable" role="tablist" aria-orientation="vertical">
            <a class="nav-link rounded-0 active" id="v-pills-attribute-tab-variable" data-bs-toggle="pill"
                href="#v-pills-attribute-variable" role="tab" aria-controls="v-pills-attribute-variable"
                aria-selected="false" tabindex="-1">
                Các thuộc tính
            </a>

            <a class="nav-link rounded-0 " id="v-pills-variation-tab-variable" data-bs-toggle="pill"
                href="#v-pills-variation-variable" role="tab" aria-controls="v-pills-variation-variable"
                aria-selected="false" tabindex="-1">
                Các biến thể
            </a>
        </div>
    </div>

    <div class="col-md-9">
        <div class="tab-content p-0 py-2 text-muted mt-md-0" id="v-pills-tabContent-variable">
            <div class="tab-pane fade active show" id="v-pills-attribute-variable" role="tabpanel"
                aria-labelledby="v-pills-attribute-tab-variable">
                <select name="attribute_id" id="attribute_id" class="form-control">
                    <option value="">Chọn thuộc tính</option>
                    @foreach ($attributes as $key => $attribute)
                        <option value="{{ $key }}"
                            {{ isset($product) ? ($product->productAttributes->contains('attribute_id', $key) ? 'disabled' : '') : '' }}>
                            {{ $attribute }}</option>
                    @endforeach
                </select>

                <div id="attributes_result">
                    @isset($product)
                        @foreach ($product->productAttributes as $productAttribute)
                            @include('admin.product.components.box_attribute', [
                                'attribute' => $productAttribute->attribute,
                                'productAttributeId' => $productAttribute->id,
                                'attributeVariations' => $productAttribute->attributeVariations,
                            ])
                        @endforeach
                    @endisset
                </div>

                <button class="btn btn-primary mt-3" id="saveAttribute">Lưu thuộc tính</button>
            </div>

            <div class="tab-pane fade " id="v-pills-variation-variable" role="tabpanel"
                aria-labelledby="v-pills-variation-tab-variable">

                <div class="variation_result accordion" id="accordion">
                    @if (isset($product) && $product->productAttributes->count() > 0)
                        @include('admin.product.components.box_variation', [
                            'productVariations' => $product->productVariations,
                            'arrProductAttributes' => $product->arrProductAttributes,
                        ])
                    @else
                        @include('admin.product.components.no-variation')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#qty-variable').on('keyup', function() {
            let qty = $(this).val();
            if (qty <= 0) {
                $('#status_warehouse_variable').css('border-color', 'red');
                $('#status_warehouse_variable').css('color', 'red');
                $('#status_warehouse_variable').val('Hết hàng');
            } else {
                $('#status_warehouse_variable').css('border-color', 'green');
                $('#status_warehouse_variable').css('color', 'green');
                $('#status_warehouse_variable').val('Còn hàng');
            }
        });

        $('#attribute_id').on('change', function(e) {
            e.preventDefault();
            let attribute_id = $('#attribute_id').val();

            if ($(`#attributes_result #check-attribute-${attribute_id}`).length) {
                return FuiToast.error('Thuộc tính đã tồn tại');
            }

            if (attribute_id == '') {
                return FuiToast.error('Vui lòng chọn thuộc tính');
            }

            let url = "/admin/product/attributes/get";
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    attribute_id: attribute_id
                },
                success: function(response) {
                    $('#attributes_result').append(response);
                    $('.select2').select2();
                }

            });
        });

        $('#saveAttribute').on('click', function(e) {
            e.preventDefault();

            if ($('#attribute_id').val() === '') {
                return FuiToast.error('Vui lòng chọn thuộc tính');
            }

            let attributes = [];


            $('.box-attributes').each(function() {
                let attributeId = $(this).attr('id').replace('check-attribute-', '');
                let variationIds = $(this).find('select.select2').val();

                if (variationIds && variationIds.length > 0) {
                    attributes.push({
                        attribute_id: attributeId,
                        attribute_variation_id: variationIds // Đảm bảo tên trường đúng
                    });
                }
            });

            if (attributes.length === 0) {
                return FuiToast.error('Vui lòng chọn ít nhất một biến thể');
            }

            $.ajax({
                url: "/admin/product/variations/check",
                type: 'GET',
                data: {
                    product_attribute: attributes,
                },
                success: function(response) {
                    FuiToast.success('Lưu thuộc tính thành công');
                    $('#v-pills-variation-tab-variable').tab('show');
                    $('#alert_error').remove();
                    $('.variation_result').append(response);
                },
                error: function(xhr) {
                    FuiToast.error('Có lỗi xảy ra trong quá trình xử lý');
                    console.error(xhr.responseText);
                }
            });
        });

        $(document).on('click', '#btn_variation_action', function() {
            var productAttributes = {
                attribute_id: [],
                attribute_variation_id: []
            };

            $('#attributes_result').find('.box-attributes').each(function() {
                var attributeId = parseInt($(this).attr('id').replace('check-attribute-', ''));
                var variationIds = $(this).find('select.select2').val() || [];

                if (variationIds.length > 0) {
                    productAttributes.attribute_id.push(attributeId);

                    productAttributes.attribute_variation_id.push(variationIds.map(Number));
                }
            });

            var payload = {
                product_attribute: productAttributes,
                variation_action: parseInt($('#variation_action').val())
            };

            $.ajax({
                url: "/admin/product/variations/create",
                type: 'GET',
                contentType: 'application/json',
                data: payload,
                success: function(response) {
                    FuiToast.success('Tạo biến thể thành công');
                    $('.variation_result').append(response);
                },
                error: function(xhr) {
                    FuiToast.error('Có lỗi xảy ra trong quá trình tạo biến thể');
                    console.error(xhr.responseText);
                }
            });
        });

        $(document).on('click', '.btn-ckfinder', function() {
            var inputId = $(this).data('input-id'); // Lấy id của input ẩn
            var imgTag = $(this).find('img'); // Lấy thẻ img bên trong span để cập nhật ảnh

            CKFinder.popup({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function(finder) {
                    finder.on('files:choose', function(evt) {
                        var file = evt.data.files.first();
                        $(`#${inputId}`).val(file.getUrl()); // Cập nhật URL vào input ẩn
                        imgTag.attr('src', file.getUrl()); // Cập nhật hình ảnh hiển thị

                        console.log($(this).data('input-id'));
                    });

                    finder.on('file:choose:resizedImage', function(evt) {
                        var file = evt.data.resizedUrl;
                        $(`#${inputId}`).val(file); // Cập nhật URL resized vào input ẩn
                        imgTag.attr('src', file); // Cập nhật hình ảnh resized hiển thị
                    });
                }
            });
        });

        $(document).on('click', '.remove-attribute', function() {
            $(this).closest('.box-attributes').remove();
        });

        $(document).on('click', '.remove-product-variation-item', function() {
            $(this).closest('.wrap-item-product-variation').remove();
        });
    </script>
@endpush
