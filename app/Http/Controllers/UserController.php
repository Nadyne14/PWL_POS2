<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Selamat Datang',
            'list' => ['Home', 'Welcome']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user';

        return view('m_user.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
        
        // $users = UserModel::with('level')->get();
        // return view('user', ['data' => $users]);
    }

    public function tambah()
    {
        $levels = LevelModel::all();
        return view('user_tambah', compact('levels'));
    }

    public function tambah_simpan(StoreUserRequest $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ]);

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function ubah($id)
    {
        $user = UserModel::findOrFail($id);
        $levels = LevelModel::all();
        return view('user_ubah', compact('user', 'levels'));
    }

    public function ubah_simpan($request, $id)
    {
        $user = UserModel::findOrFail($id);

        $user->username = $request->username;
        $user->nama = $request->nama;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->level_id = $request->level_id;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }

    // Ambil data user dalam bentuk json untuk datatables 
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
                    ->with('level');
        
        return DataTables::of($users)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
                $btn = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn- sm">Detail</a> ';
                $btn .= '<a href="'.url('/user/' . $user->user_id . '/edit').'" class="btn btn- warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/user/'.$user->user_id).'">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }
    
}
