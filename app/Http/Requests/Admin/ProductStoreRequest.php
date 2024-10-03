<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'type' => 'required',
            'name' => 'required',
            'sku' => 'required',
            'desc' => 'nullable',
            'price' => 'required',
            'sale_price' => 'nullable',
            'category_id' => 'required|array',
            'category_id.*' => 'integer|exists:categories,id',
            'image' => 'nullable',
            'gallery' => 'nullable|array',
            'qty' => 'required',
            'meta_title' => 'nullable',
            'meta_desc' => 'nullable',
            'meta_keywords' => 'nullable',
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
            'type.required' => 'Vui lòng chọn loại sản phẩm',
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'sku.required' => 'Vui lòng nhập mã sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'category_id.required' => 'Vui lòng chọn danh mục sản phẩm',
            'category_id.*.integer' => 'Danh mục sản phẩm không hợp lệ',
            'category_id.*.exists' => 'Danh mục sản phẩm không tồn tại',
            'gallery.array' => 'Thư viện ảnh sản phẩm không hợp lệ',
            'qty.required' => 'Vui lòng nhập số lượng sản phẩm',
        ];
    }
}
