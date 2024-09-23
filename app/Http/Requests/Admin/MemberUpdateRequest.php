<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MemberUpdateRequest extends FormRequest
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
            'id' => 'required|exists:users,id',
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'nullable|min:6|confirmed',
            'province_id' => 'nullable',
            'district_id' => 'nullable',
            'ward_id' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable',
            'birthday' => 'nullable',
            'image' => 'nullable',
            'description' => 'nullable',
            'status' => 'required',
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
            'id.exists' => 'ID không tồn tại',
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'status.required' => 'Vui lòng chọn trạng thái',
        ];
    }

}
