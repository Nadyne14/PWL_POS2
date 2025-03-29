<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string|max:50|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|string|min:6',
            'level_id' => 'required|exists:m_level,id',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username harus diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'nama.required' => 'Nama lengkap harus diisi.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal harus 6 karakter.',
            'level_id.required' => 'Level harus dipilih.',
            'level_id.exists' => 'Level yang dipilih tidak valid.',
        ];
    }
}
