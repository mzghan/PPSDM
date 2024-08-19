<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Mandiri;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\Pekerja;
use App\Models\Instansi;
use App\Models\Wawancara;
use App\Models\Role;
use App\Models\Kehadiran;
use App\Models\LaporanAkhir;
use App\Models\Posting;
use App\Models\Prodi;
use App\Models\Tingkat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Charts\GrafikPOMChart;


class SubAdminController extends Controller
{
    //
    
    public function kriteria()
{
    // Mendapatkan pegawai yang sedang login
    $pegawai = auth()->guard('wab')->user();

    // Memastikan pegawai ditemukan dan memiliki data pekerja terkait
    if ($pegawai && $pegawai->pekerja) {
        // Mendapatkan unit dari data pekerja yang terkait
        $unit = Auth::guard('wab')->user()->pekerja->unit;
        $id_unit = Auth::guard('wab')->user()->pekerja->id_unit;

        // Mengambil kriteria berdasarkan id_unit pegawai
        $kriterias = Kriteria::whereNotIn('status', [''])->where('id_unit', $id_unit)->get();
        
        // Mendapatkan data tingkat dan prodi
        $tingkats = Tingkat::all();
        $prodi = Prodi::all(); 
        $pekerja = Pekerja::all();
        
        // Mengirimkan data ke view
        return view('sub-admin.kriteria', compact('kriterias', 'tingkats', 'prodi', 'unit', 'id_unit', 'pekerja'));
    }

    // Jika pegawai tidak ditemukan atau tidak memiliki data pekerja, redirect ke halaman lain
    return redirect('/');
}
public function input(Request $request)
{
 // Ambil user_id dari URL jika ada
 $userId = $request->query('user_id');

 // Memastikan user_id ditemukan
 if (!$userId) {
     return redirect()->back()->with('error', 'Parameter user_id tidak ditemukan!');
 }

 // Mendapatkan laporan akhir terkait dengan user yang ditemukan
 $laporanAkhir = LaporanAkhir::where('user_id', $userId)->first();

 if ($laporanAkhir) {
     // Mengambil data kehadiran berdasarkan user_id
     $kehadiran = Kehadiran::where('user_id', $userId)->get();

     // Menghitung jumlah kehadiran yang memiliki nilai 1 pada kolom persentase_kehadiran
     $totalKehadiranSatu = $kehadiran->where('presentase_kehadiran', 1)->count();

     // Menghitung total kehadiran
     $totalKehadiran = $kehadiran->count();

     // Menghitung persentase kehadiran
     $presentaseKehadiran = ($totalKehadiran > 0) ? ($totalKehadiranSatu / $totalKehadiran) * 100 : 0;

     // Mengirimkan data ke view bersama dengan presentase kehadiran dan laporan akhir
     return view('sub-admin.input', [
         'laporan_akhir' => $laporanAkhir,
         'kehadiran' => $kehadiran,
         'presentaseKehadiran' => $presentaseKehadiran,
         'userId' => $userId
     ]);
 } else {
     // Jika laporan akhir tidak ditemukan, kembalikan ke halaman sebelumnya
     return redirect()->back()->with('error', 'Data laporan akhir tidak ditemukan!');
 }
}
public function revisiLaporan(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => 'required|exists:laporan_akhir,id',
        'keterangan' => 'required|string',
    ]);

    // Ambil id dan keterangan dari permintaan
    $id = $request->id;
    $keterangan = $request->keterangan;

    // Perbarui data pendaftaran dengan status 'Ditolak' dan keterangan
    $affectedRows = LaporanAkhir::where('id', $id)
        ->update([
            'status' => 'Revisi',
            'keterangan' => $keterangan,
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}


public function inputptn(Request $request)
{
    // Ambil user_id dari URL jika ada
    $userId = $request->query('user_id');

    // Memastikan user_id ditemukan
    if (!$userId) {
        return redirect()->back()->with('error', 'Parameter user_id tidak ditemukan!');
    }

    // Mendapatkan laporan akhir terkait dengan user yang ditemukan
    $laporanAkhir = LaporanAkhir::where('user_id', $userId)->first();

    if ($laporanAkhir) {
        // Mengambil data kehadiran berdasarkan user_id
        $kehadiran = Kehadiran::where('user_id', $userId)->get();

        // Menghitung jumlah kehadiran yang memiliki nilai 1 pada kolom persentase_kehadiran
        $totalKehadiranSatu = $kehadiran->where('presentase_kehadiran', 1)->count();

        // Menghitung total kehadiran
        $totalKehadiran = $kehadiran->count();

        // Menghitung persentase kehadiran
        $presentaseKehadiran = ($totalKehadiran > 0) ? ($totalKehadiranSatu / $totalKehadiran) * 100 : 0;

        // Mengirimkan data ke view bersama dengan presentase kehadiran dan laporan akhir
        return view('sub-admin.inputptn', [
            'laporan_akhir' => $laporanAkhir,
            'kehadiran' => $kehadiran,
            'presentaseKehadiran' => $presentaseKehadiran,
            'userId' => $userId
        ]);
    } else {
        // Jika laporan akhir tidak ditemukan, kembalikan ke halaman sebelumnya
        return redirect()->back()->with('error', 'Data laporan akhir tidak ditemukan!');
    }
}

// Pendaftar Posting
public function posisi(Request $request)
{
    $pegawai = auth()->guard('wab')->user();
    $kriterias = Kriteria::whereIn('status', ['Proccess'])->get();
    $mandiris = Mandiri::whereIn('status', ['Proccess'])->get();
    $wawancaras = Wawancara::whereIn('status', ['Proccess'])->get();

    if ($pegawai && $pegawai->pekerja) {
        $unit = $pegawai->pekerja->unit;
        
        // Ambil postings sesuai dengan unit dan status yang ditentukan
        $postings = Posting::where('unit', $unit)
                        ->whereIn('status', ['Proccess', 'Diteruskan ke Unit', 'Perubahan Tanggal', 'Perubahan Diterima', 'mengundurkan diri'])
                        ->get();

        $data = [
            'postings' => $postings,
            'mandiris' => $mandiris,
            'wawancaras' => $wawancaras,
            'kriterias' => $kriterias, 
            'unit' => $unit,
        ];

        return view('sub-admin.posisi', $data);
    }
}

// Pendaftar Mandiri
public function posisiM(Request $request)
{
    $pegawai = auth()->guard('wab')->user();
    $kriterias = Kriteria::whereIn('status', ['x'])->get();
    $postings = Posting::whereIn('status', ['x'])->get();
    $mandiris = Mandiri::whereIn('status', ['Perubahan Diterima','Diteruskan ke Unit'])
                    ->get();

    $wawancaras = Wawancara::whereIn('status', ['x'])->get();

    $selected_jenis_pendaftaran = session()->get('selected_jenis_pendaftaran'); // Mengambil jenis pendaftaran yang dipilih

    if ($pegawai && $pegawai->pekerja) {
        $unit = $pegawai->pekerja->unit;
    
        // Mengecek apakah jenis pendaftaran yang dipilih sudah disimpan di session
        if ($selected_jenis_pendaftaran) {
            // Mengambil semua data Mandiri dengan jenis pendaftaran yang sama dengan yang dipilih dan sesuai dengan unit pegawai
            $mandiris = Mandiri::whereJsonContains('unit_kerja', [$unit])
                        ->whereIn('status', ['Diteruskan ke Unit', 'Perubahan Tanggal', 'Perubahan Diterima', 'mengundurkan diri'])
                        ->get();

        } else {
            // Jika tidak ada jenis pendaftaran yang dipilih, ambil semua data Mandiri sesuai dengan unit pegawai
            $mandiris = Mandiri::whereJsonContains('unit_kerja', [$unit])
                        ->whereIn('status', ['Diteruskan ke Unit', 'Perubahan Tanggal', 'Perubahan Diterima', 'mengundurkan diri'])
                        ->get();

        }
    
        $data = [
            'postings' => $postings,
            'mandiris' => $mandiris, // Mengirim data Mandiri yang telah difilter
            'wawancaras' => $wawancaras,
            'kriterias' => $kriterias, 
            'unit' => $unit,
        ];
    
        return view('sub-admin.posisi', $data);
    }
}

// Pendaftar Wawancara
public function posisiW(Request $request)
{
    $pegawai = auth()->guard('wab')->user();
    $kriterias = Kriteria::whereIn('status', ['x'])->get();
    $postings = Posting::whereIn('status', ['x'])->get();
    $mandiris = Mandiri::whereIn('status', ['x'])->get();
    $wawancaras = Wawancara::whereIn('status', ['Diteruskan ke Unit'])->get();

    if ($pegawai && $pegawai->pekerja) {
        $unit = $pegawai->pekerja->unit;
        $selected_kriteria_id = session()->get('selected_kriteria_id');

        // Mengecek apakah jenis pendaftaran yang dipilih adalah wawancara
        if ($selected_kriteria_id) {
            $wawancara = Wawancara::find($selected_kriteria_id);
            if ($wawancara) {
                $wawancaras = Wawancara::where('id', $selected_kriteria_id)->get();
            }
        }

        $data = [
            'postings' => $postings,
            'mandiris' => $mandiris,
            'wawancaras' => $wawancaras,
            'kriterias' => $kriterias, 
            'unit' => $unit,
        ];

        return view('sub-admin.posisi', $data);
    }
}
// Pendftar Posting
public function setPosisi($id) {
    // Menyimpan ID lowongan yang dipilih ke dalam session
    session()->put('selected_kriteria_id', $id);
    return redirect()->route('posisi.form'); // Mengarahkan kembali ke halaman 'posisi' setelah menyimpan ID
}
public function setPosisiM($id) {
    // Menyimpan ID lowongan yang dipilih ke dalam session
    session()->put('selected_kriteria_id', $id);
    return redirect()->route('posisiM.form'); // Mengarahkan kembali ke halaman 'posisi' setelah menyimpan ID
}
public function setPosisiW($id) {
    // Menyimpan ID lowongan yang dipilih ke dalam session
    session()->put('selected_kriteria_id', $id);
    return redirect()->route('posisiW.form'); // Mengarahkan kembali ke halaman 'posisi' setelah menyimpan ID
}
// End

public function nilailaporan(Request $request)
{
    // Pastikan request memiliki parameter user_id
    if ($request->has('user_id')) {
        // Ambil laporan akhir berdasarkan user_id dari URL
        $user_id = $request->user_id;
        $laporan_akhir = LaporanAkhir::where('user_id', $user_id)->latest()->first();

        // Pastikan laporan akhir ditemukan
        if ($laporan_akhir) {
            // Ambil nilai terbaru berdasarkan user_id
            $laporan_akhir = LaporanAkhir::where('user_id', $user_id)->latest()->first();

            // Pastikan lap$laporan_akhir ditemukan
            if ($laporan_akhir) {
                // Mengirimkan data ke view bersama dengan laporan akhir dan nilai
                return view('sub-admin.nilailaporan', compact('laporan_akhir'));
            } else {
                // Jika nilai tidak ditemukan, kembalikan ke halaman sebelumnya dengan pesan error
                return redirect()->back()->with('error', 'Data nilai tidak ditemukan!');
            }
        } else {
            // Jika laporan akhir tidak ditemukan, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Data laporan akhir tidak ditemukan!');
        }
    } else {
        // Jika tidak ada user_id yang diterima, redirect ke halaman sebelumnya dengan pesan error
        return redirect()->back()->with('error', 'Parameter user_id tidak ditemukan!');
    }
}

public function terimaLaporan(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!LaporanAkhir::where('id', $value)->exists()) {
                    $fail('The selected ID is invalid.');
                }
            },
        ],
    ]);

    // Ambil id dari permintaan
    $id = $request->id;

    try {
        // Ambil user_id dan status sebelumnya dari laporan akhir
        $laporanAkhir = LaporanAkhir::find($id);
        $user_id = $laporanAkhir->user_id;
        $status_sebelumnya = $laporanAkhir->status;

        // Periksa apakah status sebelumnya adalah 'Revisi'
        if ($status_sebelumnya !== 'Revisi') {
            // Update status menjadi 'Laporan Diterima' untuk model Nilai yang sesuai dengan user_id
            LaporanAkhir::where('user_id', $user_id)->update(['status' => 'Laporan Diterima']);

            // Mengembalikan respons JSON
            return response()->json(['success' => true]);
        } else {
            // Jika status sebelumnya adalah 'Revisi', kembalikan respons JSON dengan pesan error
            return response()->json(['success' => false, 'message' => 'The previous status is "Revisi".'], 400);
        }
    } catch (\Exception $e) {
        // Jika terjadi kesalahan, kembalikan respons JSON dengan status gagal
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}


    public function penilaian()
    {
                // Mendapatkan pegawai yang sedang login
                $pegawai = auth()->guard('wab')->user();
        
                // Memastikan pegawai ditemukan dan memiliki data pekerja terkait
                if ($pegawai && $pegawai->pekerja) {
                    // Mendapatkan unit dari data pekerja yang terkait
                    $unit = $pegawai->pekerja->unit;
            
                    // Mengirimkan data ke view
                    return view('sub-admin.penilaian', compact('unit'));
            
                // Jika pegawai tidak ditemukan atau tidak memiliki data pekerja, redirect ke halaman lain
                return redirect('/');
            }
        // $pegawais = Pegawai::where('role','!=',2)->get();
        // return view('sub-admin.penilaian');
    }
    public function peserta()
    {
        // Mendapatkan pegawai yang sedang login
        $pegawai = auth()->guard('wab')->user();
        
        // Memastikan pegawai ditemukan dan memiliki data pekerja terkait
        if ($pegawai && $pegawai->pekerja) {
            // Mendapatkan unit dari data pekerja yang terkait
            $unit = $pegawai->pekerja->unit;
    
            // Mengirimkan data ke view
            return view('sub-admin.peserta', compact('unit'));
    
        // Jika pegawai tidak ditemukan atau tidak memiliki data pekerja, redirect ke halaman lain
        return redirect('/');
    }
        // $pegawais = Pegawai::where('role','!=',2)->get();
        // return view('sub-admin.peserta');
    }
    public function kehadiran()
{
    // Mendapatkan pegawai yang sedang login
    $pegawai = auth()->guard('wab')->user();
    
    // Memastikan pegawai ditemukan dan memiliki data pekerja terkait
    if ($pegawai && $pegawai->pekerja) {
        // Mendapatkan unit dari data pekerja yang terkait
        $unit = $pegawai->pekerja->unit;

        // Mengambil data kehadiran yang sesuai dengan unit kerja dari kedua model
        $kehadiransFromPosting = Kehadiran::where('unit', $unit)->get();
        $kehadiransFromMandiri = Kehadiran::where('unit', 'LIKE', '%' . $unit . '%')->get(); // Menggunakan LIKE untuk pencarian unit dari data yang bertipe JSON
        $kehadirans = $kehadiransFromPosting->merge($kehadiransFromMandiri);

        // Mengirimkan data ke view
        return view('sub-admin.peserta', compact('unit', 'kehadirans'));
    }

    // Jika pegawai tidak ditemukan atau tidak memiliki data pekerja, redirect ke halaman lain
    return redirect('/');
}

public function laporan()
{
    // Mendapatkan pegawai yang sedang login
    $pegawai = auth()->guard('wab')->user();
    
    // Memastikan pegawai ditemukan dan memiliki data pekerja terkait
    if ($pegawai && $pegawai->pekerja) {
        // Mendapatkan unit dari data pekerja yang terkait
        $unit = $pegawai->pekerja->unit;

        // Mendapatkan semua peserta magang aktif dari tiga tabel yang sesuai dengan unit pegawai yang sedang login
        $postings = Posting::where('unit', $unit)
                            ->where('status', 'Peserta Magang Aktif')
                            ->get();
                            
        // Mencari laporan akhir dengan unit yang cocok
        $laporan_akhirs = LaporanAkhir::where(function ($query) use ($unit) {
            // Memastikan laporan akhir memiliki unit yang cocok dengan unit pegawai yang sedang login
            $query->where('unit', $unit)
                  ->orWhereJsonContains('unit', [$unit]);
        })
        ->selectRaw('DISTINCT ON (user_id) *') // Memilih baris terbaru untuk setiap user_id
        ->orderBy('user_id', 'DESC') // Mengurutkan berdasarkan user_id secara descending
        ->orderBy('created_at', 'DESC') // Jika ada beberapa baris untuk user_id yang sama, urutkan berdasarkan created_at secara descending
        ->get();

        // Mengambil semua data Mandiri dengan unit kerja yang sama dengan unit pegawai yang sedang login
        $mandiris = Mandiri::whereJsonContains('unit_kerja', [$unit])
                            ->where('status', 'Peserta Magang Aktif')
                            ->get();
        
        // Mengambil semua data Wawancara dengan unit kerja yang sama dengan unit pegawai yang sedang login
        $wawancaras = Wawancara::whereJsonContains('unit_kerja', [$unit])
                                ->where('status', 'Peserta Magang Aktif')
                                ->get();

        // Mengirimkan data ke view
        return view('sub-admin.laporan', compact('laporan_akhirs', 'postings', 'mandiris', 'wawancaras', 'unit'));
    }

    // Jika pegawai tidak ditemukan atau tidak memiliki data pekerja, redirect ke halaman lain
    return redirect('/');
}

    
    public function seleksi()
{
    $pegawai = auth()->guard('wab')->user();
    
    // Memastikan pegawai ditemukan dan memiliki data pekerja terkait
    if ($pegawai && $pegawai->pekerja) {
        // Mendapatkan unit dari data pekerja yang terkait
        $unit = $pegawai->pekerja->unit;

        $unit = Auth::guard('wab')->user()->pekerja->unit;
        $id_unit = Auth::guard('wab')->user()->pekerja->id_unit;

        $kriterias = Kriteria::whereNotIn('status', ['Pengajuan Ditolak'])->where('id_unit', $id_unit)->get();
        $postings = Posting::where('unit', $unit)
                    ->whereIn('status', ['Proccess', 'Diteruskan ke Unit', 'Perubahan Tanggal', 'Perubahan Diterima' , 'mengundurkan diri'])
                    ->get();

        // Mengambil data pendaftaran yang statusnya 'Diteruskan ke Unit', 'Perubahan Tanggal', atau 'Perubahan Diterima' dan unitnya sesuai dengan unit pegawai
        $mandiris = Mandiri::whereJsonContains('unit_kerja', [$unit])
                            ->whereIn('status', ['Diteruskan ke Unit', 'Perubahan Tanggal', 'Perubahan Diterima' , 'mengundurkan diri'])
                            ->get();

        $wawancaras = Wawancara::whereJsonContains('unit_kerja', [$unit])
                                ->whereIn('status', ['Diteruskan ke Unit', 'Perubahan Tanggal', 'Perubahan Diterima' , 'mengundurkan diri'])
                                ->get();

        // Menghitung jumlah entri yang memerlukan seleksi
        $newSeleksiCount = count($kriterias) + count($mandiris) + count($wawancaras);
            
        // Mengirimkan data ke view
        return view('sub-admin.seleksi', compact('kriterias','postings', 'unit','id_unit', 'mandiris', 'wawancaras'));
    }
}

public function konfirmasiPendaftaran(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!Mandiri::where('id', $value)->exists() && !Wawancara::where('id', $value)->exists()) {
                    $fail('The selected ID is invalid.');
                }
            },
        ],
    ]);

    // Ambil id dari permintaan
    $id = $request->id;

    // Update status menjadi 'ditolak' untuk model yang sesuai dengan ID
    if (Mandiri::where('id', $id)->exists()) {
        Mandiri::where('id', $id)->update(['status' => 'Mengundurkan diri']);
    } elseif (Wawancara::where('id', $id)->exists()) {
        Wawancara::where('id', $id)->update(['status' => 'Mengundurkan diri']);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
public function konfirmasiPendaftaranK(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!Posting::where('id', $value)->exists() && !Wawancara::where('id', $value)->exists()) {
                    $fail('The selected ID is invalid.');
                }
            },
        ],
    ]);

    // Ambil id dari permintaan
    $id = $request->id;

    // Update status menjadi 'ditolak' untuk model yang sesuai dengan ID
    if (Posting::where('id', $id)->exists()) {
        Posting::where('id', $id)->update(['status' => 'Mengundurkan diri']);
    } elseif (Wawancara::where('id', $id)->exists()) {
        Wawancara::where('id', $id)->update(['status' => 'Mengundurkan diri']);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
public function terimaPendaftaran(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!Mandiri::where('id', $value)->exists() && !Wawancara::where('id', $value)->exists()) {
                    $fail('The selected ID is invalid.');
                }
            },
        ],
    ]);

    // Ambil id dari permintaan
    $id = $request->id;

    // Mendapatkan unit dari data pegawai yang terkait
    $unit = auth()->guard('wab')->user()->pekerja->unit;

    // Update nilai kolom unit_kerja dan status
    $affectedRows = Mandiri::where('id', $id)
        ->update([
            'unit_kerja' => json_encode([$unit]),
            'status' => 'Diterima Unit'
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}


    public function terimaPendaftaranK(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!Posting::where('id', $value)->exists()) {
                    $fail('The selected ID is invalid.');
                }
            },
        ],
    ]);

    // Ambil id dari permintaan
    $id = $request->id;

    // Update status menjadi 'ditolak' untuk model yang sesuai dengan ID
    if (Posting::where('id', $id)->exists()) {
        Posting::where('id', $id)->update(['status' => 'Diterima Unit']);
    } 

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}

public function tolakPendaftaran(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => 'required|exists:mandiri,id',
    ]);

    // Ambil id dari permintaan
    $id = $request->id;

    // Mendapatkan data model sesuai dengan ID
    $model = Mandiri::find($id);
    if (!$model) {
        $model = Wawancara::find($id);
    }

    // Mendapatkan unit yang menolak dari data pegawai yang terkait
    $unit_menolak = auth()->guard('wab')->user()->pekerja->unit;

    // Mendapatkan unit yang masih menerima
    $unit = json_decode($model->unit_kerja);

    // Menghapus unit yang menolak dari daftar unit yang masih menerima
    $updatedUnits = array_diff($unit, [$unit_menolak]);

    // Mengubah hasil ke dalam format array jika hanya tersisa satu unit
    if (count($updatedUnits) === 1) {
        $updatedUnits = array_values($updatedUnits);
    }

    // Update kolom unit_kerja dengan unit yang masih menerima
    $model->update(['unit_kerja' => json_encode($updatedUnits)]);

    // Jika tidak ada unit yang masih menerima
    if (empty($updatedUnits)) {
        // Ubah status menjadi "Ditolak Unit" jika array unit kosong
        $model->status = 'Ditolak Unit';
        $model->save();
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}


public function tolakPendaftaranK(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => 'required|exists:posting,id',
        'keterangan' => 'required|string',
    ]);

    // Ambil id dan keterangan dari permintaan
    $id = $request->id;
    $keterangan = $request->keterangan;

    // Perbarui data pendaftaran dengan status 'Ditolak' dan keterangan
    $affectedRows = Posting::where('id', $id)
        ->update([
            'status' => 'Ditolak tahap 2',
            'keterangan' => $keterangan,
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
    public function terimaPendaftaranW(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!Mandiri::where('id', $value)->exists() && !Wawancara::where('id', $value)->exists()) {
                    $fail('The selected ID is invalid.');
                }
            },
        ],
    ]);

    // Ambil id dari permintaan
    $id = $request->id;

    // Mendapatkan unit dari data pegawai yang terkait
    $unit = auth()->guard('wab')->user()->pekerja->unit;

    // Update nilai kolom unit_kerja dan status
    $affectedRows = Wawancara::where('id', $id)
        ->update([
            'unit_kerja' => json_encode([$unit]),
            'status' => 'Diterima Unit'
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
public function perubahanTanggal(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!Mandiri::where('id', $value)->exists()) {
                    $fail('The selected ID is invalid.');
                }
            },
        ],
        'durasi' => 'required',
    ]);

    $id = $request->id;
    $durasi = $request->durasi;

    $mandiri = Mandiri::find($id);
    if ($mandiri) {
        $mandiri->status = 'Perubahan Tanggal';
        $mandiri->durasi = $durasi;
        $mandiri->save();

        // Mengembalikan respons JSON
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Wawancara not found.']);
    }
}
public function perubahanTanggalW(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!Wawancara::where('id', $value)->exists()) {
                    $fail('The selected ID is invalid.');
                }
            },
        ],
        'tanggal' => 'required'
    ]);

    $id = $request->id;
    $tanggal = $request->tanggal;

    $wawancara = Wawancara::find($id);
    if ($wawancara) {
        $wawancara->status = 'Perubahan Tanggal';
        $wawancara->tanggal = $tanggal;
        $wawancara->save();

        // Mengembalikan respons JSON
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Wawancara not found.']);
    }
}
public function perubahanTanggalK(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!Posting::where('id', $value)->exists()) {
                    $fail('The selected ID is invalid.');
                }
            },
        ],
        'tanggal' => 'required'
    ]);

    $id = $request->id;
    $tanggal = $request->tanggal;

    $posting = Posting::find($id);
    if ($posting) {
        $posting->status = 'Perubahan Tanggal';
        $posting->tanggal = $tanggal;
        $posting->save();

        // Mengembalikan respons JSON
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'posting not found.']);
    }
}


public function tolakPendaftaranW(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => 'required|exists:wawancara,id',
    ]);

    // Ambil id dari permintaan
    $id = $request->id;

    // Mendapatkan data model sesuai dengan ID
    $model = Wawancara::find($id);
    if (!$model) {
        $model = Mandiri::find($id);
    }

    // Mendapatkan unit yang menolak dari data pegawai yang terkait
    $unit_menolak = auth()->guard('wab')->user()->pekerja->unit;

    // Mendapatkan unit yang masih menerima
    $unit = json_decode($model->unit_kerja);

    // Menghapus unit yang menolak dari daftar unit yang masih menerima
    $updatedUnits = array_diff($unit, [$unit_menolak]);

    // Mengubah hasil ke dalam format array jika hanya tersisa satu unit
    if (count($updatedUnits) === 1) {
        $updatedUnits = array_values($updatedUnits);
    }

    // Update kolom unit_kerja dengan unit yang masih menerima
    $model->unit_kerja = json_encode($updatedUnits);
    $model->save();
    

    // Jika tidak ada unit yang masih menerima
    if (empty($updatedUnits)) {
        // Ubah status menjadi "Ditolak Unit" jika array unit kosong
        $model->status = 'Ditolak Unit';
        $model->save();
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}

    
    
    public function dashboard()
    {
        // Mendapatkan pegawai yang sedang login
        $pegawai = auth()->guard('wab')->user();
        $laporan_akhirs = LaporanAkhir::whereIn('user_id', function ($query) {
            $query->select('user_id')
                  ->from('laporan_akhir')
                  ->where('status', 'Laporan Diterima');
        })->get();
        $jumlah_laporan_diterima = $laporan_akhirs->count();

        $kriterias = Kriteria::whereIn('status', ['Peserta Magang Aktif'])->get();
        $postings = Posting::whereIn('status', ['Peserta Magang Aktif'])->get();
        $mandiris = Mandiri::whereIn('status', ['Peserta Magang Aktif'])->get();
        $wawancaras = Wawancara::whereIn('status', ['Peserta Magang Aktif'])->get();
    
        // Memastikan pegawai ditemukan dan memiliki data pekerja terkait
        if ($pegawai && $pegawai->pekerja) {
            // Mendapatkan unit dari data pekerja yang terkait
            $unit = $pegawai->pekerja->unit;

            $grafikPOMChart = new GrafikPOMChart();
            $chart = $grafikPOMChart->build();

            $data = [
                'chart' => $chart, // Menambahkan data chart
                'postings' => $postings,
                'mandiris' => $mandiris,
                'wawancaras' => $wawancaras,
                'kriterias' => $kriterias,
                'jumlah_laporan_diterima' => $jumlah_laporan_diterima, 
            ];
    
            // Mengirimkan data ke view
            return view('sub-admin.dashboard', compact('unit'), $data);
        }
    }
    public function download($filename)
    {
        $file_path = public_path('assets/' . $filename);

        if (file_exists($file_path)) {
            return Response::download($file_path);
        } else {
            abort(404);
        }
    }
}
