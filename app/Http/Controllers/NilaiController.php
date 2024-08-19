<?php

namespace App\Http\Controllers;

use App\Models\LaporanAkhir;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NilaiController extends Controller
{
    public function store(Request $request)
{
    // Validasi data sesuai form mana yang dikirimkan
    $request->validate([
        'nilai_rata_rata' => 'required|numeric',
        'hasil_nilai' => 'required|string',
        'kesan' => 'required|string',
        'saran' => 'required|string',
        // tambahkan validasi lainnya sesuai kebutuhan
    ]);

    try {
        // Ambil laporan akhir yang sesuai
        $laporan_akhir = LaporanAkhir::findOrFail($request->laporan_akhir_id);

        // Buat instance Nilai
        $nilai = new Nilai();
        $nilai->laporan_akhir_id = $laporan_akhir->id;
        $nilai->nilai_rata_rata = $request->nilai_rata_rata;
        $nilai->hasil_nilai = $request->hasil_nilai;
        $nilai->kesan = $request->kesan;
        $nilai->saran = $request->saran;
        $nilai->save();

        // Redirect dengan pesan sukses kepada pengguna
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    } catch (\Exception $e) {
        // Redirect dengan pesan error jika terjadi kesalahan saat menyimpan data
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

}
