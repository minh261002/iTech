<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NotificationStoreRequest extends FormRequest
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
            'types' => 'required',
            'user_types' => 'nullable',
            'user_id' => 'nullable',
            'admin_types' => 'nullable',
            'admin_id' => 'nullable',
            'title' => 'required',
            'content' => 'required',
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
            'types.required' => 'Chọn đối tượng nhận thông báo!',
            'title.required' => 'Nhập tiêu đề thông báo!',
            'content.required' => 'Nhập nội dung thông báo!',
        ];
    }
}