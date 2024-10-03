<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    // --TRẠNG THÁI ĐƠN HÀNG--//
    //1. Chờ xác nhận: Đơn hàng đã được tạo và đang chờ xác nhận từ hệ thống hoặc người bán.
    //2. Đã xác nhận: Đơn hàng đã được người bán hoặc hệ thống xác nhận.
    //3. Đang xử lý: Đơn hàng đang được chuẩn bị và đóng gói.
    //4. Đang vận chuyển: Đơn hàng đã được bàn giao cho đơn vị vận chuyển và đang trên đường đến người nhận.
    //5. Đang giao hàng: Đơn hàng đang được giao tới địa chỉ người nhận.
    //6. Đã giao hàng: Đơn hàng đã được giao thành công đến người nhận.
    //7. Hoàn thành: Đơn hàng đã hoàn tất và được cập nhật trong hệ thống.
    //8. Đã hủy: Đơn hàng đã bị hủy trước khi hoàn tất.
    //9. Đã trả hàng: Đơn hàng đã được trả hàng và hoàn tiền cho người mua.

    // --TRẠNG THÁI THANH TOÁN--//
    //1. Chưa thanh toán: Đơn hàng chưa được thanh toán.
    //2. Đã thanh toán: Đơn hàng đã được thanh toán.

    // --TRẠNG THÁI VẬN CHUYỂN--//
    //__ĐANG CẬP NHẬT__

    // --PHƯƠNG THỨC VẬN CHUYỂN--//
    //1. Giao hàng tiết kiệm
    //2. Nhận hàng tại cửa hàng

    // --PHƯƠNG THỨC THANH TOÁN--//
    //1. Thanh toán khi nhận hàng
    //2. Chuyển khoản ngân hàng
    //3. Ví MoMo
    //4. Ví VNPay
}
