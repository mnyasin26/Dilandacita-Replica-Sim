@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/order_tracking_vertical.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="content flex-grow-1 p-3">
            {{-- Navigation --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Halaman Utama</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pengajuan</li>
                </ol>
            </nav>

            {{-- Detail Pengajuan --}}
            <div class="card card-default shadow-sm mb-4" style="border-radius: 15px;">
                <div class="card-header text-center">
                    <div class="row pt-2">
                        <div class="col-sm-12">
                            <h4>DETAIL PENGAJUAN</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div id="tracking-pre"></div>
                                <div id="tracking">
                                    <div class="text-center tracking-status-intransit">
                                        <p class="tracking-status text-tight">in transit</p>
                                    </div>
                                    <div class="tracking-list">
                                        {{-- Content from order_tracking_vertical.html --}}
                                        <div class="tracking-item">
                                            <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                    data-prefix="fas" data-icon="circle" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="tracking-date">Aug 10, 2018<span>05:01 PM</span></div>
                                            <div class="tracking-content">DESTROYED PER SHIPPER INSTRUCTION<span>KUALA
                                                    LUMPUR (LOGISTICS HUB), MALAYSIA, MALAYSIA</span></div>
                                        </div>
                                        <div class="tracking-item">
                                            <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                    data-prefix="fas" data-icon="circle" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fas fa-circle"></i> -->
                                            </div>
                                            <div class="tracking-date">Aug 10, 2018<span>11:19 AM</span></div>
                                            <div class="tracking-content">SHIPMENT DELAYSHIPPER INSTRUCTION TO
                                                DESTROY<span>SHENZHEN, CHINA, PEOPLE'S REPUBLIC</span></div>
                                        </div>
                                        <div class="tracking-item">
                                            <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                    data-prefix="fas" data-icon="circle" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fas fa-circle"></i> -->
                                            </div>
                                            <div class="tracking-date">Jul 27, 2018<span>04:08 PM</span></div>
                                            <div class="tracking-content">DELIVERY ADVICERequest Instruction from
                                                ORIGIN<span>KUALA LUMPUR (LOGISTICS HUB), MALAYSIA, MALAYSIA</span></div>
                                        </div>
                                        <div class="tracking-item">
                                            <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                    data-prefix="fas" data-icon="circle" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fas fa-circle"></i> -->
                                            </div>
                                            <div class="tracking-date">Jul 20, 2018<span>05:25 PM</span></div>
                                            <div class="tracking-content">Delivery InfoCLOSED-OFFICE/HOUSE CLOSED<span>KUALA
                                                    LUMPUR (LOGISTICS HUB), MALAYSIA, MALAYSIA</span></div>
                                        </div>
                                        <div class="tracking-item">
                                            <div class="tracking-icon status-outfordelivery">
                                                <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true"
                                                    data-prefix="fas" data-icon="shipping-fast" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fas fa-shipping-fast"></i> -->
                                            </div>
                                            <div class="tracking-date">Jul 20, 2018<span>08:58 AM</span></div>
                                            <div class="tracking-content">Shipment is out for despatch by
                                                KLHB023.<span>KUALA LUMPUR (LOGISTICS HUB), MALAYSIA, MALAYSIA</span></div>
                                        </div>
                                        <div class="tracking-item">
                                            <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                    data-prefix="fas" data-icon="circle" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                    </path>
                                                </svg>
                                                <!-- <i class="fas fa-circle"></i> -->
                                            </div>
                                            <div class="tracking-date">Jul 19, 2018<span>05:42 PM</span></div>
                                            <div class="tracking-content">Delivery InfoUNABLE TO ACCESS<span>KUALA LUMPUR
                                                    (LOGISTICS HUB), MALAYSIA, MALAYSIA</span></div>
                                        </div>
                                        {{-- Add more tracking items as needed --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-default shadow-sm mb-4" style="border-radius: 15px;">
                <div class="card-header text-center">
                    <div class="row pt-2">
                        <div class="col-sm-12">
                            <h4>ISI PENGAJUAN</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        {{-- Data Wilayah --}}
                        <div class="card mb-3">
                            <div class="card-header text-center">DATA WILAYAH</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="provinsi" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        Provinsi</label>
                                    <div class="col-sm-4">
                                        <select name="provinsi" id="provinsi" class="form-select form-select-sm"
                                            disabled>
                                            {{-- Options --}}
                                            <option selected="selected" value="JAWA BARAT">32 - JAWA BARAT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kabkota" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        Kabupaten Kota</label>
                                    <div class="col-sm-4">
                                        <select class="form-select form-select-sm" id="kabkota" name="kabkota"
                                            disabled>
                                            <option selected="selected" value="KOTA CIMAHI">77 - KOTA CIMAHI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kecamatan" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        Kecamatan</label>
                                    <div class="col-sm-4">
                                        <select class="form-select form-select-sm" id="kecamatan" name="kecamatan"
                                            disabled>
                                            <option value="Cimahi Selatan"
                                                {{ old('kecamatan', $pengajuanAkta->kecamatan ?? '') == 1 ? 'selected' : '' }}>
                                                Cimahi Selatan</option>
                                            <option value="Cimahi Tengah"
                                                {{ old('kecamatan', $pengajuanAkta->kecamatan ?? '') == 2 ? 'selected' : '' }}>
                                                Cimahi Tengah</option>
                                            <option value="Cimahi Utara"
                                                {{ old('kecamatan', $pengajuanAkta->kecamatan ?? '') == 3 ? 'selected' : '' }}>
                                                Cimahi Utara</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kelurahan" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        Kelurahan</label>
                                    <div class="col-sm-4">
                                        <select class="form-select form-select-sm" id="kelurahan" name="kelurahan"
                                            disabled>
                                            <option value="Baros"
                                                {{ old('kelurahan', $pengajuanAkta->kelurahan ?? '') == 1 ? 'selected' : '' }}>
                                                Baros</option>
                                            <option value="Cigugur Tengah"
                                                {{ old('kelurahan', $pengajuanAkta->kelurahan ?? '') == 2 ? 'selected' : '' }}>
                                                Cigugur Tengah</option>
                                            <option value="Karangmekar"
                                                {{ old('kelurahan', $pengajuanAkta->kelurahan ?? '') == 3 ? 'selected' : '' }}>
                                                Karangmekar</option>
                                            <option value="Setiamanah"
                                                {{ old('kelurahan', $pengajuanAkta->kelurahan ?? '') == 4 ? 'selected' : '' }}>
                                                Setiamanah</option>
                                            <option value="Padasuka"
                                                {{ old('kelurahan', $pengajuanAkta->kelurahan ?? '') == 5 ? 'selected' : '' }}>
                                                Padasuka</option>
                                            <option value="Cimahi"
                                                {{ old('kelurahan', $pengajuanAkta->kelurahan ?? '') == 6 ? 'selected' : '' }}>
                                                Cimahi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Data Pemohon --}}
                        <div class="card mb-3">
                            <div class="card-header text-center">DATA PEMOHON</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nomor_kk_pelapor" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Nomor Kartu Keluarga</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm" id="nomor_kk_pelapor"
                                            name="nomor_kk_pelapor" value="{{ $user->no_kk }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nik_pelapor" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        Nomor Induk Kependudukan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm" id="nik_pelapor"
                                            name="nik_pelapor" value="{{ old('nik_pelapor', $pengajuan->nik ?? '') }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_lengkap_pelapor" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Nama Lengkap Pemohon</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm"
                                            id="nama_lengkap_pelapor" name="nama_lengkap_pelapor"
                                            value="{{ old('nama_lengkap_pelapor', $pengajuan->nama_lgkp ?? '') }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telepon" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        Nomor Telepon Pemohon</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm" id="telepon"
                                            name="telepon" value="{{ $user->telepon }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email_pelapor" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Email Pemohon</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control form-control-sm" id="email_pelapor"
                                            name="email_pelapor" value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_dokumen_perjalanan_pelapor" class="col-sm-3 col-form-label">Nomor
                                        Dokumen
                                        Perjalanan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm"
                                            id="no_dokumen_perjalanan_pelapor" name="no_dokumen_perjalanan_pelapor"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kewarganegaraan_pelapor" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Kewarganegaraan</label>
                                    <div class="col-sm-4">
                                        <select class="form-select form-select-sm" id="kewarganegaraan_pelapor"
                                            name="kewarganegaraan_pelapor" disabled>
                                            <option value="INDONESIA" selected>INDONESIA</option>
                                            <option value="AFGHANISTAN">AFGHANISTAN</option>
                                            <option value="ALBANIA">ALBANIA</option>
                                            <option value="ALGERIA">ALGERIA</option>
                                            <option value="AMERICAN SAMOA">AMERICAN SAMOA</option>
                                            <option value="ANDORRA">ANDORRA</option>
                                            <option value="ANGOLA">ANGOLA</option>
                                            <option value="ANGUILLA">ANGUILLA</option>
                                            <option value="ANTARCTICA">ANTARCTICA</option>
                                            <option value="ARGENTINA">ARGENTINA</option>
                                            <option value="ARMENIA">ARMENIA</option>
                                            <option value="AUSTRALIA">AUSTRALIA</option>
                                            <option value="AUSTRIA">AUSTRIA</option>
                                            <option value="AZERBAIJAN">AZERBAIJAN</option>
                                            <option value="BAHAMAS">BAHAMAS</option>
                                            <option value="BAHRAIN">BAHRAIN</option>
                                            <option value="BANGLADESH">BANGLADESH</option>
                                            <option value="BARBADOS">BARBADOS</option>
                                            <option value="BELARUS">BELARUS</option>
                                            <option value="BELGIUM">BELGIUM</option>
                                            <option value="BELIZE">BELIZE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Data Anak --}}
                        <div class="card mb-3">
                            <div class="card-header text-center">DATA ANAK</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nikanak" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        Nomor Induk Kependudukan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm" id="nikanak"
                                            name="nikanak" required
                                            value="{{ old('nikanak', $pengajuanAkta->nik_anak ?? '') }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_lengkap_anak" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Nama Lengkap Anak</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="nama_lengkap_anak"
                                            name="nama_lengkap_anak" required
                                            value="{{ old('nama_lengkap_anak', $pengajuanAkta->nama_lgkp_anak ?? '') }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_kelamin_anak" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Jenis Kelamin</label>
                                    <div class="col-sm-4">
                                        <select class="form-select form-select-sm" id="jenis_kelamin_anak"
                                            name="jenis_kelamin_anak" disabled>
                                            <option value="L"
                                                {{ old('jenis_kelamin_anak', $pengajuanAkta->jenis_kelamin_anak ?? '') == 1 ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="P"
                                                {{ old('jenis_kelamin_anak', $pengajuanAkta->jenis_kelamin_anak ?? '') == 2 ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tempat_dilahirkan_anak" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Tempat Dilahirkan</label>
                                    <div class="col-sm-4">
                                        <select class="form-select form-select-sm" id="tempat_dilahirkan_anak"
                                            name="tempat_dilahirkan_anak" disabled>
                                            <option value="RS"
                                                {{ old('tempat_dilahirkan_anak', $pengajuanAkta->tempat_dilahirkan_anak ?? '') == 1 ? 'selected' : '' }}>
                                                Rumah Sakit</option>
                                            <option value="RB"
                                                {{ old('tempat_dilahirkan_anak', $pengajuanAkta->tempat_dilahirkan_anak ?? '') == 2 ? 'selected' : '' }}>
                                                Rumah Bersalin</option>
                                            <option value="PUSKESMAS"
                                                {{ old('tempat_dilahirkan_anak', $pengajuanAkta->tempat_dilahirkan_anak ?? '') == 3 ? 'selected' : '' }}>
                                                Puskesmas</option>
                                            <option value="RUMAH"
                                                {{ old('tempat_dilahirkan_anak', $pengajuanAkta->tempat_dilahirkan_anak ?? '') == 4 ? 'selected' : '' }}>
                                                Rumah</option>
                                            <option value="LAINNYA"
                                                {{ old('tempat_dilahirkan_anak', $pengajuanAkta->tempat_dilahirkan_anak ?? '') == 5 ? 'selected' : '' }}>
                                                Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tempat_kelahiran_anak" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Tempat Kelahiran</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm"
                                            id="tempat_kelahiran_anak" name="tempat_kelahiran_anak" required
                                            value="{{ old('tempat_kelahiran_anak', $pengajuanAkta->tempat_kelahirkan_anak ?? '') }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hari_lahir" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Hari Lahir</label>
                                    <div class="col-sm-4">
                                        <select class="form-select form-select-sm" id="hari_lahir" name="hari_lahir"
                                            disabled>
                                            <option value="Senin"
                                                {{ old('hari_lahir', $pengajuanAkta->hari ?? '') == 1 ? 'selected' : '' }}>
                                                Senin</option>
                                            <option value="Selasa"
                                                {{ old('hari_lahir', $pengajuanAkta->hari ?? '') == 2 ? 'selected' : '' }}>
                                                Selasa</option>
                                            <option value="Rabu"
                                                {{ old('hari_lahir', $pengajuanAkta->hari ?? '') == 3 ? 'selected' : '' }}>
                                                Rabu</option>
                                            <option value="Kamis"
                                                {{ old('hari_lahir', $pengajuanAkta->hari ?? '') == 4 ? 'selected' : '' }}>
                                                Kamis</option>
                                            <option value="Jumat"
                                                {{ old('hari_lahir', $pengajuanAkta->hari ?? '') == 5 ? 'selected' : '' }}>
                                                Jumat</option>
                                            <option value="Sabtu"
                                                {{ old('hari_lahir', $pengajuanAkta->hari ?? '') == 6 ? 'selected' : '' }}>
                                                Sabtu</option>
                                            <option value="Minggu"
                                                {{ old('hari_lahir', $pengajuanAkta->hari ?? '') == 7 ? 'selected' : '' }}>
                                                Minggu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_kelahiran_anak" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Tanggal Kelahiran</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control form-control-sm"
                                            id="tanggal_kelahiran_anak" name="tanggal_kelahiran_anak" required
                                            value="{{ old('tanggal_kelahiran_anak', isset($pengajuanAkta->tgl_kelahiran_anak) ? \Carbon\Carbon::parse($pengajuanAkta->tgl_kelahiran_anak)->format('Y-m-d') : '') }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jam" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        Waktu Kelahiran</label>
                                    <div class="col-sm-3">
                                        <input type="time" class="form-control form-control-sm" id="jam"
                                            name="jam" required
                                            value="{{ old('jam', isset($pengajuanAkta->waktu_kelahiran) ? \Carbon\Carbon::parse($pengajuanAkta->waktu_kelahiran)->format('H:i') : '') }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_kelahiran" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Jenis Kelahiran</label>
                                    <div class="col-sm-4">
                                        <select class="form-select form-select-sm" id="jenis_kelahiran"
                                            name="jenis_kelahiran" disabled>
                                            <option value="Tunggal"
                                                {{ old('jenis_kelahiran', $pengajuanAkta->jenis_kelahiran ?? '') == 1 ? 'selected' : '' }}>
                                                Tunggal</option>
                                            <option value="Kembar"
                                                {{ old('jenis_kelahiran', $pengajuanAkta->jenis_kelahiran ?? '') == 2 ? 'selected' : '' }}>
                                                Kembar</option>
                                            <option value="Lainnya"
                                                {{ old('jenis_kelahiran', $pengajuanAkta->jenis_kelahiran ?? '') == 3 ? 'selected' : '' }}>
                                                Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kelahiran_ke" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Kelahiran Ke</label>

                                    <div class="col-sm-2">
                                        <input type="number" class="form-control form-control-sm" id="kelahiran_ke"
                                            name="kelahiran_ke" required
                                            value="{{ old('kelahiran_ke', $pengajuanAkta->kelahiran_ke ?? '') }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="penolong_kelahiran" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Penolong Kelahiran</label>
                                    <div class="col-sm-4">
                                        <select class="form-select form-select-sm" id="penolong_kelahiran"
                                            name="penolong_kelahiran" disabled>
                                            <option value="Dokter"
                                                {{ old('penolong_kelahiran', $pengajuanAkta->penolong_klhrn ?? '') == 1 ? 'selected' : '' }}>
                                                Dokter</option>
                                            <option value="Bidan"
                                                {{ old('penolong_kelahiran', $pengajuanAkta->penolong_klhrn ?? '') == 2 ? 'selected' : '' }}>
                                                Bidan</option>
                                            <option value="Dukun"
                                                {{ old('penolong_kelahiran', $pengajuanAkta->penolong_klhrn ?? '') == 3 ? 'selected' : '' }}>
                                                Dukun</option>
                                            <option value="Lainnya"
                                                {{ old('penolong_kelahiran', $pengajuanAkta->penolong_klhrn ?? '') == 4 ? 'selected' : '' }}>
                                                Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="berat" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        Berat</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control form-control-sm" id="berat"
                                            name="berat" required
                                            value="{{ old('berat', $pengajuanAkta->berat_anak ?? '') }}" disabled>
                                    </div>
                                    <label for="berat" class="col-sm-3 col-form-label">Kilogram</label>
                                </div>
                                <div class="form-group row">
                                    <label for="panjang" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        Panjang</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control form-control-sm" id="panjang"
                                            name="panjang" required
                                            value="{{ old('panjang', $pengajuanAkta->panjang_anak ?? '') }}" disabled>
                                    </div>
                                    <label for="panjang" class="col-sm-3 col-form-label">Centimeter</label>
                                </div>
                            </div>
                        </div>

                        {{-- Data Orang Tua --}}
                        <div class="card mb-3">
                            <div class="card-header text-center">DATA ORANG TUA</div>
                            <div class="card-body">
                                {{-- Data Ayah --}}
                                <h5 class="mb-3">Data Ayah</h5>
                                <div class="form-group row">
                                    <label for="nik_ayah" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        NIK Ayah</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm" id="nik_ayah"
                                            name="nik_ayah" required
                                            value="{{ old('nik_ayah', $pengajuanAkta->nik_ayah ?? '') }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_ayah" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        Nama Lengkap Ayah</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="nama_ayah"
                                            name="nama_ayah" required
                                            value="{{ old('nama_ayah', $pengajuanAkta->nama_lgkp_ayah ?? '') }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_lahir_ayah" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Tanggal Lahir Ayah</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control form-control-sm"
                                            id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" required
                                            value="{{ old('tanggal_lahir_ayah', isset($pengajuanAkta->tgl_lhr_ayah) ? \Carbon\Carbon::parse($pengajuanAkta->tgl_lhr_ayah)->format('Y-m-d') : '') }}"
                                            disabled>
                                    </div>
                                </div>

                                {{-- ...additional fields for Ayah as per akta lahir.html... --}}

                                {{-- Data Ibu --}}
                                <h5 class="mb-3 mt-4">Data Ibu</h5>
                                <div class="form-group row">
                                    <label for="nik_ibu" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        NIK Ibu</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm" id="nik_ibu"
                                            name="nik_ibu" required
                                            value="{{ old('nik_ibu', $pengajuanAkta->nik_ibu ?? '') }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_ibu" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span>
                                        Nama Lengkap Ibu</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="nama_ibu"
                                            name="nama_ibu" required
                                            value="{{ old('nama_ibu', $pengajuanAkta->nama_lgkp_ibu ?? '') }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_lahir_ibu" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Tanggal Lahir Ibu</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control form-control-sm" id="tanggal_lahir_ibu"
                                            name="tanggal_lahir_ibu" required
                                            value="{{ old('tanggal_lahir_ibu', isset($pengajuanAkta->tgl_lhr_ibu) ? \Carbon\Carbon::parse($pengajuanAkta->tgl_lhr_ibu)->format('Y-m-d') : '') }}"
                                            disabled>
                                    </div>
                                </div>

                                {{-- ...additional fields for Ibu as per akta lahir.html... --}}
                            </div>
                        </div>

                        {{-- Data Saksi 1 --}}
                        <div class="card mb-3">
                            <div class="card-header text-center">DATA SAKSI 1</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nik_saksi1" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> NIK Saksi 1</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm" id="nik_saksi1"
                                            name="nik_saksi1" required
                                            value="{{ old('nik_saksi1', $pengajuanAkta->nik_saksi_1 ?? '') }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_saksi1" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Nama Saksi 1</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="nama_saksi1"
                                            name="nama_saksi1" required
                                            value="{{ old('nama_saksi1', $pengajuanAkta->nama_lgkp_saksi_1 ?? '') }}"
                                            disabled>
                                    </div>
                                </div>
                                {{-- ...additional fields for Saksi 1... --}}
                            </div>
                        </div>

                        {{-- Data Saksi 2 --}}
                        <div class="card mb-3">
                            <div class="card-header text-center">DATA SAKSI 2</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nik_saksi2" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> NIK Saksi 2</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-sm" id="nik_saksi2"
                                            name="nik_saksi2" required
                                            value="{{ old('nik_saksi2', $pengajuanAkta->nik_saksi_2 ?? '') }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_saksi2" class="col-sm-3 col-form-label"><span
                                            style="color: red;"></span> Nama Saksi 2</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="nama_saksi2"
                                            name="nama_saksi2" required
                                            value="{{ old('nama_saksi2', $pengajuanAkta->nama_lgkp_saksi_2 ?? '') }}"
                                            disabled>
                                    </div>
                                </div>
                                {{-- ...additional fields for Saksi 2... --}}
                            </div>
                        </div>

                        {{-- Keterangan Pemohon --}}
                        <div class="card mb-3">
                            <div class="card-header text-center">KETERANGAN PEMOHON</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <textarea class="form-control form-control-sm shadow" name="notes_masyarakat" id="notes_masyarakat"
                                        style="resize: none; border-radius: 15px;" placeholder="Keterangan Pemohon" rows="5" disabled>{{ old('notes_masyarakat', $pengajuanAkta->keterangan ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
