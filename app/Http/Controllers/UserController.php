<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user';

        $levels = LevelModel::all(); // ambil data level untuk filter level
        $users = UserModel::with('level')->get(); // ambil semua data user beserta relasi level

        return view('m_user.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'levels' => $levels,
            'users' => $users
        ]);
    }

    // Menampilkan halaman form tambah user ajax
    public function create_ajax()
    {
        $levels = LevelModel::all();
        return view('m_user.create_ajax', compact('levels'));
    }

    public function tambah()
    {
        $levels = LevelModel::all();
        return view('user_tambah', compact('levels'));
    }

    public function create()
    {
        $breadcrumb = (object) [
            "title" => "Tambah User",
            "list" => ['Home', 'User', 'Tambah']
        ];

        $page = (object) [
            "title" => "Tambah user baru"
        ];

        $levels = LevelModel::all(); // ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('m_user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'levels' => $levels, 'activeMenu' => $activeMenu]);
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

    // Menyimpan data user baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer'
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil disimpan');
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
        $query = UserModel::from('m_user')->with('level');

        if ($request->has('level_id') && !empty($request->level_id)) {
            $query->where('level_id', $request->level_id);
        }

        $users = $query->get();

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                $btn  = '<button onclick="modalAction(\''.url('/user/' . $user->user_id . '/show_ajax').'\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\''.url('/user/' . $user->user_id . '/edit_ajax').'\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\''.url('/user/' . $user->user_id . '/delete_ajax').'\')" class="btn btn-danger btn-sm">Hapus</button> ';

                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    // Menampilkan halaman detail user
    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail user'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('m_user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    // Menampilkan halaman edit user ajax
    public function edit_ajax(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id', 'level_nama')->get();

        return view('m_user.edit_ajax', ['user' => $user, 'level' => $level]);
    }

    // Menampilkan halaman detail user ajax
    public function show_ajax(string $id)
    {
        $user = UserModel::with('level')->find($id);
        if (!$user) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return view('m_user.show_ajax', ['user' => $user]);
    }

    // Menyimpan perubahan data user ajax
    public function confirm_ajax(string $id){
        $user = UserModel::find($id);

        return view('m_user.confirm_ajax', ['user' => $user]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $user = UserModel::find($id);
            if ($user) {
                $user->delete();
                return response()->json([
                    'status'  => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }

        return redirect('/');
    }

    public function storeAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3',
            'nama' => 'required|max:100',
            'password' => 'required|min:6',
            'level_id' => 'required|exists:m_level,level_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User berhasil ditambahkan.'
        ]);
    }
}
