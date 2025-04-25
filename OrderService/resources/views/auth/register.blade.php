@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg bg-white" style="max-width: 500px; width: 100%;">
            <div class="card-header text-white text-center" style="background-color: #b71c1c;">
                <h3>Registrasi Akun</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password">Kata Sandi</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm">Konfirmasi Sandi</label>
                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control"
                            required>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-merah" type="submit">Daftar</button>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center bg-white">
                <small>Sudah punya akun? <a href="{{ route('login') }}">Login</a></small>
            </div>
        </div>
    </div>
@endsection
