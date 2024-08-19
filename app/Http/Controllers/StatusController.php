<?php

namespace App\Http\Controllers;

use App\Models\Mandiri;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function store(Request $request)
{
    // Lakukan validasi input jika diperlukan
    $request->validate([
        'status' => 'required|in:diterima,ditolak', // Hanya menerima nilai 'diterima' atau 'ditolak'
        'user_id' => 'required|exists:mandiri,user_id', // Pastikan user_id ada dalam tabel mandiri
    ]);

    // Ambil data dari permintaan
    $status = $request->input('status');
    $userId = $request->input('user_id');

    // Memanggil metode tolakPendaftaran dengan userId sebagai argumen
    $this->tolakPendaftaran($userId);

    return redirect()->back()->with('success', 'Status berhasil diperbarui');
}
}
