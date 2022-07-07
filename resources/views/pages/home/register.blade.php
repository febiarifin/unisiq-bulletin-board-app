@extends('layouts.home')

@section('content')
<div class="container pt-5 pb-5 d-flex justify-content-center">
    <div class="card shadow form-login-register">
        <div class="card-body">
            <p class="fs-4 mb-5 fw-semibold">Daftar</p>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        placeholder="Input your username..." required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control @error('name') is-invalid @enderror" name="email"
                        placeholder="Input your email address..." required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control @error('name') is-invalid @enderror" name="password"
                        placeholder="Input your password..." required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3 col-md-12">Daftar</button>
            </form>
            <div class="text-center mt-5">
                <p class="fw-semibold">Sudah punya akun ? <strong><a href="{{ route('login') }}"
                            class="text-decoration-none">Login</a></strong> </p>
            </div>
        </div>
    </div>
</div>
@endsection