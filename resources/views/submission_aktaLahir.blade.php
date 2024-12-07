@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="content flex-grow-1 ms-1 me-1">
            {{-- Navigation --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Halaman Utama</a></li>
                    <li class="breadcrumb-item"><a href="">Pengajuan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Akta Kelahiran</li>
                </ol>
            </nav>

            <h4 class="mb-4 text-center">FORMULIR PENDAFTARAN AKTA KELAHIRAN</h4>

            {{-- Form Card --}}
            <div class="card card-body shadow" style="border-radius: 10px;">
                <p><b style="color: red;">Catatan:</b></p>
                <ul>
                    <li>Tanda (*) Dokumen wajib dilampirkan.</li>
                    <li>Tanda (**) Menyesuaikan dengan kebutuhan.</li>
                    <li>Untuk non-muslim dilampirkan 1 lembar akta nikah, sedangkan yang muslim silakan lampirkan 3 lembar
                        akta nikah.</li>
                    <li>Dokumen tambahan yang tidak diperlukan, boleh dikosongkan.</li>
                    <li>Semua file berbentuk foto atau gambar yang berwarna/asli dengan ukuran file tidak lebih dari 1MB.
                    </li>
                    <li>Jika anak belum memiliki NIK silakan lakukan pengajuan melalui layanan <a href=""><b>Input
                                Biodata</b></a>.</li>
                    <li>Informasi Persyaratan (<a href="#" onclick="info_persyaratan()"><b>Klik Disini</b></a>)</li>
                </ul>

                {{-- Form Start --}}
                <form method="POST"
                    action="{{ isset($pengajuan) ? route('akta-kelahiran.update', $pengajuan->id_pengajuan) : route('akta-kelahiran.store') }}"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @if (isset($pengajuan))
                        @method('PUT')
                    @endif

                    {{-- Data Wilayah --}}
                    <div class="card mb-3">
                        <div class="card-header text-center">DATA WILAYAH</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="provinsi" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    Provinsi</label>
                                <div class="col-sm-4">
                                    <select name="provinsi" id="provinsi" class="form-select form-select-sm" readonly>
                                        {{-- Options --}}
                                        <option selected="selected" value="JAWA BARAT">32 - JAWA BARAT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kabkota" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    Kabupaten Kota</label>
                                <div class="col-sm-4">
                                    <select class="form-select form-select-sm" id="kabkota" name="kabkota" readonly>
                                        <option selected="selected" value="KOTA CIMAHI">77 - KOTA CIMAHI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kecamatan" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    Kecamatan</label>
                                <div class="col-sm-4">
                                    <select class="form-select form-select-sm" id="kecamatan" name="kecamatan">
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
                                <label for="kelurahan" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    Kelurahan</label>
                                <div class="col-sm-4">
                                    <select class="form-select form-select-sm" id="kelurahan" name="kelurahan">
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
                                        style="color: red;">*</span> Nomor Kartu Keluarga</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="nomor_kk_pelapor"
                                        name="nomor_kk_pelapor" value="{{ $user->no_kk }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nik_pelapor" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    Nomor Induk Kependudukan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="nik_pelapor"
                                        name="nik_pelapor" value="{{ old('nik_pelapor', $pengajuan->nik ?? $user->nik) }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_lengkap_pelapor" class="col-sm-3 col-form-label"><span
                                        style="color: red;">*</span> Nama Lengkap Pemohon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nama_lengkap_pelapor"
                                        name="nama_lengkap_pelapor"
                                        value="{{ old('nama_lengkap_pelapor', $pengajuan->nama_lgkp ?? $user->name) }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telepon" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    Nomor Telepon Pemohon</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="telepon"
                                        name="telepon" value="{{ $user->telepon }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_pelapor" class="col-sm-3 col-form-label"><span
                                        style="color: red;">*</span> Email Pemohon</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control form-control-sm" id="email_pelapor"
                                        name="email_pelapor" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_dokumen_perjalanan_pelapor" class="col-sm-3 col-form-label">Nomor Dokumen
                                    Perjalanan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm"
                                        id="no_dokumen_perjalanan_pelapor" name="no_dokumen_perjalanan_pelapor">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kewarganegaraan_pelapor" class="col-sm-3 col-form-label"><span
                                        style="color: red;">*</span> Kewarganegaraan</label>
                                <div class="col-sm-4">
                                    <select class="form-select form-select-sm" id="kewarganegaraan_pelapor"
                                        name="kewarganegaraan_pelapor">
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
                                <label for="nikanak" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    Nomor Induk Kependudukan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="nikanak"
                                        name="nikanak" required
                                        value="{{ old('nikanak', $pengajuanAkta->nik_anak ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_lengkap_anak" class="col-sm-3 col-form-label"><span
                                        style="color: red;">*</span> Nama Lengkap Anak</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nama_lengkap_anak"
                                        name="nama_lengkap_anak" required
                                        value="{{ old('nama_lengkap_anak', $pengajuanAkta->nama_lgkp_anak ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_kelamin_anak" class="col-sm-3 col-form-label"><span
                                        style="color: red;">*</span> Jenis Kelamin</label>
                                <div class="col-sm-4">
                                    <select class="form-select form-select-sm" id="jenis_kelamin_anak"
                                        name="jenis_kelamin_anak">
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
                                        style="color: red;">*</span> Tempat Dilahirkan</label>
                                <div class="col-sm-4">
                                    <select class="form-select form-select-sm" id="tempat_dilahirkan_anak"
                                        name="tempat_dilahirkan_anak">
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
                                        style="color: red;">*</span> Tempat Kelahiran</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="tempat_kelahiran_anak"
                                        name="tempat_kelahiran_anak" required
                                        value="{{ old('tempat_kelahiran_anak', $pengajuanAkta->tempat_kelahirkan_anak ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hari_lahir" class="col-sm-3 col-form-label"><span
                                        style="color: red;">*</span> Hari Lahir</label>
                                <div class="col-sm-4">
                                    <select class="form-select form-select-sm" id="hari_lahir" name="hari_lahir">
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
                                        style="color: red;">*</span> Tanggal Kelahiran</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control form-control-sm"
                                        id="tanggal_kelahiran_anak" name="tanggal_kelahiran_anak" required
                                        value="{{ old('tanggal_kelahiran_anak', isset($pengajuanAkta->tgl_kelahiran_anak) ? \Carbon\Carbon::parse($pengajuanAkta->tgl_kelahiran_anak)->format('Y-m-d') : '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jam" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    Waktu Kelahiran</label>
                                <div class="col-sm-3">
                                    <input type="time" class="form-control form-control-sm" id="jam"
                                        name="jam" required value="{{ old('jam', isset($pengajuanAkta->waktu_kelahiran) ? \Carbon\Carbon::parse($pengajuanAkta->waktu_kelahiran)->format('H:i') : '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_kelahiran" class="col-sm-3 col-form-label"><span
                                        style="color: red;">*</span> Jenis Kelahiran</label>
                                <div class="col-sm-4">
                                    <select class="form-select form-select-sm" id="jenis_kelahiran"
                                        name="jenis_kelahiran">
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
                                        style="color: red;">*</span> Kelahiran Ke</label>

                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-sm" id="kelahiran_ke"
                                        name="kelahiran_ke" required
                                        value="{{ old('kelahiran_ke', $pengajuanAkta->kelahiran_ke ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penolong_kelahiran" class="col-sm-3 col-form-label"><span
                                        style="color: red;">*</span> Penolong Kelahiran</label>
                                <div class="col-sm-4">
                                    <select class="form-select form-select-sm" id="penolong_kelahiran"
                                        name="penolong_kelahiran">
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
                                <label for="berat" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    Berat</label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control form-control-sm" id="berat"
                                        name="berat" required value="{{ old('berat', $pengajuanAkta->berat_anak ?? '') }}">
                                </div>
                                <label for="berat" class="col-sm-3 col-form-label">Kilogram</label>
                            </div>
                            <div class="form-group row">
                                <label for="panjang" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    Panjang</label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control form-control-sm" id="panjang"
                                        name="panjang" required
                                        value="{{ old('panjang', $pengajuanAkta->panjang_anak ?? '') }}">
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
                                <label for="nik_ayah" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    NIK Ayah</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="nik_ayah"
                                        name="nik_ayah" required
                                        value="{{ old('nik_ayah', $pengajuanAkta->nik_ayah ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_ayah" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    Nama Lengkap Ayah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nama_ayah"
                                        name="nama_ayah" required
                                        value="{{ old('nama_ayah', $pengajuanAkta->nama_lgkp_ayah ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_lahir_ayah" class="col-sm-3 col-form-label"><span
                                        style="color: red;">*</span> Tanggal Lahir Ayah</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control form-control-sm" id="tanggal_lahir_ayah"
                                        name="tanggal_lahir_ayah" required
                                        value="{{ old('tanggal_lahir_ayah', isset($pengajuanAkta->tgl_lhr_ayah) ? \Carbon\Carbon::parse($pengajuanAkta->tgl_lhr_ayah)->format('Y-m-d') : '') }}">
                                </div>
                            </div>

                            {{-- ...additional fields for Ayah as per akta lahir.html... --}}

                            {{-- Data Ibu --}}
                            <h5 class="mb-3 mt-4">Data Ibu</h5>
                            <div class="form-group row">
                                <label for="nik_ibu" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    NIK Ibu</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="nik_ibu"
                                        name="nik_ibu" required
                                        value="{{ old('nik_ibu', $pengajuanAkta->nik_ibu ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_ibu" class="col-sm-3 col-form-label"><span style="color: red;">*</span>
                                    Nama Lengkap Ibu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nama_ibu"
                                        name="nama_ibu" required
                                        value="{{ old('nama_ibu', $pengajuanAkta->nama_lgkp_ibu ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_lahir_ibu" class="col-sm-3 col-form-label"><span
                                        style="color: red;">*</span> Tanggal Lahir Ibu</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control form-control-sm" id="tanggal_lahir_ibu"
                                        name="tanggal_lahir_ibu" required
                                        value="{{ old('tanggal_lahir_ibu', isset($pengajuanAkta->tgl_lhr_ibu) ? \Carbon\Carbon::parse($pengajuanAkta->tgl_lhr_ibu)->format('Y-m-d') : '') }}">
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
                                        style="color: red;">*</span> NIK Saksi 1</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="nik_saksi1"
                                        name="nik_saksi1" required
                                        value="{{ old('nik_saksi1', $pengajuanAkta->nik_saksi_1 ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_saksi1" class="col-sm-3 col-form-label"><span
                                        style="color: red;">*</span> Nama Saksi 1</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nama_saksi1"
                                        name="nama_saksi1" required
                                        value="{{ old('nama_saksi1', $pengajuanAkta->nama_lgkp_saksi_1 ?? '') }}">
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
                                        style="color: red;">*</span> NIK Saksi 2</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="nik_saksi2"
                                        name="nik_saksi2" required
                                        value="{{ old('nik_saksi2', $pengajuanAkta->nik_saksi_2 ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_saksi2" class="col-sm-3 col-form-label"><span
                                        style="color: red;">*</span> Nama Saksi 2</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="nama_saksi2"
                                        name="nama_saksi2" required
                                        value="{{ old('nama_saksi2', $pengajuanAkta->nama_lgkp_saksi_2 ?? '') }}">
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
                                    style="resize: none; border-radius: 15px;" placeholder="Keterangan Pemohon" rows="5">{{ old('notes_masyarakat', $pengajuanAkta->keterangan ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Upload Dokumen --}}
                    <div class="card mb-3">
                        <div class="card-header text-center">UPLOAD DOKUMEN PERSYARATAN</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="skl" class="form-label">Surat Keterangan Kelahiran dari RS/RB
                                                (*)</label>
                                            <input class="form-control" type="file" id="skl" name="skl"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="kk" class="form-label">Kartu Keluarga (KK) (*)</label>
                                            <input class="form-control" type="file" id="kk" name="kk"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="ktp_ortu" class="form-label">KTP Orang Tua (*)</label>
                                            <input class="form-control" type="file" id="ktp_ortu" name="ktp_ortu"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="buku_nikah" class="form-label">Buku Nikah (*)</label>
                                            <input class="form-control" type="file" id="buku_nikah" name="buku_nikah"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="form_f201" class="form-label">Formulir F-2.01 (*)</label>
                                            <input class="form-control" type="file" id="form_f201" name="form_f201"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Privacy Agreement --}}
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="privacy" name="privacy" required>
                        <label class="form-check-label" for="privacy">
                            Saya menyetujui <a href="#">Kebijakan Privasi</a>
                        </label>
                    </div>

                    {{-- Submit Button --}}
                    <div class="d-grid">
                        <button type="submit"
                            class="btn btn-primary">{{ isset($pengajuan) ? 'Update Pengajuan' : 'Kirim Pengajuan' }}</button>
                    </div>
                </form>
                {{-- Form End --}}
            </div>
        </div>
    </div>
@endsection
