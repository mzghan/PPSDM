<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mandiri;
use App\Models\Wawancara;
use App\Models\Posting;

class PostingController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Mendapatkan data pengguna yang terautentikasi
            $userId = Auth::id();
            $userName = Auth::user()->name;
            $userEmail = Auth::user()->email;
            $userPhone = Auth::user()->phone;

            // Validasi data yang dikirimkan dari formulir
            $request->validate([
                // Tambahkan aturan validasi untuk setiap kolom formulir di sini
            ]);

            // Mendapatkan status terbaru dari user_id
            $latestStatus = collect([
                Mandiri::where('user_id', $userId)->latest('created_at')->first(),
                Wawancara::where('user_id', $userId)->latest('created_at')->first(),
                Posting::where('user_id', $userId)->latest('created_at')->first(),
            ])->filter()->sortByDesc('created_at')->first();

            // Jika status terbaru adalah "Ditolak tahap 1" atau "Ditolak tahap 2", izinkan pengguna untuk mendaftar lagi
            if ($latestStatus && in_array($latestStatus->status, ['Peserta selesai magang', 'Peserta mengundurkan diri', 'Mengundurkan diri', 'mengundurkan diri', 'Ditolak Unit', 'Ditolak tahap 1', 'Ditolak tahap 2'])) {
                // Izinkan pendaftaran
            }

            // Cek apakah user sudah mendaftar pada jenis lain dan status terbaru bukan "Ditolak tahap 1" atau "Ditolak tahap 2"
            $userAlreadyRegistered = Mandiri::where('user_id', $userId)->exists() ||
                Wawancara::where('user_id', $userId)->exists() ||
                Posting::where('user_id', $userId)->exists();

            // Jika user sudah mendaftar dan status terbaru bukan "Ditolak tahap 1" atau "Ditolak tahap 2", kembalikan pesan kesalahan
            if ($userAlreadyRegistered && !in_array($latestStatus->status, ['Peserta selesai magang', 'Peserta mengundurkan diri', 'Mengundurkan diri', 'mengundurkan diri', 'Ditolak Unit', 'Ditolak tahap 1', 'Ditolak tahap 2'])) {
                return redirect()->back()->with('error', 'Maaf, Anda sudah dalam proses pendaftaran. Silahkan periksa hasil pendaftaran Anda.');
            }

            $posting = new Posting();
            $posting->user_id = $userId;
            $posting->name = $userName;
            $posting->email = $userEmail;
            $posting->phone = $userPhone;
            $posting->posisi = $request->input('posisi');
            $posting->unit = $request->input('unit');
            $posting->nik = $request->input('nik');
            $posting->nim = $request->input('nim');
            $posting->universitas_sekolah = $request->input('instansi');
            // $posting->alamat_universitas_sekolah = $request->input('alamat_universitas_sekolah');
            $posting->tingkatan = $request->input('tingkatan');
            $posting->jurusan = $request->input('jurusan');
            // $posting->timeline = $request->input('timeline');  
            $posting->durasi = $request->input('durasi');   
            $posting->tujuan_magang = $request->input('tujuan_magang');
            $posting->ilmu_yang_dicari = $request->input('ilmu_yang_dicari');
            $posting->output_setelah_magang = $request->input('output_setelah_magang');
            $proposal = $request->file('proposal');
            $proposalName = uniqid() . '.' . $proposal->getClientOriginalExtension();
            $proposal->move(public_path('assets'), $proposalName);
            $posting->proposal = $proposalName;

            $suratPendukung = $request->file('surat_pendukung');
            $suratPendukungName = uniqid() . '.' . $suratPendukung->getClientOriginalExtension();
            $suratPendukung->move(public_path('assets'), $suratPendukungName);
            $posting->surat_pendukung = $suratPendukungName;
            $posting->jenis = $request->input('jenis');

            $posting->save();

            return redirect()->back()->with('success', 'Pendaftaran Posting berhasil');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Silahkan coba lagi.');
        }
    }
    public function show($id)
    {
        $posting = Posting::find($id);

        // Periksa apakah posting ditemukan
        if (!$posting) {
            abort(404); // Jika tidak ditemukan, tampilkan halaman 404
        }

        $userName = $posting->user->name;
        $userEmail = $posting->user->email;
        $userPhone = $posting->user->phone;

        return response()->json(['userName' => $userName, 'userEmail' => $userEmail, 'userPhone' => $userPhone]);
    }

}
