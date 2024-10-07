<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderItemUpdateRequest extends FormRequest
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
            'id' => 'required|exists:slider_items,id',
            'slider_id' => 'required|exists:sliders,id',
            'title' => 'required',
            'link' => 'nullable',
            'position' => 'required',
            'image' => 'required',
            'mobile_image' => 'nullable',
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
            'slider_id.required' => 'Slider không được để trống',
            'slider_id.exists' => 'Slider không tồn tại',
            'title.required' => 'Tiêu đề không được để trống',
            'position.required' => 'Vị trí không được để trống',
            'image.required' => 'Ảnh không được để trống',
        ];
    }
}