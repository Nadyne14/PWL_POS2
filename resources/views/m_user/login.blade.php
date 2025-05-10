@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <b>Admin</b>LTE
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-danger">
                            <i class="fas fa-ellipsis-h"></i>
                        </span>
                        <span class="input-group-text bg-white">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-danger">
                            <i class="fas fa-ellipsis-h"></i>
                        </span>
                        <span class="input-group-text bg-white">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
            <p class="mt-3 mb-1">
                <a href="{{ url('/') }}">Kembali ke Home</a>
            </p>
        </div>
    </div>
</div>
@endsection
