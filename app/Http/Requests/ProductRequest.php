<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'category_id' => 'nullable|integer',
            'tag_id' => 'nullable|integer',
            'brand_id' => 'nullable|integer',
            'seller_id' => 'nullable|integer',
            'rating_id' => 'nullable|integer',
            'price' => 'required|numeric',
            'currency' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'in_stock' => 'nullable|boolean',
        ];
    }
}
