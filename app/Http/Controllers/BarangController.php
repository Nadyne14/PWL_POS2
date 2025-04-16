<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;

class BarangController extends Controller
{
    public function index()
    {
        $activeMenu = 'barang';
        // Remove eager loading of 'kategori' relationship as it does not exist
        $barang = BarangModel::all();
        return view('barang.index', compact('activeMenu', 'barang'));
    }
}
