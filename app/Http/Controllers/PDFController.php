<?php

namespace App\Http\Controllers;

use App\Models\DataInti;
use App\Models\LaporanAkhir;
use App\Models\Mandiri;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $user = auth()->user(); // Mengambil user yang sedang masuk
        
        // Mengambil semua laporan akhir yang sesuai dengan user yang sedang masuk
        $laporan_akhirs = LaporanAkhir::where('user_id', $user->id)
                                  ->whereNull('keterangan') // Filter hanya data dengan kolom "keterangan" null
                                  ->get();
        
        // Mengambil data_inti terbaru saja
        $latest_data_inti = DataInti::latest()->first();
    
        $data = [
            'title' => 'PUSAT PENGEMBANGAN SUMBER DAYA MANUSIA PENGAWASAN OBAT DAN MAKANAN', // Gabungkan baris judul menjadi satu baris
            'date' => date('m/d/Y'),
            'user' => $user,
            'laporan_akhirs' => $laporan_akhirs,
            'latest_data_inti' => $latest_data_inti // Mengirimkan data_inti terbaru saja
        ];
    
        $pdf = PDF::loadView('pdf.usersPdf', $data); // Periksa apakah tampilan PDF ('pdf.usersPdf') ada dan berfungsi dengan baik
        return $pdf->download('sertifikat.pdf');
    }
}
