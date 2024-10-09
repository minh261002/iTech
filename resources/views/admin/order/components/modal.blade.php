<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">
                    Chọn sản phẩm
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <input type="text" class="form-control" placeholder="Nhập từ khoá sản phẩm"
                                id="search" />
                        </h5>
                    </div>

                    <div class="card-body" id="product-container">
                        @include('admin.order.components.box_product', [
                            'products' => $products,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
