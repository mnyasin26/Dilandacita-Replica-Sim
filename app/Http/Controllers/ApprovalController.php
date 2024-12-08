<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TPengajuan;
use App\Models\MLayanan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Helpers\BlockchainAktaLahirUtil;
use App\Models\MUser;


class ApprovalController extends Controller
{
    public function index()
    {
        $pengajuans = TPengajuan::with('m_layanan')
            ->where('status_pengajuan', 'Diverifikasi')
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


        return view('admin.approve', compact('pengajuans', 'aktaKelahiranCount'));
        // return view('admin.approve');
    }

    public function approve($id)
    {
        $pengajuan = TPengajuan::findOrFail($id);

        // Ensure the logged-in user owns the submission
        // if ($pengajuan->verified_by != Auth::id()) {
        //     abort(403);
        // }
        $userApprove = MUser::where('id_user', Auth::id())->first();
        $userApproveName = $userApprove->name;
        // return $userApproveName;

        // return $res;
        $res = BlockchainAktaLahirUtil::approveApplication($pengajuan->id_pengajuan, $userApproveName);

        $pengajuan->status_pengajuan = 'Disetujui';
        $pengajuan->process_timestamp = Carbon::now();
        $pengajuan->process_by = Auth::id();
        $pengajuan->save();

        return redirect()->route('persetujuan')->with('success', 'Pengajuan berhasil disetujui');
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
