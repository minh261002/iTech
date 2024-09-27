<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AttributeVariationUpdateRequest extends FormRequest
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
            'id' => 'required|exists:attribute_variations,id',
            'attribute_id' => 'required|exists:attributes,id',
            'name' => 'required',
            'position' => 'required',
            'meta_value' => 'nullable',
            'desc' => 'nullable',
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
            'attribute_id.required' => 'Vui lòng chọn thuộc tính',
            'attribute_id.exists' => 'Thuộc tính không tồn tại',
            'name.required' => 'Vui lòng nhập tên biến thể',
            'position.required' => 'Vui lòng nhập vị trí',
        ];
    }
}