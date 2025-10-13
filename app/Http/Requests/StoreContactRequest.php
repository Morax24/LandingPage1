<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // True karena siapa saja bisa kirim contact form
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email:rfc,dns|max:255',
            'institution' => 'nullable|string|max:255',
            'message' => 'required|string|min:10|max:1000',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            // Name validation messages
            'name.required' => 'Nama lengkap wajib diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 255 karakter',

            // Email validation messages
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',

            // Institution validation messages
            'institution.max' => 'Nama instansi maksimal 255 karakter',

            // Message validation messages
            'message.required' => 'Pesan wajib diisi',
            'message.min' => 'Pesan minimal 10 karakter',
            'message.max' => 'Pesan maksimal 1000 karakter',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'nama lengkap',
            'email' => 'alamat email',
            'institution' => 'instansi/sekolah',
            'message' => 'pesan',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Bersihkan whitespace
        $this->merge([
            'name' => trim($this->name),
            'email' => trim(strtolower($this->email)),
            'institution' => $this->institution ? trim($this->institution) : null,
            'message' => trim($this->message),
        ]);
    }
}
