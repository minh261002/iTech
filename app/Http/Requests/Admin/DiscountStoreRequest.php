<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DiscountStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|unique:discounts,code',
            'max_usage' => 'nullable',
            'min_order_amount' => 'nullable',
            'type' => 'required',
            'discount_value' => 'nullable',
            'percent_value' => 'nullable',
            'user_id' => 'nullable',
            'product_id' => 'nullable',
            'product_variation_id' => 'nullable',
            'date_start' => 'required',
            'date_end' => 'required',
            'status' => 'required',
            'description' => 'nullable',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'code.required' => 'Mã giảm giá không được để trống',
            'code.unique' => 'Mã giảm giá đã tồn tại',
            'discount_type.required' => 'Loại giảm giá không được để trống',
            'date_start.required' => 'Ngày bắt đầu không được để trống',
            'date_end.required' => 'Ngày kết thúc không được để trống',
            'status.required' => 'Trạng thái không được để trống',
        ];
    }
}
