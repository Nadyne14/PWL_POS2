@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
<div class="card-header">
<h3 class="card-title">{{ $page->title }}</h3>
<div class="card-tools">
    <a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">Tambah</a>
    <button type="button" class="btn btn-sm btn-success mt-1" data-toggle="modal" data-target="#myModal" onclick="modalAction('{{ url('user/create_ajax') }}')">Tambah Ajax</button>
</div>
</div>
<div class="card-body">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label class="col-1 control-label col-form-label">Filter:</label>
            <div class="col-3">
                <select class="form-control" id="level_id" name="level_id" required>
                    <option value="">Semua</option>
                    @foreach($levels as $item)
                        <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Level Pengguna</small>
            </div>
        </div>
    </div>
</div>

<table class="table table-bordered table-striped table-hover table-sm" id="table_user">
<thead>
<tr><th>ID</th><th>Username</th><th>Nama</th><th>Level Pengguna</th><th>Aksi</th></tr>
</thead>
<tbody>
@foreach($users as $user)
<tr>
    <td>{{ $user->user_id }}</td>
    <td>{{ $user->username }}</td>
    <td>{{ $user->nama }}</td>
    <td>{{ $user->level->level_nama ?? '-' }}</td>
    <td>
        <button onclick="modalAction('{{ url('/user/' . $user->user_id . '/show_ajax') }}')" class="btn btn-info btn-sm">Detail</button>
        <button onclick="modalAction('{{ url('/user/' . $user->user_id . '/edit_ajax') }}')" class="btn btn-warning btn-sm">Edit</button>
        <button onclick="modalAction('{{ url('/user/' . $user->user_id . '/delete_ajax') }}')" class="btn btn-danger btn-sm">Hapus</button>
    </td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
@include('m_user._modal_form')
@endsection

@push('css') @endpush
@push('js')
<script>
function modalAction(url = ''){
    console.log('modalAction called with URL:', url);
    $('#myModal').load(url,function(response, status, xhr){
        console.log('Modal load status:', status);
        if(status == "error") {
            console.error("Error loading modal content:", xhr.status, xhr.statusText);
            alert("Gagal memuat konten modal: " + xhr.status + " " + xhr.statusText);
        } else {
            $('#myModal').modal('show');
        }
    });
}
</script>
@endpush
