<div class="row border product-simple {{ $style ?? '' }}">
    <div class="col-md-3 p-0 border">
        <div class="nav flex-column nav-pills" id="v-pills-tab-simple" role="tablist" aria-orientation="vertical">
            <a class="nav-link rounded-0 active" id="v-pills-price-tab" data-bs-toggle="pill" href="#v-pills-price"
                role="tab" aria-controls="v-pills-price" aria-selected="true">
                Giá sản phẩm
            </a>
            <a class="nav-link rounded-0" id="v-pills-warehouse-tab-simple" data-bs-toggle="pill"
                href="#v-pills-warehouse-simple" role="tab" aria-controls="v-pills-warehouse-simple"
                aria-selected="false" tabindex="-1">
                Quản lý tồn kho
            </a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="tab-content p-0 py-2 text-muted mt-md-0" id="v-pills-tabContent-simple">
            <div class="tab-pane fade active show" id="v-pills-price" role="tabpanel"
                aria-labelledby="v-pills-price-tab">
                <div class="col-12 mb-3">
                    <label for="price" class="form-label">Giá gốc</label>
                    <input type="text" class="form-control" id="price" name="product[price]"
                        value="{{ old('product[price]', $product->price ?? '') }}">
                    @error('product[price]')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="sale_price" class="form-label">Giá bán</label>
                    <input type="text" class="form-control" id="sale_price" name="product[sale_price]"
                        value="{{ old('product[sale_price]', $product->sale_price ?? '') }}">
                    @error('product[sale_price]')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="tab-pane fade" id="v-pills-warehouse-simple" role="tabpanel"
                aria-labelledby="v-pills-warehouse-tab-simple">
                <div class="col-12 mb-3">
                    <label for="qty" class="form-label">Số lượng</label>
                    <input type="number" class="form-control" id="qty" name="product[qty]"
                        value="{{ old('product[qty]', $product->qty ?? '') }}">
                    @error('product[qty]')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label for="status_warehouse_simple" class="form-label">Trạng thái tồn
                        kho</label>
                    <input type="text" class="form-control" id="status_warehouse_simple" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $('#qty').on('keyup', function() {
            let qty = $(this).val();
            if (qty <= 0) {
                $('#status_warehouse_simple').css('border-color', 'red');
                $('#status_warehouse_simple').css('color', 'red');
                $('#status_warehouse_simple').val('Hết hàng');
            } else {
                $('#status_warehouse_simple').css('border-color', 'green');
                $('#status_warehouse_simple').css('color', 'green');
                $('#status_warehouse_simple').val('Còn hàng');
            }
        });
    </script>
@endpush
