<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    //
    public function loadDaftar()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('daftar');
    }

    public function daftar(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'nip' => 'string|nip|required|max:100|unique:pegawais',
            'password' =>'string|required|confirmed|min:6'
        ]);

        $pegawai = new Pegawai;
        $pegawai->name = $request->name;
        $pegawai->nip = $request->nip;
        $pegawai->password = Hash::make($request->password);
        $pegawai->save();

        return back()->with('success','Your Registration has been successfull.');
    }

    public function loadMasuk()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('masuk');
    }

    public function masuk(Request $request)
{
    $request->validate([
        'nip' => 'required',
        'password' => 'required',
        'g-recaptcha-response' => function ($attribute, $value, $fail) use ($request) {
            $secretKey = '6LeN3KspAAAAABPYjLoC9MpNF9kCwMYp3aE8dXeF';
            $response = $value;
            $userIP = $request->ip();
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";

            $response = Http::post($url);
            $body = $response->json();

            if (!$body['success']) {
                session()->flash('g-recaptcha-response', 'Mohon isi ReCaptcha');
                session()->flash('alert-class', 'alert-danger');
                $fail($attribute . ' Google reCaptcha failed');
            }
        },
    ]);

    $nip = $request->input('nip');
    $password = $request->input('password');

    $credentials = [
        'nip' => $nip,
        'password' => $password,
    ];

   // Mencari pegawai berdasarkan NIP
   $pegawai = Pegawai::where('nip', $credentials['nip'])->first();

   if ($pegawai && Hash::check($credentials['password'], $pegawai->password)) {
       // Jika autentikasi berhasil, atur id_unit pengguna
       $id_unit = $pegawai->pekerja->id_unit;

       // Set id_unit dalam sesi pengguna
       session(['id_unit' => $id_unit]);

       // Login menggunakan guard wab
       Auth::guard('wab')->loginUsingId($pegawai->nip);

       // Redirect ke halaman sesuai peran pengguna
       $route = $this->redirectDash();
       return redirect($route);
   } else {
       // Jika autentikasi gagal, kembali ke halaman masuk dengan pesan kesalahan
       return back()->with('error', 'NIP & Password salah');
   }
}
public function loadDashboard()
{
    // Mendapatkan pegawai yang sedang login
    $pegawai = Auth::guard('wab')->user(); 
    
    if ($pegawai) {
        // Jika pengguna adalah pegawai dan telah login
        
        // Mendapatkan unit kerja dari pegawai
        $pekerja = $pegawai->pekerja; 
        
        if ($pekerja) {
            // Jika unit kerja ditemukan
            
            // Mengambil data pegawai yang memiliki id_unit yang sama dengan unit kerja dari pegawai yang sedang login
            $dataPegawai = Pegawai::where('id_unit', $pekerja->id_unit)->get();
            
            return view('user.dashboard', ['dataPegawai' => $dataPegawai]);
        } else {
            // Jika unit kerja tidak ditemukan, mungkin terjadi kesalahan dalam konfigurasi relasi atau data
            return redirect()->back()->with('error', 'Data unit kerja tidak ditemukan.');
        }
    } else {
        // Jika pengguna tidak login, mungkin ada sesuatu yang salah dengan proses autentikasi
        return redirect()->back()->with('error', 'Anda harus login untuk mengakses halaman ini.');
    }
}


    public function redirectDash()
{
    $user = auth()->guard('wab')->user();
    
    if ($user && $user->role == 1) {
        $redirect = '/super-admin/dashboard';
    } elseif ($user && $user->role == 2) {
        // dd($user);
        $redirect = '/sub-admin/dashboard';
    } elseif ($user && $user->role == 3) {
        $redirect = '/admin/homepage';
    } else {
        $redirect = '/dashboard';
    }

    return $redirect;
}
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/pegawai');
    }
}
