@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #e6f2f5;
        font-family: 'Arial', sans-serif;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .left-section {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .right-section {
        flex: 1;
        padding: 20px;
    }

    .login-box {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-box h1 {
        font-family: 'Pacifico', cursive;
        color: #00bcd4;
    }

    .login-box p {
        color: #727272;
    }

    .form-control {
        margin-bottom: 10px;
    }

    .btn-primary {
        background-color: #00bcd4;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0097a7;
    }

    .footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .footer img {
        height: 50px;
    }

    .footer .btn {
        background-color: #00bcd4;
        border: none;
        color: white;
    }

    .footer .btn:hover {
        background-color: #0097a7;
    }

    .footer .info {
        display: flex;
        align-items: center;
    }

    .footer .info img {
        margin-right: 10px;
    }

    .footer .info span {
        color: #a4a4a4;
    }
</style>

<div class="container">
    <div class="left-section">

        <img alt="Cimahi Campernik Logo" height="150" src="https://storage.googleapis.com/a1aa/image/QfRox6tLmxwxZyaf86V3RNEJ7mm32XMgpo6qMYXYCmgK43zTA.jpg" width="300" />
    </div>
    <div class="right-section">
        <div class="login-box">
            <h1>dilandacita</h1>
            <p>Digitalisasi Layanan Dokumen Adminduk Cimahi Kota</p>
            <p>Jika belum memiliki akun silahkan klik <a href="{{ route('register') }}">Buat Akun</a></p>

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                "gagal login"
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                {{-- <div class="input-group mb-3">
                    <input class="form-control" placeholder="Captcha" type="text" />
                    <span class="input-group-text">
                        <img alt="Captcha" height="30" src="https://storage.googleapis.com/a1aa/image/SZrr7ReCtpwODaXycuYA0YBep54HSOHVpBMi4kjT33NL43zTA.jpg" width="100" />
                    </span>
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-redo"></i>
                    </button>
                </div> --}}
                <button type="submit" class="btn btn-primary w-100">Log In <i class="fas fa-sign-in-alt"></i></button>
            </form>

            <!-- <a class="d-block text-center mt-3" href="#">Lupa Password</a> -->

            <div class="footer">
                <div class="info">
                    <img alt="Cimahi Campernik Logo" height="50" src="https://storage.googleapis.com/a1aa/image/QfRox6tLmxwxZyaf86V3RNEJ7mm32XMgpo6qMYXYCmgK43zTA.jpg" width="50" />
                    <!-- <span>#13277</span> -->
                </div>
                <div>
                    <button class="btn">Info Layanan Publik</button>
                    <button class="btn">Konsultasi/Pengaduan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
