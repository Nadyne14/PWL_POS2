<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLevelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'level_kode' => 'required|string|max:10|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'level_kode.required' => 'Kode level harus diisi.',
            'level_kode.unique' => 'Kode level sudah digunakan.',
            'level_nama.required' => 'Nama level harus diisi.',
        ];
    }
}
