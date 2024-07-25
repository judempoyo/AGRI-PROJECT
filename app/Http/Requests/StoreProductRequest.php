<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:1000'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'int'],
            'deposit_id' => ['required', 'int'],
            'categorie_id' => ['required', 'int'],
            'sell_unit_id' => ['required', 'int'],
            'user_id' => ['required'],
        ];
    }
}
