@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #e9f0f1;
        }

        .container {
            max-width: 400px;
            margin-top: 50px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            margin-bottom: 15px;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .btn-primary {
            width: 100%;
        }

        .text-center img {
            max-width: 100px;
        }

        .text-center h1 {
            font-size: 24px;
            margin-top: 10px;
        }

        .text-center p {
            margin-top: 10px;
            font-size: 14px;
        }

        .text-center a {
            color: #007bff;
            text-decoration: none;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <div class="text-center">

            <img alt="Logo of Cimahi" height="100"
                src="https://storage.googleapis.com/a1aa/image/o1AsbxszJwo9HFwFfu8S22oKllfOgJ6Gr8r3SGuIcPoFp3zTA.jpg"
                width="100" />
            <h1>Sistem Pelayanan Disdukcapil Kota Cimahi</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input class="form-control" placeholder="NIK (16 Digit)" type="text" id="nik" name="nik" required>
            <input class="form-control" placeholder="KK (16 Digit)" type="text" id="kk" name="kk" required>
            <input class="form-control" placeholder="Nama" type="text" id="name" name="name"
                value="{{ old('name') }}" required>
            <input class="form-control" placeholder="Telepon" type="text" id="telepon" name="telepon"
                 required>
            <input class="form-control" placeholder="Email" type="email" id="email" name="email"
                value="{{ old('email') }}" required>
            <input class="form-control" placeholder="Password" type="password" id="password" name="password" required>
            <input class="form-control" placeholder="Confirm Password" type="password" id="password_confirmation"
                name="password_confirmation" required>
            {{-- <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fas fa-eye-slash"></i>
                </span>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fas fa-eye-slash"></i>
                </span>
            </div> --}}
            <button class="btn btn-primary" type="submit">Register</button>
        </form>
        <div class="text-center mt-3">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Klik di sini untuk login</a></p>
        </div>
    </div>
@endsection
