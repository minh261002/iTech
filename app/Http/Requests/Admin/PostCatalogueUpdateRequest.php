<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostCatalogueUpdateRequest extends FormRequest
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
            'id' => 'required|integer|exists:post_catalogues,id',
            "name" => "required",
            "slug" => "nullable|unique:post_catalogues,slug",
            "parent_id" => "nullable|exists:post_catalogues,id",
            "desc" => "nullable",
            "status" => "required",
            'position' => 'required|integer',
            'image' => 'nullable',
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
            'id.required' => 'ID không được để trống',
            'id.integer' => 'ID phải là số nguyên',
            'id.exists' => 'ID không tồn tại',
            'name.required' => 'Tên danh mục không được để trống',
            'slug.unique' => 'Slug đã tồn tại',
            'parent_id.exists' => 'Danh mục cha không tồn tại',
            'status.required' => 'Trạng thái không được để trống',
            'position.required' => 'Vị trí không được để trống',
            'position.integer' => 'Vị trí phải là số nguyên',
        ];
    }
}