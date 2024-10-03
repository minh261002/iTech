<div class="row border product-variable d-none">

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
                    @foreach ($attributes as $attribute)
                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                    @endforeach
                </select>

                <div id="attributes_result"></div>

                <button class="btn btn-primary mt-3" id="saveAttribute">Lưu thuộc tính</button>
            </div>

            <div class="tab-pane fade " id="v-pills-variation-variable" role="tabpanel"
                aria-labelledby="v-pills-variation-tab-variable">

                <div class="alert alert-danger" id="alert_error">
                    <i class="mdi mdi-alert"></i> Bạn cần lưu thuộc tính trước khi tạo các biến thể của sản phẩm
                </div>

                <div id="variation_result"></div>
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

            let url = "/admin/product/attributes"
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
                        attribute_variation_ids: variationIds
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
                    attributes: attributes
                },
                success: function(response) {
                    FuiToast.success('Lưu thuộc tính thành công');
                    $('#v-pills-variation-tab-variable').tab('show');
                    $('#alert_error').remove();
                    $('#variation_result').html(response);
                },
                error: function(xhr) {
                    FuiToast.error('Có lỗi xảy ra trong quá trình xử lý');
                    console.error(xhr.responseText);
                }
            });
        });

        $(document).on('click', '#btn_variation_action', function() {
            var type = $('#variation_action').val();
            var attributeId = $('#attribute_id').val();
            var attributeVariationIds = [];

            $('.box-attributes').each(function() {
                let variationIds = $(this).find('select.select2').val();
                if (variationIds && variationIds.length > 0) {
                    attributeVariationIds.push(...variationIds);
                }
            });


            if (!type || !attributeId || attributeVariationIds.length === 0) {
                return FuiToast.error('Vui lòng nhập đầy đủ thông tin');
            }

            $.ajax({
                url: "/admin/product/variations/create",
                type: 'GET',
                data: {
                    type: type,
                    attribute_id: attributeId,
                    attribute_variation_ids: attributeVariationIds
                },
                success: function(response) {
                    console.log(response);
                    FuiToast.success('Tạo biến thể thành công');
                },
                error: function(xhr) {
                    FuiToast.error('Có lỗi xảy ra trong quá trình tạo biến thể');
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
@endpush
