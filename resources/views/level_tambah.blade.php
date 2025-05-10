@php
    $activeMenu = $activeMenu ?? 'level';
@endphp

@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Level Pengguna</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('level.tambah_simpan') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="level_kode">Kode Level</label>
                <input type="text" name="level_kode" id="level_kode" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="level_nama">Nama Level</label>
                <input type="text" name="level_nama" id="level_nama" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('level.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
