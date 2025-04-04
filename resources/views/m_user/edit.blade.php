@extends('m_user/template')
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit User</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('m_user.index') }}"> Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oops!</strong> Error <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('m_user.update', $useri->user_id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <strong>Username:</strong>
        <input type="text" name="username" value="{{ $useri->username }}" class="form-control">
    </div>
    <div class="form-group">
        <strong>Nama:</strong>
        <input type="text" name="nama" value="{{ $useri->nama }}" class="form-control">
    </div>
    <div class="form-group">
        <strong>Password:</strong>
        <input type="password" name="password" value="{{ $useri->password }}" class="form-control">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection
