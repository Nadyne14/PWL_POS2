<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = \App\Models\KategoriModel::select('id', 'kode_kategori', 'nama_kategori')->get();
        $activeMenu = 'kategori';
        return view('kategori.index', compact('kategori', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $kategori = KategoriModel::select('id', 'kode_kategori', 'nama_kategori', 'created_at', 'updated_at');

        return \Yajra\DataTables\DataTables::of($kategori)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('kategori.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form action="' . route('kategori.destroy', $row->id) . '" method="POST" style="display:inline;">';
                $btn .= csrf_field();
                $btn .= method_field('DELETE');
                $btn .= '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus?\')">Delete</button>';
                $btn .= '</form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $activeMenu = 'kategori';
        return view('kategori.create', compact('activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kategori' => 'required|unique:m_kategori,kode_kategori',
            'nama_kategori' => 'required'
        ]);

        KategoriModel::create([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kategori' => 'required|unique:m_kategori,kode_kategori,' . $id,
            'nama_kategori' => 'required'
        ]);

        $kategori = KategoriModel::findOrFail($id);
        $kategori->update([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        KategoriModel::destroy($id);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
