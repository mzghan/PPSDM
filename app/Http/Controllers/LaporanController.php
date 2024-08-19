<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Models\LaporanAkhir;
use App\Models\Mandiri;
use App\Models\Wawancara;
use App\Models\Posting;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function submit(Request $request)
    {
        // Validasi data jika diperlukan
        $request->validate([
            // Tentukan aturan validasi sesuai kebutuhan
        ]);
    
        // Ambil data posting terbaru
        $posting = Posting::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        $mandiri = Mandiri::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        $wawancara = Wawancara::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
    
        // Buat objek laporan akhir baru
        $laporan = new LaporanAkhir();
        $laporan->user_id = Auth::id();
        $laporan->name = Auth::user()->name;
        $laporan->email = Auth::user()->email;
        $laporan->phone = Auth::user()->phone;
    
        // Tentukan atribut berdasarkan sumber data
        if ($posting instanceof Posting) {
            // Jika data berasal dari tabel Posting
            $laporan->unit = $posting->unit;
            $laporan->nik = $posting->nik;
            $laporan->nim = $posting->nim;
            $laporan->jurusan = $posting->jurusan;
            $laporan->tingkatan = $posting->tingkatan;
            $laporan->posisi = $posting->posisi;
            $laporan->universitas_sekolah = $posting->universitas_sekolah;
            $laporan->durasi = $posting->durasi;
            $laporan->pegawai = $posting->pegawai;
        } elseif ($mandiri instanceof Mandiri) {
            // Jika data berasal dari tabel Mandiri
            $laporan->unit = $mandiri->unit_kerja;
            $laporan->nik = $mandiri->nik;
            $laporan->nim = $mandiri->nim;
            $laporan->jurusan = $mandiri->jurusan;
            $laporan->tingkatan = $mandiri->tingkatan;
            $laporan->posisi = $mandiri->jurusan;
            $laporan->universitas_sekolah = $mandiri->universitas_sekolah;
            $laporan->durasi = $mandiri->durasi;
            $laporan->pegawai = $mandiri->pegawai;
        } elseif ($wawancara instanceof Wawancara) {
            // Jika data berasal dari tabel Wawancara
            $laporan->unit = $wawancara->unit_kerja;
            $laporan->nik = $wawancara->nik;
            $laporan->nim = $wawancara->nim;
            $laporan->jurusan = $wawancara->jurusan;
            $laporan->tingkatan = $wawancara->tingkatan;
            $laporan->posisi = $wawancara->jurusan;
            $laporan->universitas_sekolah = $wawancara->universitas_sekolah;
            $laporan->durasi = $wawancara->tanggal;
        }
    
        $laporan->status_pengumpulan = 'sudah dikumpulkan'; // Sesuaikan dengan kebutuhan Anda
        $laporan->status_penilaian = 'belum dinilai'; // Sesuaikan dengan kebutuhan Anda
        $laporan->terakhir_diubah = now(); // Tambahkan waktu sekarang
    
        // Mengelola file laporan jika diunggah
        if ($request->hasFile('pengumpulan_laporan')) {
            $file = $request->file('pengumpulan_laporan');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets'), $fileName);
            $laporan->pengumpulan_laporan = $fileName;
        }
    
        $laporan->save();
    
        // Redirect atau tampilkan pesan sukses kepada pengguna
        return redirect()->back()->with('success', 'Laporan berhasil disubmit!');
    }
// Metode untuk admin memberikan nilai kepada peserta
public function store(Request $request)
{
    // Validasi data
    $request->validate([
        'nilai_rata_rata' => 'required|numeric',
        'hasil_nilai' => 'required|string',
        'kesan' => 'required|string',
        'saran' => 'required|string',
    ]);

    // Ambil data laporan_akhir
    $laporan_akhir = LaporanAkhir::where('user_id', $request->user_id)->first();

    if (!$laporan_akhir) {
        return redirect()->back()->with('error', 'Data laporan akhir tidak ditemukan!');
    }

    // Isi data berdasarkan form yang dikirimkan
    $laporan_akhir->fill($request->only('nilai_rata_rata', 'hasil_nilai', 'kesan', 'saran'));

    try {
        $laporan_akhir->terakhir_diubah = now();
        $laporan_akhir->save();
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}
}
