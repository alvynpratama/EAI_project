@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background: url('https://images.unsplash.com/photo-1607083201395-52a2d30c204b?auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed; background-size: cover; min-height: 100vh;">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="max-width: 500px; width: 100%;">
            <div class="card-header text-white text-center" style="background-color: #b71c1c;">
                <h3>Login ke Sistem</h3>
            </div>
            <div class="card-body bg-light">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input id="email" type="email" class="form-control" name="email" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Ingat Saya</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-merah">Login</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center bg-white">
                <small>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></small>
            </div>
        </div>
    </div>
</div>
@endsection
