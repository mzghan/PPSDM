<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Pekerja;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:pegawais,nip',
            'role' => 'required',
            'password' => 'required',
            'unit' => 'required',
            'unit_id' => 'required',
        ]);
    
        // Periksa apakah NIP sudah ada
        $existingPegawai = Pegawai::where('nip', $request->nip)->first();
    
        if ($existingPegawai) {
            return redirect()->back()->with('error', 'NIP sudah digunakan. Silakan gunakan NIP yang berbeda.');
        }
    
        // Memulai transaksi database
        DB::beginTransaction();
    
        try {
            // Simpan data ke tabel pegawais
            DB::table("pegawais")->insert([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
    
            // Simpan data ke tabel pekerja
            DB::table("pekerja")->insert([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'unit' => $request->unit,
                'id_unit' => $request->unit_id,
            ]);
    
            // Commit transaksi jika tidak ada kesalahan
            DB::commit();
    
            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();
            
            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }
    public function destroy($id)
{
    // Temukan data pegawai berdasarkan id
    $pegawai = Pegawai::find($id);

    if ($pegawai) {
        // Memulai transaksi database
        DB::beginTransaction();

        try {
            // Hapus pegawai dari tabel pegawais
            $pegawai->delete();

            // Hapus juga data pegawai dengan NIP yang sama dari tabel pekerja
            DB::table('pekerja')->where('nip', $pegawai->nip)->delete();

            // Commit transaksi jika tidak ada kesalahan
            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return response()->json(['success' => false, 'message' => 'Gagal menghapus data.'], 500);
        }
    } else {
        return response()->json(['success' => false, 'message' => 'Data pegawai tidak ditemukan.'], 404);
    }
}


    public function update(Request $request)
    {
        // Validate request
        $request->validate([
            'id' => 'required|exists:pegawais,id',
            'role' => 'required|in:2,3',
        ]);

        try {
            // Update role
            Pegawai::where('id', $request->id)->update(['role' => $request->role]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }   

}
