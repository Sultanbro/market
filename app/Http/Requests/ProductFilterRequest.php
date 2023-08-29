<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            '*id' => 'nullable|numeric',
            '*name' => 'required|string|alpha',
            '*slug' => 'nullable|string|alpha',
            '*category_id' => 'nullable|numeric',
            '*price' => 'nullable|numeric',
            '*length' => 'nullable|numeric',
            '*width' => 'nullable|numeric',
            '*weight' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'id.numeric' => 'Поле "id" должно быть числом',
            'name.alpha' => 'Поле "name" должно быть строкой и содержать только буквенные символы',
            'slug.string' => 'Поле "slug" должно быть строкой и содержать только буквенные символы',
            'category_id.numeric' => 'Поле "category_id" должно быть числом',
            'price.numeric' => 'Поле "price" должно быть числом',
            'length.numeric' => 'Поле "length" должно быть числом',
            'width.numeric' => 'Поле "width" должно быть числом',
            'weight.numeric' => 'Поле "weight" должно быть числом',
        ];
    }
}
