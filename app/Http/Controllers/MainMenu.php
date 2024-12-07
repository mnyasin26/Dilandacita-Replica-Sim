<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\MLayanan;
use App\Models\TPengajuan;

class MainMenu extends Controller
{
    public function index()
    {
        return view('submission');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $pengajuans = $user->pengajuans()->with('m_layanan')->get();

        // Get layanan_id for 'AKTA KELAHIRAN'
        $aktaKelahiran = MLayanan::where('nama_layanan', 'aktaLahir')->first();

        if ($aktaKelahiran) {
            $aktaKelahiranCount = TPengajuan::where('layanan_id', $aktaKelahiran->id_layanan)
                ->whereDate('tgl_pengajuan', Carbon::today())
                ->count();
        } else {
            $aktaKelahiranCount = 0;
        }

        return view('dashboard', compact('pengajuans', 'aktaKelahiranCount'));
    }
}
