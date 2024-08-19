<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Exports\PesertaExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportPegawai()
    {
        return Excel::download(new UsersExport, 'pegawai.xlsx');
    }
    public function exportPeserta()
    {
        return Excel::download(new PesertaExport, 'peserta.xlsx');
    }
}
