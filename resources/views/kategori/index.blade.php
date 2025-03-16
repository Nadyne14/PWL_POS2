@extends('adminlte::page')

@section('title', 'Kategori')

@section('content_header')
    <h1>Manage Kategori</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">List Kategori</div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
@stop

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
