<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FurnitureRequest extends FormRequest
{
    // Определяем, что запрос авторизован
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'in_stock' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The furniture name is required.',
            'description.required' => 'A description of the furniture is required.',
            'price.required' => 'Please specify the price of the furniture.',
            'in_stock.required' => 'Please specify if the item is in stock.',
        ];
    }
}
