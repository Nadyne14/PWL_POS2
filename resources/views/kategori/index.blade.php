{{-- @extends('adminlte::page')

@section('title', 'Kategori')

@section('content_header')
    <h1>Home > Kategori</h1>
@stop --}}

{{-- @section('content')
    <div class="card">
        <div class="card-body"> --}}

            {{-- Tombol "Add Kategori" --}}
            {{-- <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Add Kategori
            </a> --}}

            {{-- Tabel Kategori --}}
            {{-- <table id="kategori-table" class="table table-bordered table-hover mt-3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Kategori Kode</th>
                        <th>Nama Kategori</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>  {{-- Tambahkan kolom Action --}}
                    {{-- </tr>
                </thead>
            </table>            
        </div>
    </div> 
@stop --}}

{{-- @push('js') --}}
{{-- <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
<script> --}}
    {{-- // $(document).ready(function() {
    //     $('#kategori-table').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         ajax: "{{ route('kategori.index') }}",
    //         columns: [
    //             { data: 'id', name: 'id' },
    //             { data: 'kategori_kode', name: 'kategori_kode' },
    //             { data: 'nama_kategori', name: 'nama_kategori' },
    //             { data: 'created_at', name: 'created_at' },
    //             { data: 'updated_at', name: 'updated_at' },
    //             { 
    //                 data: 'id',
    //                 name: 'action',
    //                 orderable: false,
    //                 searchable: false,
    //                 render: function(data, type, row) {
    //                     return `
    //                         <a href="/kategori/${data}/edit" class="btn btn-warning btn-sm">
    //                             <i class="fas fa-edit"></i> Edit
    //                         </a>
    //                         <button class="btn btn-danger btn-sm btn-delete" data-id="${data}">
    //                             <i class="fas fa-trash"></i> Delete
    //                         </button>
    //                     `;
    //                 }
    //             }
    //         ],
    //         lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]], // Dropdown show entries otomatis
    //         language: {
    //             paginate: {
    //                 previous: "Previous",
    //                 next: "Next"
    //             }
    //         }
    //     }); --}}

        {{-- // Event listener untuk tombol hapus --}}
    {{-- //     $(document).on('click', '.btn-delete', function() {
    //         let id = $(this).data('id');
    //         if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
    //             $.ajax({
    //                 url: `/kategori/${id}`,
    //                 type: 'DELETE',
    //                 data: {
    //                     _token: "{{ csrf_token() }}"
    //                 },
    //                 success: function(response) {
    //                     alert(response.message);
    //                     $('#kategori-table').DataTable().ajax.reload();
    //                 }
    //             });
    //         }
    //     });

    //     console.log("DataTables with Edit & Delete button Loaded Successfully");
    // }); --}}
{{-- </script>    
@endpush --}}

@extends('adminlte::page')

@section('title', 'Manage Kategori')

@section('content_header')
    <h1>Manage Kategori</h1>
@stop

@section('content')
    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->kode_kategori }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
