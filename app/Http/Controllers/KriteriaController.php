<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use CreateKriteriasTable;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    
    public function store(Request $request)
{
    $kriteria = new Kriteria();

    // Mengisi atribut kriteria dengan data dari request
    $kriteria->id_unit = $request->input('id_unit');
    $kriteria->unit = $request->input('unit');
    $kriteria->posisi = $request->input('posisi');
    $kriteria->timeline = $request->input('timeline'); 
    $kriteria->durasi = $request->input('durasi'); 
    $kriteria->tingkatan = $request->input('tingkatan');
    $kriteria->jenis_pendaftaran = $request->input('jenis_pendaftaran');
    
    // Ambil empat nilai jurusan yang dipilih
    $selectedJurusan = $request->input('jurusan');
    
    // Gabungkan empat nilai jurusan menjadi satu string, dipisahkan dengan koma
    $joinedJurusan = implode(', ', $selectedJurusan);
    
    // Simpan nilai yang digabungkan ke dalam atribut jurusan
    $kriteria->jurusan = $joinedJurusan;
    
    $kriteria->desk_pekerjaan = $request->input('desk_pekerjaan');
    
    // Simpan kriteria ke dalam database
    $kriteria->save();
    

    return redirect()->back()->with('success', 'Postingan berhasil dibuat');
}
}
