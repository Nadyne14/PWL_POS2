<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        // Simpan data ke database
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'nama_kategori' => $request->namaKategori,
        ]);

        // Redirect dengan session flash message
        return redirect('/kategori');
    }
    public function edit($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_kode' => 'required|string|max:255',
            'nama_kategori' => 'required|string|max:255',
    ]);

        $kategori = KategoriModel::findOrFail($id);
        $kategori->update([
            'kategori_kode' => $request->kategori_kode,
            'nama_kategori' => $request->nama_kategori,
    ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        $kategori->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
