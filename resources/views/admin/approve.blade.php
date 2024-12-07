@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="content flex-grow-1 p-3">
            {{-- Navigation --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Halaman Utama</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Persetujuan</li>
                </ol>
            </nav>

            {{-- Pengajuan Anda --}}
            <div class="card card-default shadow-sm mb-4" style="border-radius: 15px;">
                <div class="card-header text-center">
                    <div class="row pt-2">
                        <div class="col-sm-12">
                            <h4>PERSETUJUAN</h4>
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
                                            <th>NAMA</th>
                                            <th>LAYANAN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>1</td>
                                            <td>2023-10-01</td>
                                            <td>John Doe</td>
                                            <td>Service A</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm">Detail</a>
                                                <a href="" class="btn btn-danger btn-sm">Tolak</a>
                                                <a href="" class="btn btn-success btn-sm">Setujui</a>
                                            </td>
                                        </tr>
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
