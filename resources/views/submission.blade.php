@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="content flex-grow-1 ms-1 me-1">
            {{-- <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">DILANDACITA</a>
                    <div class="d-flex">
                        <span class="navbar-text">Irham Jundurrahmaan</span>
                    </div>
                </div>
            </nav> --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Halaman Utama</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengajuan</li>
                </ol>
            </nav>
            <h4 class="mb-4">SILAHKAN PILIH JENIS PENGAJUAN</h4>
            <div class="row row-cols-1 row-cols-md-4 g-3">
                <div class="col">
                    <a href="{{ route('akta-kelahiran') }}" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="https://storage.googleapis.com/a1aa/image/q7ye4xc1LTRwD6pQpV6W2wpeu55wOpJ6NQGy6uL5Hqkrv4zTA.jpg"
                                class="card-img-top" alt="Akta Kelahiran">
                            <div class="card-body">
                                <h5 class="card-title">Akta Kelahiran</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/akta-kematian" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="https://storage.googleapis.com/a1aa/image/qcZa66DJ1WYyPJqtTJZ1fYMEQvPfelwxvq0bDSVfJWwjeFf8E.jpg"
                                class="card-img-top" alt="Akta Kematian">
                            <div class="card-body">
                                <h5 class="card-title">Akta Kematian</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/cetak-kk" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="https://storage.googleapis.com/a1aa/image/wSgCKXo2R6JTHdMjPtyg81uWPX1JbvxlGnIdfp9FjvVyX85JA.jpg"
                                class="card-img-top" alt="Cetak Kartu Keluarga">
                            <div class="card-body">
                                <h5 class="card-title">Cetak Kartu Keluarga</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/cetak-ktp" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="https://storage.googleapis.com/a1aa/image/IneizRPfwOoav0EsdNqel9ORzHu5InDbsQY3ROL4WMgNfiPPB.jpg"
                                class="card-img-top" alt="Cetak Ulang KTP-el">
                            <div class="card-body">
                                <h5 class="card-title">Cetak Ulang KTP-el</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/input-biodata" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="https://storage.googleapis.com/a1aa/image/R3F3Iw3WAD5WBdeu4GiCuCp6h0FE38YyhXR0FfxjdpAzv4zTA.jpg"
                                class="card-img-top" alt="Input Biodata">
                            <div class="card-body">
                                <h5 class="card-title">Input Biodata</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/kia" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="https://storage.googleapis.com/a1aa/image/a3lcwooL8R6MN59BIJkgqo1XUvtcHrvXlcLcaZVF6wa7Le5JA.jpg"
                                class="card-img-top" alt="Kartu Identitas Anak (KIA)">
                            <div class="card-body">
                                <h5 class="card-title">Kartu Identitas Anak (KIA)</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/perbaikan-data" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="https://storage.googleapis.com/a1aa/image/q7eFq97WzyWesEJzrPQQyQPDOH8RcLLee0Wjzu1vV344eFf8E.jpg"
                                class="card-img-top" alt="Perbaikan Data">
                            <div class="card-body">
                                <h5 class="card-title">Perbaikan Data</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/pindah-datang" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="https://storage.googleapis.com/a1aa/image/GDrzM4ASnnryHBZ6OeTpkkUec5Lzg5bfKLdBHO3hWKPeeFf8E.jpg"
                                class="card-img-top" alt="Pindah Datang">
                            <div class="card-body">
                                <h5 class="card-title">Pindah Datang</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/pindah-keluar" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="https://storage.googleapis.com/a1aa/image/ec5shh4qirwCN6iYRN295qbAX4fXco5afEF6ctgmEQzUfiPPB.jpg"
                                class="card-img-top" alt="Pindah Keluar">
                            <div class="card-body">
                                <h5 class="card-title">Pindah Keluar</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/selamat-menempuh-hidup-baru" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="https://storage.googleapis.com/a1aa/image/ihJTpjrCiOaBANZKBV4kVEypwhpcByjT8EbldR0Twga8Le5JA.jpg"
                                class="card-img-top" alt="Selamat Menempuh Hidup Baru">
                            <div class="card-body">
                                <h5 class="card-title">Selamat Menempuh Hidup Baru</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="footer">
        <p>© 2022 Disdukcapil Kota Cimahi</p>
        <p>Version 2.0</p>
    </div> --}}
@endsection
