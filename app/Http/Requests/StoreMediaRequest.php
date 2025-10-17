<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|in:image,video',
            'file' => [
                'required',
                'file',
                function ($attribute, $value, $fail) {
                    if ($this->type === 'image') {
                        if (!in_array($value->getMimeType(), ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])) {
                            $fail('File harus berupa gambar (JPEG, PNG, JPG, WEBP)');
                        }
                        if ($value->getSize() > 5 * 1024 * 1024) { // 5MB
                            $fail('Ukuran gambar maksimal 5MB');
                        }
                    } elseif ($this->type === 'video') {
                        if (!in_array($value->getMimeType(), ['video/mp4', 'video/webm', 'video/ogg'])) {
                            $fail('File harus berupa video (MP4, WEBM, OGG)');
                        }
                        if ($value->getSize() > 50 * 1024 * 1024) { // 50MB
                            $fail('Ukuran video maksimal 50MB');
                        }
                    }
                },
            ],
            'section' => 'required|in:features,aktivitas,other',
            'order' => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul wajib diisi',
            'type.required' => 'Tipe media wajib dipilih',
            'file.required' => 'File wajib diupload',
            'section.required' => 'Section wajib dipilih',
        ];
    }
}
