<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Session;



class SesiController extends Controller
{
    public function homepage()
    {
        return view('admin.homepage');
    }
    public function administrator()
    {
        return view('admin.administrator');
    }
    public function mandiri()
    {
        return view('admin.mandiri');
    }
    public function penelitian()
    {
        return view('admin.penelitian');
    }
    public function pilihan()
    {
        return view('admin.pilihan');
    }
    public function posting()
    {
        return view('admin.posting');
    }
    public function verifikasi()
    {
        return view('admin.verifikasi');
    }
    public function laporan()
    {
        return view('unit.laporan');
    }
    public function kualifikasi()
    {
        return view('admin.kualifikasi');
    }
    function index(){
        return view("sesi.index");
    }
    public function indexuk()
    {
        return view("unit.indexuk");
    }
    function base(){
        return view("unit.indexuk");
    }
    function login(Request $request)
    {
        Session::flash("nip",$request->nip);
        $request->validate([
            "nip"=> "required",
            "password"=> "required",
        ],[
            "nip.required"=> "Nip wajib diisi",
            "password.required"=> "Password wajib diisi",
        ]);

        $infokanlogin = [
            "nip"=> $request->nip,
            "password"=> $request->password,
        ];

        if(Auth::attempt($infokanlogin)){
            //kalau autentikasi sukses
            return redirect('/admin/homepage')->with('success','Berhasil Login');
        }else{
            //kalau autentikasi gagal
            return redirect('sesi')->withErrors('Username dan Password yang dimasukkan salah');       }
    }

    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil Logout');
    }
}
