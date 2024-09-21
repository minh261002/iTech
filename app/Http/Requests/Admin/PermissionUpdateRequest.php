<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PermissionUpdateRequest extends FormRequest
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
            'id' => 'required|exists:permissions,id',
            'title' => 'required|unique:permissions,title,' . $this->id,
            'name' => 'required|unique:permissions,name,' . $this->id,
            'guard_name' => 'required',
            'module_id' => 'nullable',
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
            'title.required' => 'Tiêu đề không được để trống',
            'title.unique' => 'Tiêu đề đã tồn tại',
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại',
            'guard_name.required' => 'Không được để trống',
        ];
    }
}