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
        $this->validate = [
            'product.type' => 'required', // Xác thực kiểu sản phẩm
            'product.name' => 'required|string|max:255', // Tên sản phẩm
            'product.sku' => 'required|string|max:100', // SKU
            'product.desc' => 'nullable|string', // Mô tả
            'product.price' => 'nullable', // Giá gốc
            'product.sale_price' => 'nullable', // Giá khuyến mãi
            'category_id' => 'required|array',
            'category_id.*' => 'required|integer|exists:categories,id', // Danh mục sản phẩm
            'product.image' => 'nullable', // Hình ảnh chính
            // 'product.gallery' => 'nullable|array',
            'product.qty' => 'nullable', // Số lượng sản phẩm
            'product.meta_title' => 'nullable|string|max:255', // Tiêu đề meta
            'product.meta_desc' => 'nullable|string', // Mô tả meta
            'product.meta_keywords' => 'nullable|string', // Từ khóa meta
            'product.status' => 'nullable', // Trạng thái
        ];

        $this->validate['gallery'] = ['nullable', 'array'];

        if ($this->input('product.type') == 1) {
            // Quy tắc cho sản phẩm đơn giản
            $this->validate['product.price'] = 'required|numeric|min:0';
        } elseif ($this->input('product.type') == 2) {
            $this->validate['product_attribute.attribute_id'] = ['required', 'array'];
            $this->validate['product_attribute.attribute_id.*'] = ['required'];
            $this->validate['product_attribute.attribute_variation_id'] = ['required', 'array'];
            $this->validate['product_attribute.attribute_variation_id.*'] = ['required', 'array'];
            $this->validate['product_attribute.attribute_variation_id.*.*'] = ['required'];
            $this->validate['products_variations.attribute_variation_id'] = ['nullable', 'array'];
            if ($this->input('products_variations.attribute_variation_id') && count($this->input('products_variations.attribute_variation_id')) > 0) {
                $this->validate['products_variations.id'] = ['required', 'array'];
                $this->validate['products_variations.id.*'] = ['required', 'integer'];
                $this->validate['products_variations.attribute_variation_id'] = ['nullable', 'array'];
                $this->validate['products_variations.attribute_variation_id.*'] = ['required', 'array'];
                $this->validate['products_variations.attribute_variation_id.*.*'] = ['required'];
                $this->validate['products_variations.image'] = ['required', 'array'];
                $this->validate['products_variations.price'] = ['required', 'array'];
                $this->validate['products_variations.price.*'] = ['required', 'numeric'];
                $this->validate['products_variations.sale_price'] = ['nullable', 'array'];
                $this->validate['products_variations.sale_price.*'] = ['nullable', 'numeric'];
                $this->validate['products_variations.qty'] = ['required', 'array'];
                $this->validate['products_variations.qty.*'] = ['required', 'integer'];
            }
        }

        return $this->validate;
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
            'category_id.required' => 'Vui lòng chọn danh mục sản phẩm',
            'category_id.*.integer' => 'Danh mục sản phẩm không hợp lệ',
            'category_id.*.exists' => 'Danh mục sản phẩm không tồn tại',
            'gallery.array' => 'Thư viện ảnh sản phẩm không hợp lệ',
            'qty.required' => 'Vui lòng nhập số lượng sản phẩm',
        ];
    }
}