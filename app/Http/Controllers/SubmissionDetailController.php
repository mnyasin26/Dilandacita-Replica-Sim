<?php

namespace App\Http\Controllers;


use App\Models\PengajuanAktaKelahiran;
use App\Models\TPengajuan;
use Illuminate\Support\Facades\Auth;
use App\Helpers\BlockchainAktaLahirUtil;


use Illuminate\Http\Request;

class SubmissionDetailController extends Controller
{
    public function index()
    {
        return view('submission_status_detail');
    }

    public function detail($id)
    {
        $pengajuan = TPengajuan::findOrFail($id);

        // Ensure the logged-in user owns the submission
        if ($pengajuan->created_by != Auth::id()) {
            abort(403);
        }

        $pengajuanAkta = PengajuanAktaKelahiran::where('pengajuan_id', $id)->first();
        $user = Auth::user();

        // get the current state of the submission
        $currentState = BlockchainAktaLahirUtil::queryCurrentState($pengajuan->id_pengajuan);
        // return $currentState;

        $history = BlockchainAktaLahirUtil::queryHistory($pengajuan->id_pengajuan);
        return $history;


        // return $user;

        // return json of pengajuanAkta and user and pengajuan
        // return response()->json([$pengajuanAkta, $user, $pengajuan]);

        return view('submission_status_detail', compact('pengajuan', 'pengajuanAkta', 'user'));
    }
}
