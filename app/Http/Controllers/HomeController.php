<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Prodi;
use Carbon\Carbon;
use App\Models\Tingkat;
use Illuminate\Support\Facades\DB;
use App\Models\Kriteria;
use App\Charts\GrafikPOMChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


public function index()
{
    // Ambil semua kriteria
    $allKriterias = Kriteria::all();
    
    // Pisahkan kriteria yang statusnya 'Pengajuan Diterima'
    $kriterias = Kriteria::whereIn('status', ['Pengajuan Diterima'])->get();

    // Inisialisasi array untuk menyimpan kriteria yang masih dibuka
    $kriteriasDibuka = [];

    // Tambahkan logika untuk menentukan apakah lowongan masih dibuka atau tidak
    foreach ($kriterias as $kriteria) {
        // Pisahkan tanggal mulai dan tanggal selesai
        list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $kriteria->timeline);

        // Konversi tanggal mulai dan selesai ke objek Carbon
        $carbon_tanggal_mulai = Carbon::createFromFormat('m/d/Y', $tanggal_mulai);
        $carbon_tanggal_selesai = Carbon::createFromFormat('m/d/Y', $tanggal_selesai);

        // Periksa apakah tanggal sekarang berada dalam rentang tanggal
        $today = Carbon::now();
        if ($today->between($carbon_tanggal_mulai, $carbon_tanggal_selesai)) {
            // Jika masih dalam rentang tanggal, tambahkan kriteria ke array kriteria yang masih dibuka
            $kriteria->isDibuka = true;
            $kriteriasDibuka[] = $kriteria;
        }
    }

    // Kirim data kriteria yang masih dibuka ke view
    $data = [
        'kriterias' => $kriteriasDibuka, // Mengirim data kriteria yang masih dibuka
    ];
    
    // Membuat instance GrafikPOMChart
    $grafikPOMChart = new GrafikPOMChart();
    $chart = $grafikPOMChart->build();
    
    // Menambahkan data chart ke dalam data yang akan dikirimkan ke view
    $data['chart'] = $chart;

    return view('home', $data);
}

    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => function ($attribute, $value, $fail) use ($request) {
                $secretKey = '6LeTvFspAAAAAJk2K9KP3JZRyhZxuuw30BcjOw_1';
                $response = $value;
                $userIP = $request->ip();
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
        
                $response = \file_get_contents($url);
                $response = json_decode($response);
        
                if (!$response->success) {
                    session()->flash('g-recaptcha-response', 'Mohon isi ReCaptcha');
                    session()->flash('alert-class', 'alert-danger');
                    $fail($attribute . ' Google reCaptcha failed');
                }
            },
        ]);
    }
}
