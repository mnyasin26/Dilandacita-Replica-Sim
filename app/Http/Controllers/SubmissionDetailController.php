<?php

namespace App\Http\Controllers;


use App\Models\PengajuanAktaKelahiran;
use App\Models\TPengajuan;
use Illuminate\Support\Facades\Auth;
use App\Helpers\BlockchainAktaLahirUtil;
use App\Models\MUser;


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
        // if ($pengajuan->created_by != Auth::id()) {
        //     abort(403);
        // }

        $pengajuanAkta = PengajuanAktaKelahiran::where('pengajuan_id', $id)->first();
        $user = Auth::user();

        // get the current state of the submission
        $currentState = BlockchainAktaLahirUtil::queryCurrentState($pengajuan->id_pengajuan);
        // return $currentState;

        $history = BlockchainAktaLahirUtil::queryHistory($pengajuan->id_pengajuan);
        $history = $history['response']['history'];
        // return $history;

        $idUser = 0;
        foreach ($history as $key => $value) {
            // return $value;
            if (isset($value['value']['application']['modifiedBy'])){
                $idUser = $value['value']['application']['modifiedBy'];
                $userName = MUser::where('id_user', $idUser)->first();
                // return $userName["name"];
                $history[$key]['value']['application']['modifiedBy'] = $userName["name"];
            }
        }





        // return $user;

        // return json of pengajuanAkta and user and pengajuan
        // return response()->json([$pengajuanAkta, $user, $pengajuan]);

        return view('submission_status_detail', compact('pengajuan', 'pengajuanAkta', 'user', 'currentState', 'history'));
    }
}
