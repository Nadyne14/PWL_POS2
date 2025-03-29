<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;

class LevelController extends Controller
{
    public function index()
    {
        $levels = LevelModel::all();
        return view('level', ['data' => $levels]);
    }

    public function tambah()
    {
        return view('level_tambah');
    }

    public function tambah_simpan(StoreLevelRequest $request)
    {
        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);

        return redirect()->route('level.index')->with('success', 'Level berhasil ditambahkan!');
    }

    public function ubah($id)
    {
        $level = LevelModel::findOrFail($id);
        return view('level_ubah', compact('level'));
    }

    public function ubah_simpan(UpdateLevelRequest $request, $id)
    {
        $level = LevelModel::findOrFail($id);
        $level->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);

        return redirect()->route('level.index')->with('success', 'Level berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $level = LevelModel::findOrFail($id);
        $level->delete();

        return redirect()->route('level.index')->with('success', 'Level berhasil dihapus!');
    }
}
