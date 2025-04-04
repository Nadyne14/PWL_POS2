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
    
        return [
            'username' => 'required|string|max:50|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:6',
            'level_id' => 'required|exists:m_level,id',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'nama.required' => 'Nama wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'level_id.required' => 'Level pengguna wajib dipilih.',
        ];
    }
}
