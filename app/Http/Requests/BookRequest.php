<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'writer' => ['required', 'string', 'max:255'],
            'publication_year' => ['required', 'integer', 'between:1000,' . date('Y')],
            'description' => ['nullable', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Judul wajib diisi.',
            'writer.required' => 'Penulis wajib diisi.',
            'publication_year.required' => 'Tahun terbit wajib diisi.',
            'publication_year.integer' => 'Tahun terbit harus berupa angka.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
        ];
    }
}
