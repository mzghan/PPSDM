<?php

namespace App\Exports;

use App\Models\Posting;
use App\Models\Mandiri;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PesertaExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        // Mengambil data dari model Posting
        $posting = Posting::select(
            'name', 'email', 'phone', 'nik', 'nim', 'tingkatan', 'posisi',
            'universitas_sekolah', 'jurusan', 'unit', 'durasi',
            'tujuan_magang', 'ilmu_yang_dicari', 'output_setelah_magang',
            'jenis', 'status', 'keterangan', DB::raw("'Posting' as sumber")
        )->get();
    
        // Mengambil data dari model Mandiri
        $mandiri = Mandiri::select(
            'name', 'email', 'phone', 'nik', 'nim', 'tingkatan',
            DB::raw("'' as posisi"), // Menambahkan kolom posisi yang kosong untuk model Mandiri
            'universitas_sekolah', 'jurusan', 'unit_kerja', 'durasi',
            'tujuan_magang', 'ilmu_yang_dicari', 'output_setelah_magang',
            'jenis', 'status', 'keterangan', DB::raw("'Mandiri' as sumber")
        )->get();
    
        // Menggabungkan kedua koleksi data
        return $posting->concat($mandiri);
    }

    public function headings(): array
    {
        // Tentukan heading untuk model Posting
        $headingPosting = [
            'Nama', 'Email', 'Nomor Telepon', 'NIK', 'NIM', 'Tingkatan', 'Posisi',
            'Universitas/Sekolah', 'Jurusan', 'Unit Kerja', 'Durasi', 'Tujuan Magang',
            'Ilmu yang Dicari', 'Output Setelah Magang', 'Jenis', 'Status', 'Keterangan', 'Sumber'
        ];
    
        // Tentukan heading untuk model Mandiri
        $headingMandiri = [
            'Nama', 'Email', 'Nomor Telepon', 'NIK', 'NIM', 'Tingkatan',
            'Universitas/Sekolah', 'Jurusan', 'Unit Kerja', 'Durasi', 'Tujuan Magang',
            'Ilmu yang Dicari', 'Output Setelah Magang', 'Jenis', 'Status', 'Keterangan', 'Sumber'
        ];
    
        // Jika Anda ingin memisahkan heading sesuai dengan modelnya, gunakan kondisi berikut:
        // Periksa jika heading yang diinginkan adalah untuk model Posting atau Mandiri
        if ($this->isForPostingExport()) {
            return $headingPosting;
        } else {
            return $headingMandiri;
        }
    }
    
    // Method ini digunakan untuk menentukan apakah heading yang diinginkan adalah untuk model Posting atau Mandiri
    private function isForPostingExport(): bool
    {
        // Tentukan logika untuk menentukan apakah heading yang diinginkan adalah untuk model Posting
        // Misalnya, Anda dapat menambahkan logika berdasarkan kondisi tertentu
        // Jika heading untuk model Posting, kembalikan true
        // Jika heading untuk model Mandiri, kembalikan false
        return true;
    }
    
}