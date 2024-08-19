<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Role;

class SuperAdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('super-admin.dashboard');
    }

    public function users()
    {
        $pegawais = Pegawai::with('roles')->where('role','!=',1)->get();
        return view('super-admin.users', compact('users'));
    }

    public function manageRole()
    {
        $pegawais = Pegawai::where('role','!=',1)->get();
        $roles = Role::all();
        return view('super-admin.manage-role', compact(['users','roles']));
    }

    public function updateRole(Request $request)
    {
        Pegawai::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back();
    }

}
