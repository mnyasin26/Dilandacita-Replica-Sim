<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanAktaKelahiran;
use App\Models\TPengajuan;
use App\Models\TSyaratAjuanLayanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\Debugbar\Facade as Debugbar;
use App\Helpers\BlockchainAktaLahirUtil;

class AktaLahirController extends Controller
{
    public function index()
    {
        // Menampilkan daftar pengajuan jika diperlukan
        // $pengajuans = TPengajuan::where('created_by', Auth::id())->get();
        // return view('akta_kelahiran.index', compact('pengajuans'));

        return view('submission_aktaLahir');

    }

    public function create()
    {
        $user = Auth::user();

        return view('submission_aktaLahir', compact('user'));

    }

    public function store(Request $request)
    {
        // // Validasi data input
        $validatedData = $request;
        Debugbar::info($request);


        //         "args": [
//     "AktaLahirFormID_1",
//     "John Doe",
//     "01-01-2024",
//     "08:00",
//     "Jakarta",
//     "Male",
//     "Father Name",
//     "Mother Name",
//     "Engineer",
//     "WNI",
//     "123 Main St, Jakarta",
//     "registrar1"
//   ]
        // // return $validatedData;
        // $applicationData = [
        //     "AktaLahirFormID_1",
        //     "John Doe",
        //     "01-01-2024",
        //     "08:00",
        //     "Jakarta",
        //     "Male",
        //     "Father Name",
        //     "Mother Name",
        //     "Engineer",
        //     "WNI",
        //     "123 Main St, Jakarta",
        //     "registrar1"
        // ];


        // // call static function of BlockchainAktaLahirUtil
        // $res = BlockchainAktaLahirUtil::submitApplication($applicationData);

        // return  $res;


        // $validatedData = $request->validate([
            //     // Validasi untuk TPengajuan
            //     'nomor_kk_pelapor' => 'required|digits:16',
            //     'nik_pelapor' => 'required|digits:16',
        //     'nama_lengkap_pelapor' => 'required|string|max:255',
        //     'telepon' => 'required|string|max:15',
        //     'email_pelapor' => 'required|email|max:255',

        //     // Validasi untuk PengajuanAktaKelahiran
        //     'nikanak' => 'required|digits:16',
        //     'nama_lengkap_anak' => 'required|string|max:255',
        //     'jenis_kelamin_anak' => 'required|in:L,P',
        //     'tempat_dilahirkan_anak' => 'required|string',
        //     'tempat_kelahiran_anak' => 'required|string|max:255',
        //     'hari_lahir' => 'required|string',
        //     'tanggal_kelahiran_anak' => 'required|date',
        //     'jam' => 'required',
        //     'jenis_kelahiran' => 'required|string',
        //     'kelahiran_ke' => 'required|integer',
        //     'penolong_kelahiran' => 'required|string',
        //     'berat' => 'required|numeric',
        //     'panjang' => 'required|numeric',
        //     'notes_masyarakat' => 'nullable|string',

        //     // // Validasi untuk file upload
        //     // 'skl' => 'required|file|mimes:jpeg,jpg,png|max:1024',
        //     // 'kk' => 'required|file|mimes:jpeg,jpg,png|max:1024',
        //     // 'ktp_ortu' => 'required|file|mimes:jpeg,jpg,png|max:1024',
        //     // 'buku_nikah' => 'required|file|mimes:jpeg,jpg,png|max:1024',
        //     // 'form_f201' => 'required|file|mimes:jpeg,jpg,png|max:1024',

        //     // Validasi Data Orang Tua
        //     'nik_ayah' => 'required|digits:16',
        //     'nama_ayah' => 'required|string|max:255',
        //     'tanggal_lahir_ayah' => 'required|date',
        //     'pekerjaan_ayah' => 'required|string|max:255',
        //     // ...additional validation rules for Ayah...
        //     'nik_ibu' => 'required|digits:16',
        //     'nama_ibu' => 'required|string|max:255',
        //     'tanggal_lahir_ibu' => 'required|date',
        //     'pekerjaan_ibu' => 'required|string|max:255',
        //     // ...additional validation rules for Ibu...

        //     // Validasi Data Saksi 1
        //     'nik_saksi1' => 'required|digits:16',
        //     'nama_saksi1' => 'required|string|max:255',
        //     // ...additional validation rules for Saksi 1...

        //     // Validasi Data Saksi 2
        //     'nik_saksi2' => 'required|digits:16',
        //     'nama_saksi2' => 'required|string|max:255',
        //     // ...additional validation rules for Saksi 2...
        // ]);
        // Debugbar::info("hello");
        // Debugbar::info($validatedData);


        // Membuat data pengajuan baru
        $pengajuan = TPengajuan::create([
            'layanan_id' => 1, // Sesuaikan dengan ID layanan akta kelahiran
            'nik' => $validatedData['nik_pelapor'],
            'nomor_kk' => $validatedData['nomor_kk_pelapor'],
            'nama_lgkp' => $validatedData['nama_lengkap_pelapor'],
            'telepon' => $validatedData['telepon'],
            'email' => $validatedData['email_pelapor'],
            'tgl_pengajuan' => now(),
            'status_pengajuan' => 'Diterima',
            'keterangan' => $validatedData['notes_masyarakat'] ?? null,
            'created_by' => Auth::id(),
        ]);

        // laki-laki = 1, perempuan = 2
        $jenisKelamin = 0;
        if ($validatedData['jenis_kelamin_anak'] == 'L') {
            $jenisKelamin = 1;
        } else {
            $jenisKelamin = 2;
        }

        // convert hari ke integer
        $hari = 0;
        if ($validatedData['hari_lahir'] == 'Senin') {
            $hari = 1;
        } elseif ($validatedData['hari_lahir'] == 'Selasa') {
            $hari = 2;
        } elseif ($validatedData['hari_lahir'] == 'Rabu') {
            $hari = 3;
        } elseif ($validatedData['hari_lahir'] == 'Kamis') {
            $hari = 4;
        } elseif ($validatedData['hari_lahir'] == 'Jumat') {
            $hari = 5;
        } elseif ($validatedData['hari_lahir'] == 'Sabtu') {
            $hari = 6;
        } elseif ($validatedData['hari_lahir'] == 'Minggu') {
            $hari = 7;
        }

        // convert jenis kelahiran ke integer
        $jenisKelahiran = 0;
        if ($validatedData['jenis_kelahiran'] == 'Tunggal') {
            $jenisKelahiran = 1;
        } elseif ($validatedData['jenis_kelahiran'] == 'Kembar') {
            $jenisKelahiran = 2;
        } elseif ($validatedData['jenis_kelahiran'] == 'Lainnya') {
            $jenisKelahiran = 3;
        }

        // convert penolong kelahiran ke integer
        $penolongKelahiran = 0;
        if ($validatedData['penolong_kelahiran'] == 'Dokter') {
            $penolongKelahiran = 1;
        } elseif ($validatedData['penolong_kelahiran'] == 'Bidan') {
            $penolongKelahiran = 2;
        } elseif ($validatedData['penolong_kelahiran'] == 'Dukun') {
            $penolongKelahiran = 3;
        } elseif ($validatedData['penolong_kelahiran'] == 'Lainnya') {
            $penolongKelahiran = 4;
        }

        // convert provinsi, kabkota, kecamatan, kelurahan ke integer
        $provinsi = 0;
        $kabkota = 0;
        $kecamatan = 0;
        $kelurahan = 0;

        if ($validatedData['provinsi'] == 'Jawa Barat') {
            $provinsi = 1;
        } elseif ($validatedData['provinsi'] == 'Jawa Tengah') {
            $provinsi = 2;
        } elseif ($validatedData['provinsi'] == 'Jawa Timur') {
            $provinsi = 3;
        } elseif ($validatedData['provinsi'] == 'DKI Jakarta') {
            $provinsi = 4;
        } elseif ($validatedData['provinsi'] == 'Banten') {
            $provinsi = 5;
        }

        if ($validatedData['kabkota'] == 'Cimahi') {
            $kabkota = 1;
        } elseif ($validatedData['kabkota'] == 'Bekasi') {
            $kabkota = 2;
        } elseif ($validatedData['kabkota'] == 'Bogor') {
            $kabkota = 3;
        } elseif ($validatedData['kabkota'] == 'Cirebon') {
            $kabkota = 4;
        } elseif ($validatedData['kabkota'] == 'Depok') {
            $kabkota = 5;
        }


        if ($validatedData['kecamatan'] == 'Cimahi Selatan') {
            $kecamatan = 1;
        } elseif ($validatedData['kecamatan'] == 'Cimahi Tengah') {
            $kecamatan = 2;
        } elseif ($validatedData['kecamatan'] == 'Cimahi Utara') {
            $kecamatan = 3;
        }


        if ($validatedData['kelurahan'] == 'Baros') {
            $kelurahan = 1;
        } elseif ($validatedData['kelurahan'] == 'Cigugur Tengah') {
            $kelurahan = 2;
        } elseif ($validatedData['kelurahan'] == 'Karangmekar') {
            $kelurahan = 3;
        } elseif ($validatedData['kelurahan'] == 'Setiamanah') {
            $kelurahan = 4;
        } elseif ($validatedData['kelurahan'] == 'Padasuka') {
            $kelurahan = 5;
        } elseif ($validatedData['kelurahan'] == 'Cimahi') {
            $kelurahan = 6;
        }

        $tempatDilahirkan = 0;
        if ($validatedData['tempat_dilahirkan_anak'] == 'RS') {
            $tempatDilahirkan = 1;
        } elseif ($validatedData['tempat_dilahirkan_anak'] == 'RB') {
            $tempatDilahirkan = 2;
        } elseif ($validatedData['tempat_dilahirkan_anak'] == 'PUSKESMAS') {
            $tempatDilahirkan = 3;
        } elseif ($validatedData['tempat_dilahirkan_anak'] == 'RUMAH') {
            $tempatDilahirkan = 4;
        } elseif ($validatedData['tempat_dilahirkan_anak'] == 'LAINNYA') {
            $tempatDilahirkan = 5;
        }

        // Membuat data detail akta kelahiran
        PengajuanAktaKelahiran::create([
            'provinsi' => $provinsi,
            'kabkota' => $kabkota,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,

            'pengajuan_id' => $pengajuan->id_pengajuan,
            'nik_anak' => $validatedData['nikanak'],
            'nama_lgkp_anak' => $validatedData['nama_lengkap_anak'],
            'jenis_kelamin_anak' => $jenisKelamin,
            'tempat_dilahirkan_anak' => $tempatDilahirkan,
            'tempat_kelahirkan_anak' => $validatedData['tempat_kelahiran_anak'],
            'hari' => $hari,
            'tgl_kelahiran_anak' => $validatedData['tanggal_kelahiran_anak'],
            'waktu_kelahiran' => $validatedData['jam'],
            'jenis_kelahiran' => $jenisKelahiran = 0,
            'kelahiran_ke' => $validatedData['kelahiran_ke'],
            'penolong_klhrn' => $penolongKelahiran,
            'berat_anak' => $validatedData['berat'],
            'panjang_anak' => $validatedData['panjang'],

            // Data Orang Tua
            'nik_ayah' => $validatedData['nik_ayah'],
            'nama_lgkp_ayah' => $validatedData['nama_ayah'],
            'tgl_lhr_ayah' => $validatedData['tanggal_lahir_ayah'],
            // 'pekerjaan_ayah' => $validatedData['pekerjaan_ayah'],
            // ...additional data for Ayah...
            'nik_ibu' => $validatedData['nik_ibu'],
            'nama_lgkp_ibu' => $validatedData['nama_ibu'],
            'tgl_lhr_ibu' => $validatedData['tanggal_lahir_ibu'],
            // 'pekerjaan_ibu' => $validatedData['pekerjaan_ibu'],
            // ...additional data for Ibu...

            // Data Saksi 1
            'nik_saksi_1' => $validatedData['nik_saksi1'],
            'nama_lgkp_saksi_1' => $validatedData['nama_saksi1'],
            // ...additional data for Saksi 1...

            // Data Saksi 2
            'nik_saksi_2' => $validatedData['nik_saksi2'],
            'nama_lgkp_saksi_2' => $validatedData['nama_saksi2'],
            // ...additional data for Saksi 2...
        ]);

//         "args": [
//     "AktaLahirFormID_1",
//     "John Doe",
//     "01-01-2024",
//     "08:00",
//     "Jakarta",
//     "Male",
//     "Father Name",
//     "Mother Name",
//     "Engineer",
//     "WNI",
//     "123 Main St, Jakarta",
//     "registrar1"
//   ]

        $applicationData = [
            (string) $pengajuan->id_pengajuan,
            (string) $validatedData['nama_lengkap_anak'],
            (string) $validatedData['tanggal_kelahiran_anak'],
            (string) $validatedData['jam'],
            (string) $validatedData['tempat_kelahiran_anak'],
            (string) ($jenisKelamin == 1 ? 'Laki-laki' : 'Perempuan'),
            (string) $validatedData['nama_ayah'],
            (string) $validatedData['nama_ibu'],
            '-',
            '-',
            '-',
            (string) $validatedData['nama_lengkap_pelapor'],
        ];


        // call static function of BlockchainAktaLahirUtil
        $res = BlockchainAktaLahirUtil::submitApplication($applicationData);

        // return  $res;


        // // Menangani upload file persyaratan
        // $syarat = new TSyaratAjuanLayanan();
        // $syarat->pengajuan_id = $pengajuan->id_pengajuan;
        // $syarat->nik = $validatedData['nikanak'];

        // if ($request->hasFile('skl')) {
        //     $syarat->img_1 = $request->file('skl')->store('uploads/skl', 'public');
        // }
        // if ($request->hasFile('kk')) {
        //     $syarat->img_2 = $request->file('kk')->store('uploads/kk', 'public');
        // }
        // if ($request->hasFile('ktp_ortu')) {
        //     $syarat->img_3 = $request->file('ktp_ortu')->store('uploads/ktp_ortu', 'public');
        // }
        // if ($request->hasFile('buku_nikah')) {
        //     $syarat->img_4 = $request->file('buku_nikah')->store('uploads/buku_nikah', 'public');
        // }

        // if ($request->hasFile('form_f201')) {
        //     $syarat->img_5 = $request->file('form_f201')->store('uploads/form_f201', 'public');
        // }

        // $syarat->save();

        return redirect()->route('dashboard')->with('success', 'Pengajuan akta kelahiran berhasil dibuat.');
    }

    public function edit($id)
    {
        $pengajuan = TPengajuan::findOrFail($id);

        // Ensure the logged-in user owns the submission
        if ($pengajuan->created_by != Auth::id()) {
            abort(403);
        }

        $pengajuanAkta = PengajuanAktaKelahiran::where('pengajuan_id', $id)->first();
        $user = Auth::user();

        // return json of pengajuanAkta and user and pengajuan
        // return response()->json([$pengajuanAkta, $user, $pengajuan]);

        return view('submission_aktaLahir', compact('pengajuan', 'pengajuanAkta', 'user'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = TPengajuan::findOrFail($id);

        // Ensure the logged-in user owns the submission
        if ($pengajuan->created_by != Auth::id()) {
            abort(403);
        }

        // Use input data directly without validation
        $validatedData = $request;

        // Update data in TPengajuan
        $pengajuan->update([
            'nik' => $validatedData['nik_pelapor'],
            'nomor_kk' => $validatedData['nomor_kk_pelapor'],
            'nama_lgkp' => $validatedData['nama_lengkap_pelapor'],
            'telepon' => $validatedData['telepon'],
            'email' => $validatedData['email_pelapor'],
            'keterangan' => $validatedData['notes_masyarakat'] ?? null,
        ]);

        // Determine values for specific fields
        $jenisKelamin = $validatedData['jenis_kelamin_anak'] == 'L' ? 1 : 2;

        $hariMap = [
            'Senin' => 1,
            'Selasa' => 2,
            'Rabu' => 3,
            'Kamis' => 4,
            'Jumat' => 5,
            'Sabtu' => 6,
            'Minggu' => 7
        ];
        $hari = $hariMap[$validatedData['hari_lahir']] ?? 0;

        $jenisKelahiranMap = [
            'Tunggal' => 1,
            'Kembar' => 2,
            'Lainnya' => 3
        ];
        $jenisKelahiran = $jenisKelahiranMap[$validatedData['jenis_kelahiran']] ?? 0;

        $penolongKelahiranMap = [
            'Dokter' => 1,
            'Bidan' => 2,
            'Dukun' => 3,
            'Lainnya' => 4
        ];
        $penolongKelahiran = $penolongKelahiranMap[$validatedData['penolong_kelahiran']] ?? 0;

        $tempatDilahirkanMap = [
            'RS' => 1,
            'RB' => 2,
            'PUSKESMAS' => 3,
            'RUMAH' => 4,
            'LAINNYA' => 5
        ];
        $tempatDilahirkan = $tempatDilahirkanMap[$validatedData['tempat_dilahirkan_anak']] ?? 0;

        // Update data in PengajuanAktaKelahiran
        $pengajuanAkta = PengajuanAktaKelahiran::where('pengajuan_id', $id)->first();
        $pengajuanAkta->update([
            'nik_anak' => $validatedData['nikanak'],
            'nama_lgkp_anak' => $validatedData['nama_lengkap_anak'],
            'jenis_kelamin_anak' => $jenisKelamin,
            'tempat_dilahirkan_anak' => $tempatDilahirkan,
            'tempat_kelahirkan_anak' => $validatedData['tempat_kelahiran_anak'],
            'hari' => $hari,
            'tgl_kelahiran_anak' => $validatedData['tanggal_kelahiran_anak'],
            'waktu_kelahiran' => $validatedData['jam'],
            'jenis_kelahiran' => $jenisKelahiran,
            'kelahiran_ke' => $validatedData['kelahiran_ke'],
            'penolong_klhrn' => $penolongKelahiran,
            'berat_anak' => $validatedData['berat'],
            'panjang_anak' => $validatedData['panjang'],
            // ...update additional fields as necessary...

            // Data Orang Tua
            'nik_ayah' => $validatedData['nik_ayah'],
            'nama_lgkp_ayah' => $validatedData['nama_ayah'],
            'tgl_lhr_ayah' => $validatedData['tanggal_lahir_ayah'],
            // 'pekerjaan_ayah' => $validatedData['pekerjaan_ayah'],
            // ...additional data for Ayah...
            'nik_ibu' => $validatedData['nik_ibu'],
            'nama_lgkp_ibu' => $validatedData['nama_ibu'],
            'tgl_lhr_ibu' => $validatedData['tanggal_lahir_ibu'],
            // 'pekerjaan_ibu' => $validatedData['pekerjaan_ibu'],
            // ...additional data for Ibu...

            // Data Saksi 1
            'nik_saksi_1' => $validatedData['nik_saksi1'],
            'nama_lgkp_saksi_1' => $validatedData['nama_saksi1'],
            // ...additional data for Saksi 1...

            // Data Saksi 2
            'nik_saksi_2' => $validatedData['nik_saksi2'],
            'nama_lgkp_saksi_2' => $validatedData['nama_saksi2'],
            // ...additional data for Saksi 2...
        ]);

        // Handle file uploads if needed
        // ...existing code...

        return redirect()->route('dashboard')->with('success', 'Pengajuan akta kelahiran berhasil diperbarui.');
    }
}
