<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowRequest extends FormRequest
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
            'load_date' => ['required', 'date'],
            'borrow_date' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'load_date.required' => 'Load date is required',
            'borrow_date.required' => 'Borrow date is required',
        ];
    }
}
