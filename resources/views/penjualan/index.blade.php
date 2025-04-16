@php
    $activeMenu = $activeMenu ?? 'penjualan';
@endphp

@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Data Penjualan</h3>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-hover table-striped table-sm">
            <thead>
                <tr>
                    @if(count($penjualan) > 0)
                        @foreach(array_keys($penjualan[0]->getAttributes()) as $column)
                            <th>{{ $column }}</th>
                        @endforeach
                    @else
                        <th>No Data</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan as $item)
                <tr>
                    @foreach($item->getAttributes() as $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
