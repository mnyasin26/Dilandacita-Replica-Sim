<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MUser;
use App\Models\MRole;
use App\Models\MKategoriUser;

class UserController extends Controller
{
    public function index()
    {
        $user = MUser::with(['m_role', 'm_kategori_user'])->find(1); // Assuming user ID is 1
        $roles = MRole::all();
        $kategoris = MKategoriUser::all();
        return view('dataUser', compact('user', 'roles', 'kategoris'));
    }

    public function updateRole(Request $request, $id)
    {
        $user = MUser::find($id);
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->back()->with('success', 'Role updated successfully');
    }

    public function updateKategori(Request $request, $id)
    {
        $user = MUser::find($id);
        $user->kategori_user_id = $request->kategori_user_id;
        $user->save();
        return redirect()->back()->with('success', 'Kategori updated successfully');
    }

    public function updateTelepon(Request $request, $id)
    {
        $user = MUser::find($id);
        $user->telepon = $request->telepon;
        $user->save();
        return redirect()->back()->with('success', 'Telepon updated successfully');
    }

    public function updateEmail(Request $request, $id)
    {
        $user = MUser::find($id);
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Email updated successfully');
    }
}
