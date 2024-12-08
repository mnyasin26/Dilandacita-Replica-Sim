@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="content flex-grow-1 p-3">
            {{-- Navigation --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Halaman Utama</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Semua Form</li>
                </ol>
            </nav>

            {{-- Pengajuan Anda --}}
            <div class="card card-default shadow-sm mb-4" style="border-radius: 15px;">
                <div class="card-header text-center">
                    <div class="row pt-2">
                        <div class="col-sm-12">
                            <h4>SEMUA FORM</h4>
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
                                            <th>NAMA PELAPOR</th>
                                            <th>NAMA LAYANAN</th>
                                            <th>STATUS</th>
                                            <th>AKSI</th>
                                        </tr>
                                        {{-- </tr>h>AKSI</th> --}}

                                    </thead>
                                    <tbody>
                                        @foreach ($pengajuans as $index => $pengajuan)
                                            <tr class="text-center">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pengajuan->tgl_pengajuan->format('Y-m-d') }}</td>
                                                <td>{{ $pengajuan->nama_lgkp ?? '-' }}</td>
                                                <td>{{ $pengajuan->m_layanan->nama_layanan == 'aktaLahir' ? 'AKTA KELAHIRAN' : $pengajuan->m_layanan->nama_layanan ?? '-' }}
                                                </td>
                                                <td>{{ $pengajuan->status_pengajuan }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.detail', $pengajuan->id_pengajuan) }}"
                                                        class="btn btn-primary btn-sm">Detail</a>
                                                    </form>
                                                    @if ($pengajuan->status_pengajuan == 'Diterbitkan')
                                                        <a href="#"
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
        </div>
    </div>
@endsection
