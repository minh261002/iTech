<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AttributeUpdateRequest extends FormRequest
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
            'id' => 'required|exists:attributes,id',
            'name' => 'required',
            'type' => 'required',
            'position' => 'required',
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
            'id.required' => 'Vui lòng nhập id',
            'id.exists' => 'Id không tồn tại',
            'name.required' => 'Vui lòng nhập tên thuộc tính',
            'type.required' => 'Vui lòng chọn loại thuộc tính',
            'position.required' => 'Vui lòng nhập vị trí',
        ];
    }
}