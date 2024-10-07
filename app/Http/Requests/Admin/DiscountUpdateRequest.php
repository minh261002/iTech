<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DiscountUpdateRequest extends FormRequest
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
            'id' => 'required|exists:discounts,id',
            'code' => 'required|unique:discounts,code,' . $this->id,
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
}