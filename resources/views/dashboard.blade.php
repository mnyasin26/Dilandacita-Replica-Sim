@extends('layouts.app')



@section('content')
    <div class="container-fluid">
        <div class="content flex-grow-1 p-3">
            {{-- Navigation --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Halaman Utama</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>

            @if(Auth::user()->m_role->role === 'citizen' or Auth::user()->m_role->role === 'superAdmin')
            <div class="card card-default shadow-sm mb-4" style="border-radius: 15px;">
                <div class="card-header text-center">
                    <div class="row pt-2">
                        <div class="col-sm-12">
                            <h4>PENGAJUAN ANDA</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="tPengajuanAnda" name="tPengajuanAnda"
                                    class="table table-bordered table-striped small nowrap shadow-sm" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>TANGGAL LAPOR</th>
                                            <th>NAMA LAYANAN</th>
                                            <th>STATUS</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengajuans as $index => $pengajuan)
                                            <tr class="text-center">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pengajuan->tgl_pengajuan->format('Y-m-d') }}</td>
                                                <td>{{ $pengajuan->m_layanan->nama_layanan == 'aktaLahir' ? 'AKTA KELAHIRAN' : $pengajuan->m_layanan->nama_layanan ?? '-' }}
                                                </td>
                                                <td>{{ $pengajuan->status_pengajuan }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.detail', $pengajuan->id_pengajuan) }}"
                                                        class="btn btn-primary btn-sm">Detail</a>

                                                    @if ($pengajuan->status_pengajuan == 'Ditolak')
                                                        <a href="{{ route('akta-kelahiran.edit', $pengajuan->id_pengajuan) }}"
                                                            class="btn btn-warning btn-sm">Perbaiki</a>
                                                    @elseif ($pengajuan->status_pengajuan == 'Diterima')
                                                        <a href="{{ route('akta-kelahiran.edit', $pengajuan->id_pengajuan) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                    @elseif ($pengajuan->status_pengajuan == 'Diterbitkan')
                                                        <a href="{{ asset('pdf_example/EXAMPLE_PDF.pdf') }}"
                                                            class="btn btn-success btn-sm">Download Sertifikat</a>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- Additional Information --}}
            <div class="card card-default shadow-sm" style="border-radius: 15px;">
                <div class="card-header text-center">
                    <div class="row pt-2">
                        <div class="col-sm-12">
                            <h4>INFORMASI PENGAJUAN HARI INI</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 mb-3">
                            <div class="card bg-info text-white shadow" style="border-radius: 15px;">
                                <div class="card-body text-center p-3">
                                    <h3 class="font-weight-bold"><b>{{ $aktaKelahiranCount }}</b></h3>
                                    <p class="font-weight-bold"><b>AKTA KELAHIRAN</b></p>
                                    <i class="fas fa-file-invoice fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-3 mb-3">
                            <div class="card bg-info text-white shadow" style="border-radius: 15px;">
                                <div class="card-body text-center p-3">
                                    <h3 class="font-weight-bold"><b>1</b></h3>
                                    <p class="font-weight-bold"><b>AKTA KEMATIAN</b></p>
                                    <i class="fas fa-file-invoice fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="card bg-info text-white shadow" style="border-radius: 15px;">
                                <div class="card-body text-center p-3">
                                    <h3 class="font-weight-bold"><b>0</b></h3>
                                    <p class="font-weight-bold"><b>AKTA PERKAWINAN</b></p>
                                    <i class="fas fa-file-invoice fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="card bg-info text-white shadow" style="border-radius: 15px;">
                                <div class="card-body text-center p-3">
                                    <h3 class="font-weight-bold"><b>34</b></h3>
                                    <p class="font-weight-bold"><b>CETAK ULANG KARTU KELUARGA</b></p>
                                    <i class="fas fa-file-invoice fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="card bg-info text-white shadow" style="border-radius: 15px;">
                                <div class="card-body text-center p-3">
                                    <h3 class="font-weight-bold"><b>102</b></h3>
                                    <p class="font-weight-bold"><b>CETAK ULANG KTP-EL</b></p>
                                    <i class="fas fa-file-invoice fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="card bg-info text-white shadow" style="border-radius: 15px;">
                                <div class="card-body text-center p-3">
                                    <h3 class="font-weight-bold"><b>0</b></h3>
                                    <p class="font-weight-bold"><b>INPUT BIODATA</b></p>
                                    <i class="fas fa-file-invoice fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="card bg-info text-white shadow" style="border-radius: 15px;">
                                <div class="card-body text-center p-3">
                                    <h3 class="font-weight-bold"><b>0</b></h3>
                                    <p class="font-weight-bold"><b>KARTU IDENTITAS ANAK (KIA)</b></p>
                                    <i class="fas fa-file-invoice fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="card bg-info text-white shadow" style="border-radius: 15px;">
                                <div class="card-body text-center p-3">
                                    <h3 class="font-weight-bold"><b>29</b></h3>
                                    <p class="font-weight-bold"><b>PERBAIKAN DATA</b></p>
                                    <i class="fas fa-file-invoice fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="card bg-info text-white shadow" style="border-radius: 15px;">
                                <div class="card-body text-center p-3">
                                    <h3 class="font-weight-bold"><b>0</b></h3>
                                    <p class="font-weight-bold"><b>PINDAH DATANG</b></p>
                                    <i class="fas fa-file-invoice fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="card bg-info text-white shadow" style="border-radius: 15px;">
                                <div class="card-body text-center p-3">
                                    <h3 class="font-weight-bold"><b>1</b></h3>
                                    <p class="font-weight-bold"><b>PINDAH KELUAR</b></p>
                                    <i class="fas fa-file-invoice fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="card bg-info text-white shadow" style="border-radius: 15px;">
                                <div class="card-body text-center p-3">
                                    <h3 class="font-weight-bold"><b>1</b></h3>
                                    <p class="font-weight-bold"><b>SEMERU</b></p>
                                    <i class="fas fa-file-invoice fa-2x"></i>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
