@extends('layouts.home')

@section('content')
<div class="container pt-5 pb-5 d-flex justify-content-center">
    <div class="card shadow form-login-register">
        <div class="card-body">
            <p class="fs-4 mb-5 fw-semibold">Login</p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        placeholder="Input your email address..." required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Input your password..." required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3 col-md-12">Login</button>
            </form>
            <div class="text-center mt-5">
                <p class="fw-semibold">Belum punya akun ? <strong><a href="{{ route('register') }}"
                            class="text-decoration-none">Daftar</a></strong> </p>
            </div>
        </div>
    </div>
</div>
@endsection