{{-- @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Input</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Text Input -->
                        <div class="form-group">
                            <label>Level ID</label>
                            <input type="text" class="form-control" placeholder="Masukkan ID">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    {{-- Tambahkan CSS jika diperlukan --}}
{{-- @stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop --}} 


{{-- @extends('layouts.breadcrumb')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Halo, apa kabar!!!</h3>
        </div>
        <div class="card-body">
            Selamat datang semua, ini adalah halaman utama dari aplikasi ini.

            <hr>
            <p><strong>Breadcrumb:</strong></p>
            <ul>
                @foreach($breadcrumb->list ?? [] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection --}}


@extends('layouts.template')

@section('content')
    @include('layouts.breadcrumb') {{-- panggil breadcrumb AdminLTE --}}

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Halo, apa kabar!!!</h3>
        </div>
        <div class="card-body">
            Selamat datang semua, ini adalah halaman utama dari aplikasi ini.
        </div>
    </div>
@endsection
