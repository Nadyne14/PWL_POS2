<?php

namespace App\Http\Controllers;

use App\Models\m_user;
use Illuminate\Http\Request;

class POSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $useri = m_user::all(); // Mengambil semua isi tabel
        return view('m_user.index', compact('useri'))->with('i');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('m_user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //melakukan validasi data
     $request->validate([
    'user_id' => 'max 20',
    'username' => 'required',
    'nama' => 'required',
  
    ]);
    //fungsi eloquent untuk menambah data
    m_user::create([
        'user_id' => $request->user_id,
        'level_id' => $request->level_id ?? 1, // Set default 1 jika tidak diisi
        'username' => $request->username,
        'nama' => $request->nama,
        'password' => bcrypt($request->password),
    ]);
    

    return redirect()->route('m_user.index')
    ->with('success', 'user Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, m_user $useri)
    {
        $useri = m_user::findOrFail($id);
        return view('m_user.show', compact('useri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $useri = m_user::find($id);
        return view('m_user.edit', compact('useri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required',
            ]);
            //fungsi eloquent untuk mengupdate data inputan kita
m_user::find($id)->update($request->all());
//jika data berhasil diupdate, akan kembali ke halaman utama
return redirect()->route('m_user.index')
->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $useri= m_user::findOrFail($id)->delete();
        return \redirect()->route('m_user.index')

        -> with('success', 'data Berhasil Dihapus');
    }
}
