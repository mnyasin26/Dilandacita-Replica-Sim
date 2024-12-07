@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pengajuan</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form untuk menampilkan dan mengedit data pengajuan -->
    <form action="{{ route('pengajuan.update') }}" method="POST">
        @csrf
        <input type="hidden" name="formID" value="{{ $formID }}">
        <input type="hidden" name="modifiedBy" value="{{ Auth::user()->id }}">

        <div class="form-group">
            <label for="attribute">Pilih Elemen untuk Diubah</label>
            <select name="attribute" id="attribute" class="form-control" required>
                <option value="fullName">Nama Lengkap</option>
                <option value="village">Desa</option>
                <!-- Tambahkan pilihan elemen lain yang bisa diedit -->
            </select>
        </div>

        <div class="form-group">
            <label for="newValue">Nilai Baru</label>
            <input type="text" name="newValue" id="newValue" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
