<?php

namespace App\Http\Controllers;

use App\Models\SupplierModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    public function index()
    {
        return view('supplier.index');
    }

    public function list(Request $request)
    {
        $suppliers = SupplierModel::select('id', 'nama_supplier', 'alamat', 'telepon');

        return DataTables::of($suppliers)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('supplier.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form action="' . route('supplier.destroy', $row->id) . '" method="POST" style="display:inline;">';
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
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        SupplierModel::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $supplier = SupplierModel::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        $supplier = SupplierModel::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil diperbarui!');
    }

    public function destroy($id)
    {
        SupplierModel::destroy($id);
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil dihapus!');
    }

    public function stokbarang()
    {
        $activeMenu = 'stokbarang';
        $suppliers = SupplierModel::all();
        return view('stokbarang.index', compact('activeMenu', 'suppliers'));
    }
}
