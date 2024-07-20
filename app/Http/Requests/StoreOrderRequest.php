<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'total' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:20'],
            'payment_method' => ['required', 'string', 'max:50'],
            'delivery_method' => ['required', 'string', 'max:50'],
            'delivery_adress' => ['required', 'string', 'max:200'],
        ];
    }
}
