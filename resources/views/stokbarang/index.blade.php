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
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->nama_supplier }}</td>
                        <td>{{ $supplier->alamat }}</td>
                        <td>{{ $supplier->telepon }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data supplier.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
