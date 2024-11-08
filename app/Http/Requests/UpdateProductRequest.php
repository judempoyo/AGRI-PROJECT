<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => ['string', 'max:50'],
            'description' => ['string', 'max:1000'],
            'price' => ['numeric'],
            'quantity' => ['int'],
            'deposit_id' => ['int'],
            'categorie_id' => ['int'],
            'sell_unit_id' => ['int'],
        ];
    }
}
