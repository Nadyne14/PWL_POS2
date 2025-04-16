@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
<div class="card-header">
<h3 class="card-title">Tambah Supplier</h3>
</div>
<div class="card-body">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('supplier.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama_supplier">Nama Supplier</label>
        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="{{ old('nama_supplier') }}" required>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
    </div>
    <div class="form-group">
        <label for="telepon">Telepon</label>
        <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon') }}">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Batal</a>
</form>
</div>
</div>
@endsection
