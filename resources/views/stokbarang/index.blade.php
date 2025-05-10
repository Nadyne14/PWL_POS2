@php
    $activeMenu = $activeMenu ?? 'stokbarang';
@endphp

@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Data Stok Barang (Supplier)</h3>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Masuk</th>
                        <th>Jumlah Keluar</th>
                        <th>Sisa Stok</th>
                        <th>Waktu Input</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stokBarang as $stok)
                    <tr>
                        <td>{{ $stok->id }}</td>
                        <td>{{ $stok->nama_barang }}</td>
                        <td>{{ $stok->jumlah_masuk }}</td>
                        <td>{{ $stok->jumlah_keluar }}</td>
                        <td>{{ $stok->sisa_stok }}</td>
                        <td>{{ \Carbon\Carbon::parse($stok->created_at)->format('d-m-Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data stok barang.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
