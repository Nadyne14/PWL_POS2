<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $activeMenu = 'penjualan';
        $penjualan = \App\Models\PenjualanModel::all();
        return view('penjualan.index', compact('activeMenu', 'penjualan'));
    }
}
