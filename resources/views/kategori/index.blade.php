@extends('layouts.template')

@section('content')
    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card card-outline card-primary">
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped table-sm">
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
                            <td>{{ $item->kategori_kode }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
