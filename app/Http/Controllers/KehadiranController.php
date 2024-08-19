<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use CreateKehadiranTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\LaporanAkhir;
use App\Models\Posting;
use App\Models\Mandiri;
use App\Models\User;
// use app\Models\User;

class KehadiranController extends Controller
{
    public function store(Request $request)
{
    $userId = Auth::id();
    $userName = Auth::user()->name;
    $currentDate = Carbon::now('Asia/Jakarta')->toDateString(); // Mendapatkan tanggal dengan zona waktu Jakarta
    $currentTime = Carbon::now('Asia/Jakarta')->format('H:i:s'); // Mendapatkan waktu dengan zona waktu Jakarta

    // $laporan = LaporanAkhir::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
    $posting = Posting::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
    $mandiri = Mandiri::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();

    // Periksa apakah waktu saat ini berada di luar rentang yang diizinkan (kurang dari jam 08.00 atau lebih dari jam 16.30)
    if (Carbon::parse($currentTime)->lt(Carbon::parse('08:00')) || Carbon::parse($currentTime)->gte(Carbon::parse('16:30'))) {
        return redirect()->back()->with('error', 'Anda hanya bisa mengisi absensi antara jam 8 pagi sampai jam 16:30 sore.');
    }

    // Periksa apakah pengguna sudah melakukan entri kehadiran pada tanggal yang sama
    $existingAttendance = Kehadiran::where('user_id', $userId)
                                    ->where('tanggal', $currentDate)
                                    ->exists();

    if ($existingAttendance) {
        return redirect()->back()->with('error', 'Anda sudah melakukan absensi kehadiran pada hari ini.');
    }

    $kehadiran = new Kehadiran();
    $kehadiran->user_id = $userId;
    $kehadiran->name = $userName;

    // Set properti 'unit' berdasarkan model 'Posting' atau 'Mandiri'
    if ($posting instanceof Posting) {
        $kehadiran->unit = $posting->unit;
        $kehadiran->tanggal = $currentDate;
        $kehadiran->presensi = $request->input('presensi');
        $kehadiran->jam_hadir = Carbon::now()->timezone('Asia/Jakarta')->format('H:i:s');
        $kehadiran->keterangan = $request->input('keterangan');
    } elseif ($mandiri instanceof Mandiri) {
        $kehadiran->unit = $mandiri->unit_kerja;
        $kehadiran->tanggal = $currentDate;
        $kehadiran->presensi = $request->input('presensi');
        $kehadiran->jam_hadir = Carbon::now()->timezone('Asia/Jakarta')->format('H:i:s');
        $kehadiran->keterangan = $request->input('keterangan');
    }

    // $kehadiran->tanggal = $currentDate;
    // $kehadiran->presensi = $request->input('presensi');
    // $kehadiran->jam_hadir = Carbon::now()->timezone('Asia/Jakarta')->format('H:i:s');
    // $kehadiran->keterangan = $request->input('keterangan');

    // Set nilai presentase kehadiran menjadi 1 jika hadir
    $presensi = $request->input('presensi');
    if ($presensi === 'Hadir' || $presensi === 'hadir') { // Periksa apakah presensi adalah 'Hadir' (atau 'hadir' untuk kasus insensitif huruf)
        $presentaseKehadiran = 1;
    } else {
        $presentaseKehadiran = 0;
    }

    // Tambahkan presentase kehadiran ke dalam objek Kehadiran
    $kehadiran->presentase_kehadiran = $presentaseKehadiran;

    $kehadiran->save();

    return redirect()->back()->with('success', 'Absensi berhasil');
}


    public function show($id)
    {
        $kehadiran = Kehadiran::find($id);
        $userName = $kehadiran->user->name;

        return response()->json(['username'=>$userName]);
    }

    public function hitungPresentaseKehadiran($userId) {
        $totalPertemuan = DB::table('kehadiran')
                            ->where('user_id', $userId)
                            ->count();
    
        $hadir = DB::table('kehadiran')
                    ->where('user_id', $userId)
                    ->where('presensi', 'Hadir')
                    ->count();
    
        $presentase = ($totalPertemuan > 0) ? ($hadir / $totalPertemuan) * 100 : 0;
    
        return $presentase;
    }
    

    // public function kehadiran()
    // {
    //     $users = User::get();
    //     $kehadiran = Kehadiran::get();

    //     $data = [
    //         'users' => $users,
    //         'kehadiran' => $kehadiran
    //     ];
    //     return view('/magang/absensi')->with('users', $users)->with('kehadiran', $kehadiran);
    // }
}
