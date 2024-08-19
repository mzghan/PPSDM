<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Kriteria;
use App\Models\LaporanAkhir;
use App\Models\Mandiri;
use App\Models\Wawancara;
use App\Models\Posting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CheckNotifications
{
    public function handle($request, Closure $next)
    {
        // Mendapatkan jumlah kriteria yang memiliki status "Pengajuan Baru"
        $newKriteriaCount = Kriteria::where('status', 'Diajukan')->count();

        // Mendapatkan jumlah laporan akhir yang memiliki status "Laporan Diterima" atau "sudah dikumpulkan"
        $newLaporanAkhirCount = LaporanAkhir::where('status_pengumpulan', 'Laporan Diterima')
            ->orWhere('status_pengumpulan', 'sudah dikumpulkan')
            ->count();

        // Mendapatkan jumlah entri yang memiliki status "Proccess" dari tabel Mandiri, Wawancara, dan Posting
        $newProccessCount = Mandiri::where('status', 'Proccess')->count() +
            Wawancara::where('status', 'Proccess')->count() +
            Posting::where('status', 'Proccess')->count();

        // Menghitung jumlah entri dengan status "Ditolak Unit" atau "Diterima Unit" dari tabel Mandiri, Wawancara, dan Posting
        $newSeleksiCount = Mandiri::whereIn('status', ['Ditolak Unit', 'Diterima Unit'])->count() +
            Wawancara::whereIn('status', ['Ditolak Unit', 'Diterima Unit'])->count() +
            Posting::whereIn('status', ['Ditolak Unit', 'Diterima Unit'])->count();
        // Unit Kerja
        // Menghitung jumlah laporan akhir yang belum dinilai
        $newLaporanCount = LaporanAkhir::where('status_penilaian', 'belum dinilai')->count();

        // Menghitung jumlah entri yang memerlukan seleksi
        $newSeleksiUnitCount = Kriteria::whereNotIn('status', ['Pengajuan Ditolak'])->count() +
            Mandiri::whereIn('status', ['Diteruskan ke Unit', 'Perubahan Tanggal', 'Perubahan Diterima'])->count() +
            Wawancara::whereIn('status', ['Diteruskan ke Unit', 'Perubahan Tanggal', 'Perubahan Diterima'])->count();

        // Peserta
        // Periksa apakah pengguna sudah masuk
        if (Auth::check()) {
            // Hitung notifikasi untuk Posting
            $newPostingCount = Posting::where('user_id', auth()->user()->id)
                ->whereIn('status', [
                    'Proccess',
                    'Diteruskan ke Unit',
                    'Diterima Unit',
                    'Ditolak Unit',
                    'Ditolak tahap 2',
                    'Lolos seleksi Magang',
                    'Perubahan Tanggal',
                    'diterima',
                    'Ditolak tahap 1',
                    'Peserta mengundurkan diri',
                    'Peserta Magang Aktif'
                ])->count();

            // Hitung notifikasi untuk Mandiri
            $newMandiriCount = Mandiri::where('user_id', auth()->user()->id)
                ->whereIn('status', [
                    'Proccess',
                    'Diteruskan ke Unit',
                    'Diterima Unit',
                    'Ditolak Unit',
                    'Ditolak tahap 2',
                    'Lolos seleksi Magang',
                    'Perubahan Tanggal',
                    'diterima',
                    'Ditolak tahap 1',
                    'Peserta mengundurkan diri',
                    'Peserta Magang Aktif'
                ])->count();

            // Hitung notifikasi untuk Wawancara
            $newWawancaraCount = Wawancara::where('user_id', auth()->user()->id)
                ->whereIn('status', [
                    'Proccess',
                    'Diteruskan ke Unit',
                    'Diterima Unit',
                    'Ditolak Unit',
                    'Ditolak tahap 2',
                    'Lolos seleksi Magang',
                    'Perubahan Tanggal',
                    'diterima',
                    'Ditolak tahap 1',
                    'Peserta mengundurkan diri',
                    'Peserta Magang Aktif'
                ])->count();

            // Simpan notifikasi untuk Peserta ke dalam session
            Session::put('newPostingCount_' . auth()->user()->id, $newPostingCount);
            Session::put('newMandiriCount_' . auth()->user()->id, $newMandiriCount);
            Session::put('newWawancaraCount_' . auth()->user()->id, $newWawancaraCount);
        }

        // Admin
        // Simpan notifikasi ke dalam session
        Session::put('newKriteriaCount', $newKriteriaCount);
        Session::put('newLaporanAkhirCount', $newLaporanAkhirCount);
        Session::put('newProccessCount', $newProccessCount);
        Session::put('newSeleksiCount', $newSeleksiCount);
        // Unit Kerja
        Session::put('newSeleksiUnitCount', $newSeleksiUnitCount);
        Session::put('newLaporanCount', $newLaporanCount);
        // Peserta

        return $next($request);
    }
}