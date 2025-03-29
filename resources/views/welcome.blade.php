@extends('adminlte::page')

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
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
