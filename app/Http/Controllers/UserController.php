<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        $levels = LevelModel::all();
        return view('m_user.register', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:m_user,username',
            'nama' => 'required|string',
            'password' => 'required|confirmed|min:6',
            'level_id' => 'required|exists:m_level,level_id',
        ]);

        $user = new UserModel();
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;
        $user->save();

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
