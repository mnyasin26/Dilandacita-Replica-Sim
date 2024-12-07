@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="content flex-grow-1 ms-1 me-1">
            {{-- Navigation --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Halaman Utama</a></li>
                    <li class="breadcrumb-item"><a href="">Pengaturan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data User</li>
                </ol>
            </nav>

            <h4 class="mb-4 text-center">DATA USER</h4>

            {{-- Data User Card --}}
            <div class="card card-body shadow" style="border-radius: 10px;">
                <div class="card-header bg bg-secondary text-white">
                    <h6>Data User</h6>
                    <input type="hidden" name="" id="id_user" value="{{ $user->id_user }}">
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <div class="row">
                            <div class="col-4">NIK</div>
                            <div class="col-7">: &nbsp;{{ $user->nik }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">KK</div>
                            <div class="col-8">: &nbsp;{{ $user->no_kk }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Nama</div>
                            <div class="col-8">: &nbsp;{{ $user->name }}</div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-4">Telepon</div>
                            <div class="col-8">: &nbsp;{{ $user->telepon }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Email</div>
                            <div class="col-8">: &nbsp;{{ $user->email }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Jenis Akun</div>
                            <div class="col-8">: &nbsp;{{ $user->m_kategori_user->nama_kategori_user }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Role</div>
                            <div class="col-8">: &nbsp;{{ $user->m_role->role }}</div>
                        </div> --}}
                        <div class="row">
                            <div class="col-4">Telepon</div>
                            <div class="col-8 mb-2">
                                <form action="{{ route('user.updateTelepon', $user->id_user) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input class="rounded-pill" value="{{ $user->telepon }}" name="telepon" type="text" onkeypress="return /[0-9]/i.test(event.key)">
                                    <button type="submit" class="btn btn-success mt-2">Update Telepon</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">Email</div>
                            <div class="col-8 mb-2">
                                <form action="{{ route('user.updateEmail', $user->id_user) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="email" class="rounded-pill" value="{{ $user->email }}" style="width: 50%">
                                    <button type="submit" class="btn btn-success mt-2">Update Email</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">Role</div>
                            <div class="col-8 mb-2">
                                <form action="{{ route('user.updateRole', $user->id_user) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="role_id" class="form-select">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id_role }}" {{ $user->role_id == $role->id_role ? 'selected' : '' }}>{{ $role->role }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-success mt-2">Update Role</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">Kategori</div>
                            <div class="col-8 mb-2">
                                <form action="{{ route('user.updateKategori', $user->id_user) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="kategori_user_id" class="form-select">
                                        @foreach($kategoris as $kategori)
                                            <option value="{{ $kategori->id_kategori_user }}" {{ $user->kategori_user_id == $kategori->id_kategori_user ? 'selected' : '' }}>{{ $kategori->nama_kategori_user }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-success mt-2">Update Kategori</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
