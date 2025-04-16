@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
<div class="card-header">
<h3 class="card-title">Daftar Supplier</h3>
<div class="card-tools">
<a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">Tambah Supplier</a>
</div>
</div>
<div class="card-body">
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered table-striped table-hover table-sm" id="table_supplier">
<thead>
<tr>
<th>ID</th>
<th>Nama Supplier</th>
<th>Alamat</th>
<th>Telepon</th>
<th>Aksi</th>
</tr>
</thead>
</table>
</div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function() {
    $('#table_supplier').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('supplier.list') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama_supplier', name: 'nama_supplier' },
            { data: 'alamat', name: 'alamat' },
            { data: 'telepon', name: 'telepon' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
