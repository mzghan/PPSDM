<?php

namespace App\Http\Controllers;

use App\Models\DataInti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kepala_unit.*' => 'required|string',
            'nip.*' => 'required|string',
            'tanda_tangan.*' => 'required|image|mimes:png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        foreach ($request->kepala_unit as $key => $value) {
            $tanda_tangan = $request->file('tanda_tangan')[$key];
            $slug = Str::slug($tanda_tangan->getClientOriginalName());
            $new_tanda_tangan = time() . '_' . $slug;
            $tanda_tangan->move('uploads/kepalaunit/', $new_tanda_tangan);

            $data_inti = new DataInti;
            $data_inti->kepala_unit = $request->kepala_unit[$key];
            $data_inti->nip = $request->nip[$key];
            $data_inti->tanda_tangan = 'uploads/kepalaunit/' . $new_tanda_tangan;
            $data_inti->save();
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
}
