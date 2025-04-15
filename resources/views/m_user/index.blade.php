{{-- @extends('m_user/template')
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>CRUD User</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('m_user.create') }}"> Input User</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered bg-white">
    <tr class="bg-primary text-white">
        <th width="20px" class="text-center">User ID</th>
        <th width="150px" class="text-center">Level ID</th>
        <th width="200px" class="text-center">Username</th>
        <th width="200px" class="text-center">Nama</th>
        <th width="150px" class="text-center">Password</th>
        <th width="200px" class="text-center">Aksi</th>
    </tr>
    @foreach ($useri as $m_user)
    <tr>
        <td>{{ $m_user->user_id }}</td>
        <td>{{ $m_user->level_id }}</td>
        <td>{{ $m_user->username }}</td>
        <td>{{ $m_user->nama }}</td>
        <td>{{ $m_user->password }}</td>
        <td class="text-center">
            <form action="{{ route('m_user.destroy', $m_user->user_id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('m_user.show', $m_user->user_id) }}">Show</a>
                <a class="btn btn-primary btn-sm" href="{{ route('m_user.edit', $m_user->user_id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection --}}

@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
<div class="card-header">
<h3 class="card-title">{{ $page->title }}</h3>
<div class="card-tools">
<a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">Tambah</a>
</div>
</div>
<div class="card-body">
<table class="table table-bordered table-striped table-hover table-sm" id="table_user">
<thead>
<tr><th>ID</th><th>Username</th><th>Nama</th><th>Level Pengguna</th><th>Aksi</th></tr>
</thead>
</table>
</div>
</div> @endsection
@push('css') @endpush
@push('js')
<script>
$(document).ready(function() {
var dataUser = $('#table_user').DataTable({
// serverSide: true, jika ingin menggunakan server side processing serverSide: true,
ajax: {
"url": "{{ url('user/list') }}", "dataType": "json",
"type": "POST"
},
columns: [
{
// nomor urut dari laravel datatable addIndexColumn() data: "DT_RowIndex",
className: "text-center", orderable: false, searchable: false
},{
data: "username", className: "",
// orderable: true, jika ingin kolom ini bisa diurutkan orderable: true,
// searchable: true, jika ingin kolom ini bisa dicari searchable: true
},{
data: "nama",
className: "", orderable: true, searchable: true
},{
// mengambil data level hasil dari ORM berelasi data: "level.level_nama",
className: "", orderable: false, searchable: false
},{
data: "aksi",
className: "", orderable: false, searchable: false
}
]
});
});
</script> @endpush
