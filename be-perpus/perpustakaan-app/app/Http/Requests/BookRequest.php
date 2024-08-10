<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title'=>'required|max:255',
            'author'=>'required|max:255',
            'year'=>'required|numeric',
            'summary'=>'required|max:5055',
            'image' => 'required|mimes:jpg,bmp,png,jpeg,jfif|max:2048',
            'stock' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'author.required' => 'Author is required',
            'year.required' => 'Year is required',
            'summary.required' => 'Summary is required',
            'image.required' => 'Image is required',
            'stock.required' => 'Stock is required',
            'category_id.required' => 'Category is required',
            'category_id.exists' => 'Category not found',
        ];
    }
}
