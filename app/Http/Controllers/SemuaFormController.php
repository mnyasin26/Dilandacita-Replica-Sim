<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TPengajuan;
use App\Models\MLayanan;
use Carbon\Carbon;


class SemuaFormController extends Controller
{
    public function index()
    {
        $pengajuans = TPengajuan::with('m_layanan')->get();

        // Get layanan_id for 'AKTA KELAHIRAN'
        $aktaKelahiran = MLayanan::where('nama_layanan', 'aktaLahir')->first();

        if ($aktaKelahiran) {
            $aktaKelahiranCount = TPengajuan::where('layanan_id', $aktaKelahiran->id_layanan)
                ->whereDate('tgl_pengajuan', Carbon::today())
                ->count();
        } else {
            $aktaKelahiranCount = 0;
        }

        // return $pengajuans;  


        return view('admin.semua_form', compact('pengajuans', 'aktaKelahiranCount'));
        // return view('admin.semua_form');
    }
}
