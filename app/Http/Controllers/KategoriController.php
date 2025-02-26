<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index() 
    {
         // untuk menambahkan 1 data ke table m_kategori
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'nama_kategori' => 'Snack/Makanan Ringan',
        //     'created_at' => now()
        // ];

        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil';
        
        // untuk meng-update data di table m_kategori
        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['nama_kategori' => 'Camilan']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

        // // hapus data
        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

        // untuk menampilkan data yang ada di table m_kategori
        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);

    }
}
