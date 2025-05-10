@extends('layouts.template')

@section('content')
    <a href="{{ route('kategori.index') }}" class="btn btn-primary mb-3">Kembali ke Daftar Kategori</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card card-outline card-primary">
        <div class="card-body">
            <form action="{{ url('/kategori') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kategori_kode">Kode Kategori</label>
                    <input id="kategori_kode"
                        type="text"
                        name="kategori_kode"
                        class="form-control @error('kategori_kode') is-invalid @enderror"
                        value="{{ old('kategori_kode') }}">
                    @error('kategori_kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukkan nama kategori" value="{{ old('nama_kategori') }}">
                    @error('nama_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
