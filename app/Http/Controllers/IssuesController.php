<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TPengajuan;
use App\Models\MLayanan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Helpers\BlockchainAktaLahirUtil;
use App\Models\MUser;



class IssuesController extends Controller
{
    public function index()
    {
        $pengajuans = TPengajuan::with('m_layanan')
            ->where('status_pengajuan', 'Disetujui')
            ->get();

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


        return view('admin.penerbitan', compact('pengajuans', 'aktaKelahiranCount'));
    }

    public function issue($id)
    {
        $pengajuan = TPengajuan::findOrFail($id);

        // Ensure the logged-in user owns the submission
        // if ($pengajuan->verified_by != Auth::id()) {
        //     abort(403);
        // }

        $userIssue = MUser::where('id_user', Auth::id())->first();
        $userIssueName = $userIssue->name;

        $res = BlockchainAktaLahirUtil::issueApplication($pengajuan->id_pengajuan, $userIssueName);

        $pengajuan->status_pengajuan = 'Diterbitkan';
        $pengajuan->done_timestamp = Carbon::now();
        $pengajuan->done_by = Auth::id();
        $pengajuan->save();

        return redirect()->route('penerbitan')->with('success', 'Pengajuan berhasil diterbitkan');
    }

    public function reject($id)
    {
        $pengajuan = TPengajuan::findOrFail($id);

        // Ensure the logged-in user owns the submission
        // if ($pengajuan->verified_by != Auth::id()) {
        //     abort(403);
        // }

        $userReject = MUser::where('id_user', Auth::id())->first();
        $userRejectName = $userReject->name;

        $res = BlockchainAktaLahirUtil::rejectApplication($pengajuan->id_pengajuan, $userRejectName);

        $pengajuan->status_pengajuan = 'Ditolak';
        $pengajuan->rejected_timestamp = Carbon::now();
        $pengajuan->rejected_by = Auth::id();
        $pengajuan->save();

        return redirect()->route('penerbitan')->with('success', 'Pengajuan berhasil ditolak');
    }
}
