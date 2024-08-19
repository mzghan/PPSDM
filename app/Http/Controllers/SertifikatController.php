<?php

namespace App\Http\Controllers;


use App\Models\Sertifikat;
use CreateSertifikatTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SertifikatController extends Controller
{
    public function store(Request $request)
    {
        $userId = Auth::id();
        $userName = Auth::user()->name;

        $sertifikat = new Sertifikat();
        $sertifikat->user_id = $userId;
        $sertifikat->name = $userName;
        $sertifikat->nim = $request->input('nim');
        $sertifikat->jurusan = $request->input('jurusan');
        $sertifikat->unit_kerja = $request->input('unit_kerja');
        $sertifikat->waktu_mulai = $request->input('waktu_mulai');
        $sertifikat->waktu_selesai = $request->input('waktu_selesai');
        $sertifikat->unit_kerja = $request->input('unit_kerja');
        $sertifikat->waktu_mulai = $request->input('waktu_mulai');
        $sertifikat->waktu_selesai = $request->input('waktu_selesai');
        $sertifikat->nilai = $request->input('unit');
        $sertifikat->nosertif = $request->input('nosertif');
        $sertifikat->kepala = $request->input('kepala');
        $sertifikat->nip = $request->input('nip');
        
        $sertifikat->save();

        return redirect()->back()->with('success', 'Sertifikat berhasil dibuat');
    }

    public function show($id)
    {
        $sertifikat = Sertifikat::find($id);
        $userName = $sertifikat->user->name;

        return response()->json(['userName'=>$userName]);
    }
}   