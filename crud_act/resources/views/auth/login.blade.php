@extends('layouts.app')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card p-4">
                <div class="text-center mb-4">
                    <h4 class="fw-bold">Welcome Back</h4>
                    <p class="text-muted small">Sign in to access your enrollment dashboard</p>
                </div>

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label text-muted small">Email Address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}">

                        @error('email')
                            <div class="invalid-feedback fw-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-muted small">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">

                        @error('password')
                            <div class="invalid-feedback fw-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark w-100 py-2">Login</button>
                </form>

                <div class="mt-4 text-center">
                    <a href="{{ route('register') }}" class="text-decoration-none text-muted small">New student?</a>
                    <a href="{{ route('register') }}" class="text-decoration-none" style="color:blue">Register for an
                        account.</a>
                </div>
            </div>
        </div>
    </div>
@endsection