<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluasi;
use Illuminate\Support\Facades\Auth;

class EvaluasiController extends Controller
{
    public function create()
    {
        // Tampilkan formulir evaluasi
        return view('evaluasi.create');
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'nilai1' => 'required|integer|min:1|max:5',
            'nilai2' => 'required|integer|min:1|max:5',
            'nilai3' => 'required|integer|min:1|max:5',
            'nilai4' => 'required|integer|min:1|max:5',
            'nilai5' => 'required|integer|min:1|max:5',
            'saran' => 'required|string',
            'masukan' => 'required|string',
        ]);

        // Mendapatkan user_id dari Auth
        $user_id = Auth::id();

        // Simpan data evaluasi ke dalam database dengan menambahkan user_id
        Evaluasi::create(array_merge($request->all(), ['user_id' => $user_id]));

        return redirect()->back()->with('success', 'Data evaluasi telah disimpan.');
    }
}
