<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Instansi;
use App\Models\Prodi;
use App\Models\Tingkat;
use App\Models\Kehadiran;
use App\Models\Mandiri;
use App\Models\Kriteria;
use App\Models\LaporanAkhir;
use App\Models\Nilai;
use App\Models\Posting;
use App\Models\User;
use App\Models\Wawancara;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Charts\GrafikPOMChart;
use App\Models\Evaluasi;
use Illuminate\Support\Facades\Session;


class MagangController extends Controller
{

public function home(Request $request)
{
    // Ambil semua kriteria
    $allKriterias = Kriteria::all();
    
    // Pisahkan kriteria yang statusnya 'Pengajuan Diterima'
    $kriterias = Kriteria::whereIn('status', ['Pengajuan Diterima'])->get();

    // Inisialisasi array untuk menyimpan kriteria yang masih dibuka
    $kriteriasDibuka = [];

    // Tambahkan logika untuk menentukan apakah lowongan masih dibuka atau tidak
    foreach ($kriterias as $kriteria) {
        // Pisahkan tanggal mulai dan tanggal selesai
        list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $kriteria->timeline);

        // Konversi tanggal mulai dan selesai ke objek Carbon
        $carbon_tanggal_mulai = Carbon::createFromFormat('m/d/Y', $tanggal_mulai);
        $carbon_tanggal_selesai = Carbon::createFromFormat('m/d/Y', $tanggal_selesai);

        // Periksa apakah tanggal sekarang berada dalam rentang tanggal
        $today = Carbon::now();
        if ($today->between($carbon_tanggal_mulai, $carbon_tanggal_selesai)) {
            // Jika masih dalam rentang tanggal, tambahkan kriteria ke array kriteria yang masih dibuka
            $kriteria->isDibuka = true;
            $kriteriasDibuka[] = $kriteria;
        }
    }

    // Kirim data kriteria yang masih dibuka ke view
    $data = [
        'kriterias' => $kriteriasDibuka, // Mengirim data kriteria yang masih dibuka
    ];
    
    // Jika ada kriteria yang dipilih sebelumnya, kirim juga data kriteria tersebut
    $kriteriaId = $request->session()->get('selected_kriteria_id');
    if ($kriteriaId) {
        // Mengambil data kriteria berdasarkan ID yang dipilih
        $kriteria = Kriteria::findOrFail($kriteriaId);
        $data['kriteria'] = $kriteria;
    }

    // Mengambil semua entri Wawancara yang belum 'Diteruskan ke Unit' atau 'ditolak'
    return view('peserta.home', $data);
}


    public function dashboard()
    {
        return view('peserta.dashboardpeserta');
    }
   
    
   
    public function apply(Request $request)
    {
        $kriterias = DB::table('kriterias')->get();
        $kriterias = Kriteria::all();
        // Mengambil semua entri Mandiri yang belum 'Diterima' atau 'ditolak'
        $kriterias = Kriteria::whereIn('status', ['Pengajuan Diterima'])->get();
        
        $data = [
            'kriterias' => $kriterias, // Mengirim data pegawai
        ];
        // Ambil ID lowongan yang dipilih dari session
        $kriteriaId = $request->session()->get('selected_kriteria_id');
        // Mengambil data kriteria berdasarkan ID yang dipilih
        $kriteria = Kriteria::findOrFail($kriteriaId);
        return view('peserta.apply', $data, compact('kriteria'));
    }
    public function beranda()
    {
        $user = Auth::user();
        $data = [];

        if ($user) {
            $posting = Posting::where('user_id', $user->id)->where('status', 'Peserta Magang Aktif')->first();
            $mandiri = Mandiri::where('user_id', $user->id)->where('status', 'Peserta Magang Aktif')->first();
            $wawancara = Wawancara::where('user_id', $user->id)->where('status', 'Peserta Penelitian Aktif')->first();
            $grafikPOMChart = new GrafikPOMChart();
            $chart = $grafikPOMChart->build();

            if ($posting) {
                $data = [
                    'unit' => $posting->unit,
                    'durasi' => $posting->durasi,
                    'chart' => $chart
                ];
            } elseif ($mandiri) {
                $data = [
                    'unit' => $mandiri->unit_kerja,
                    'durasi' => $mandiri->durasi,
                    'chart' => $chart
                ];
            } elseif ($wawancara) {
                $data = [
                    'unit' => $wawancara->unit_kerja,
                    'durasi' => $wawancara->durasi,
                    'chart' => $chart
                ];
            }
        }

        return view('peserta.beranda', $data);
    }

    public function hasil()
{
    // Mengambil user berdasarkan user_id
    $user = User::findOrFail(auth()->id());

    // Mengambil data mandiri berdasarkan user_id dengan status yang bukan 'Ditolak Unit' atau 'Diterima Unit'
    $mandiris = Mandiri::where('user_id', $user->id)
                        ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan tanggal pembuatan secara descending (terbaru dulu)
                        ->get();

    // Mengambil data wawancara berdasarkan user_id dengan status yang bukan 'Ditolak Unit' atau 'Diterima Unit'
    $wawancaras = Wawancara::where('user_id', $user->id)
                            ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan tanggal pembuatan secara descending (terbaru dulu)
                            ->get();
    // Mengambil data posting berdasarkan user_id dengan status yang bukan 'Ditolak Unit' atau 'Diterima Unit'
    $postings = Posting::where('user_id', $user->id)
                        ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan tanggal pembuatan secara descending (terbaru dulu)
                        ->get();
    // Mengambil laporan akhir milik pengguna yang sedang login
    $laporan_akhir = LaporanAkhir::where('user_id', Auth::id())->first();
    
    // Periksa apakah ada laporan akhir yang dimiliki oleh pengguna yang sedang login

    // Menggabungkan data dalam sebuah array
    $data = [
        'user' => $user,
        'mandiris' => $mandiris,
        'wawancaras' => $wawancaras,
        'postings' => $postings,
        'laporan_akhir' => $laporan_akhir
    ];

    // Mengirim data ke view
    return view('peserta.hasil', $data);
}

    public function terimaPerubahan(Request $request)
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
    ]);

    // Ambil id dari permintaan
    $id = $request->id;

    // Update status menjadi 'ditolak' untuk model yang sesuai dengan ID
    Mandiri::where('id', $id)->update(['status' => 'Perubahan Diterima']);

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
    public function terimaPerubahanW(Request $request)
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
    ]);

    // Ambil id dari permintaan
    $id = $request->id;

    // Update status menjadi 'ditolak' untuk model yang sesuai dengan ID
    Wawancara::where('id', $id)->update(['status' => 'Perubahan Diterima']);

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
    public function terimaPerubahanK(Request $request)
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
    Posting::where('id', $id)->update(['status' => 'Perubahan Diterima']);

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
public function updateLapstatus(Request $request)
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

    // Ambil ID posting dari permintaan
    $posting_id = $request->id;

    // Update lapstatus menjadi 'mengumpulkan' untuk posting tersebut
    Posting::where('id', $posting_id)->update(['lapstatus' => 'mengumpulkan']);

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
public function submitLaporanK(Request $request)
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

    // Ambil ID laporan akhir dari permintaan
    $laporan_id = $request->id;

    // Ambil laporan akhir berdasarkan ID
    $laporan = LaporanAkhir::findOrFail($laporan_id);

    // Periksa apakah ada posting dengan user_id yang sama dengan laporan akhir
    $posting = Posting::where('user_id', $laporan->user_id)->first();

    if ($posting) {
        // Update lapstatus menjadi 'mengumpulkan' untuk posting tersebut
        $posting->update(['lapstatus' => 'mengumpulkan']);

        // Mengembalikan respons JSON
        return response()->json(['success' => true]);
    } else {
        // Jika tidak ada posting yang sesuai, kembalikan pesan error
        return response()->json(['error' => 'Tidak ada posting yang sesuai dengan laporan akhir ini.'], 404);
    }
}
public function replaceFile(Request $request)
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
        'pengumpulan_laporan' => 'required|file|mimes:pdf|max:10240', // Atur validasi sesuai kebutuhan Anda
    ]);

    // Ambil ID dari permintaan
    $id = $request->id;

    // Ambil file yang diunggah
    $file = $request->file('pengumpulan_laporan');

    // Simpan file baru dengan mengganti file lama
    $laporan = LaporanAkhir::findOrFail($id);
    $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('uploads'), $fileName);

    // Update nama file baru ke dalam database
    $laporan->update(['pengumpulan_laporan' => $fileName]);

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
    

    public function input()
    {
        return view('peserta.input');
    }
    public function magang()
    {
        $namins = Instansi::all();
        $tingkats = Tingkat::all();
        $data = Category::all();
        $prodi = Prodi::all(); 
        return view('peserta.magang', ['data' => $data, 'namins' => $namins, 'tingkats'=>$tingkats, 'prodi'=>$prodi]);
    }
    public function posisi()
    {
        $kriterias = Kriteria::all();
        $kriterias = Kriteria::whereIn('status', ['Pengajuan Diterima'])->get();
        return view('peserta.posisi', compact('kriterias'));
    }
    
    public function setApply($id, Request $request)
    {
        // Menyimpan ID lowongan yang dipilih ke dalam session
        $request->session()->put('selected_kriteria_id', $id);
        return redirect('/magang/apply');
    }
    
    public function setDaftar($id, Request $request)
    {
        // Menyimpan ID lowongan yang dipilih ke dalam session
        $request->session()->put('selected_kriteria_id', $id);
        return redirect('/magang/daftar');
    }
    
    public function absensi()
    {
        return view('peserta.absensi');
    }
    public function submit()
    {
        return view('peserta.submit');
    }
    public function wawancara()
    {
        $namins = Instansi::all();
        $tingkats = Tingkat::all();
        $prodi = Prodi::all(); 
        return view('peserta.wawancara', [ 'namins' => $namins, 'tingkats'=>$tingkats, 'prodi'=>$prodi]);
    }
    
    public function assignment()
    {
        $user = Auth::user();
        $laporan_akhir = LaporanAkhir::where('user_id', $user->id)->latest()->first(); // Ambil laporan terbaru
        
        $data = [];
    
        if ($user) {
            $posting = Posting::where('user_id', $user->id)->where('status', 'Peserta Magang Aktif')->first();
            $mandiri = Mandiri::where('user_id', $user->id)->where('status', 'Peserta Magang Aktif')->first();
            $wawancara = Wawancara::where('user_id', $user->id)->where('status', 'Peserta Magang Aktif')->first();
    
            if ($posting) {
                $data = [
                    'unit' => $posting->unit,
                    'durasi' => $posting->durasi
                ];
            } elseif ($mandiri) {
                $data = [
                    'unit' => $mandiri->unit_kerja,
                    'durasi' => $mandiri->durasi
                ];
            } elseif ($wawancara) {
                $data = [
                    'unit' => $wawancara->unit_kerja,
                    'durasi' => $wawancara->durasi
                ];
            }
        }
        $data['laporan_akhir'] = $laporan_akhir;
        return view('peserta.assignment', $data);
    }
    


    public function daftar(Request $request)
    {
        $namins = Instansi::all();
        $tingkats = Tingkat::all();
        $prodi = Prodi::all(); 
        $kriterias = Kriteria::first();
        $data = [
            'kriterias' => $kriterias, // Mengirim data pegawai
            'namins' => $namins, // Mengirim data pegawai
            'tingkats' => $tingkats, // Mengirim data pegawai
            'prodi' => $prodi, // Mengirim data pegawai
        ];
        // Ambil ID lowongan yang dipilih dari session
        $kriteriaId = $request->session()->get('selected_kriteria_id');
        // Mengambil data kriteria berdasarkan ID yang dipilih
        $kriteria = Kriteria::findOrFail($kriteriaId);
        return view('peserta.daftar', $data, compact('kriteria'));
    }
    public function tatatertib()
    {
        return view('peserta.tatatertib');
    }
    public function sertifikat()
    {
        // Mengambil laporan akhir milik pengguna yang sedang login
        $laporan_akhir = LaporanAkhir::where('user_id', Auth::id())->first();
        
        // Periksa apakah ada laporan akhir yang dimiliki oleh pengguna yang sedang login
        if (!$laporan_akhir) {
            return view('peserta.sertifikat')->with('laporan_akhir', null);
        }
        
        // Mengambil data Mandiri yang sesuai dengan user_id
        $mandiri = Mandiri::where('user_id', Auth::id())->first();
        
        // Mengambil data Posting yang sesuai dengan user_id
        $posting = Posting::where('user_id', Auth::id())->first();
        
        // Mengambil nilai evaluasi yang sesuai dengan user_id
        $evaluasi = Evaluasi::where('user_id', Auth::id())->first();
        
        // Mengirimkan nilai dan laporan akhir ke view jika ditemukan
        return view('peserta.sertifikat', compact('laporan_akhir', 'mandiri', 'posting', 'evaluasi'));
    }
    

    public function login(){
        return view("auth.login");
    }
    public function welcome()
    {
    $kriterias = Kriteria::whereIn('status', ['Pengajuan Diterima'])->get();
    
    // Membuat instance GrafikPOMChart
    $grafikPOMChart = new GrafikPOMChart();
    $chart = $grafikPOMChart->build();
    
    $data = [
        'kriterias' => $kriterias,
        'chart' => $chart, // Menambahkan data chart
    ];
    
    return view('welcome', $data);
    }

    public function redirectToGmail()
    {
        return redirect()->away('https://mail.google.com');
    }
    
    function indexuk(){
        return view("unit.indexuk");
    }
    public function kehadiran()
    {
    // Dapatkan ID pengguna yang sedang login
    $userId = Auth::id();
    
    // Mengambil data kehadiran berdasarkan ID pengguna
    $kehadirans = Kehadiran::where('user_id', $userId)->get();
    
    // Mengirimkan data ke view
    return view('peserta.absensi', compact('kehadirans'));
    }
     // Metode untuk menangani penerimaan pendaftaran magang
     public function prosesPenerimaan(Request $request)
     {
         $userId = $request->input('user_id');
         $user = User::find($userId);
 
         if (!$user) {
             return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
         }
 
         // Lakukan tindakan penerimaan, misalnya:
         $user->status = 'Diterima';
         $user->save();
 
         return response()->json(['message' => 'Pengguna berhasil diterima']);
     }
 
     // Metode untuk menangani penolakan pendaftaran magang
     public function prosesPenolakan(Request $request)
     {
         $userId = $request->input('user_id');
         $user = User::find($userId);
 
         if (!$user) {
             return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
         }
 
         // Lakukan tindakan penolakan, misalnya:
         $user->delete();
 
         return response()->json(['message' => 'Pengguna berhasil ditolak']);
     }
     public function tolakPerubahan(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => 'required|exists:mandiri,id',
        'keterangan' => 'required|string',
    ]);

    // Ambil id dan keterangan dari permintaan
    $id = $request->id;
    $keterangan = $request->keterangan;

    // Perbarui data pendaftaran dengan status 'Ditolak' dan keterangan
    $affectedRows = Mandiri::where('id', $id)
        ->update([
            'status' => 'Peserta mengundurkan diri',
            'keterangan' => $keterangan,
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}

public function tolakPerubahanW(Request $request)
{
    $request->validate([
        'id' => 'required|exists:wawancara,id',
        'keterangan' => 'required|string',
    ]);

    // Ambil id dan keterangan dari permintaan
    $id = $request->id;
    $keterangan = $request->keterangan;

    // Perbarui data pendaftaran dengan status 'Ditolak' dan keterangan
    $affectedRows = Wawancara::where('id', $id)
        ->update([
            'status' => 'Peserta mengundurkan diri',
            'keterangan' => $keterangan,
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
public function tolakPerubahanK(Request $request)
{
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
            'status' => 'Peserta mengundurkan diri',
            'keterangan' => $keterangan,
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
     public function terimaMagang(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => 'required|exists:mandiri,id',
    ]);

    // Ambil id dan keterangan dari permintaan
    $id = $request->id;

    // Perbarui data pendaftaran dengan status 'Diterima' dan keterangan
    $affectedRows = Mandiri::where('id', $id)
        ->update([
            'status' => 'Peserta Magang Aktif',
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}

public function terimaMagangW(Request $request)
{
    $request->validate([
        'id' => 'required|exists:wawancara,id',
    ]);

    // Ambil id dan keterangan dari permintaan
    $id = $request->id;

    // Perbarui data pendaftaran dengan status 'Diterima' dan keterangan
    $affectedRows = Wawancara::where('id', $id)
        ->update([
            'status' => 'Peserta Penelitian Aktif',
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
public function terimaMagangK(Request $request)
{
    $request->validate([
        'id' => 'required|exists:posting,id',
    ]);

    // Ambil id dan keterangan dari permintaan
    $id = $request->id;

    // Perbarui data pendaftaran dengan status 'Diterima' dan keterangan
    $affectedRows = Posting::where('id', $id)
        ->update([
            'status' => 'Peserta Magang Aktif',
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
     public function tolakMagang(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => 'required|exists:mandiri,id',
        'keterangan' => 'required|string',
    ]);

    // Ambil id dan keterangan dari permintaan
    $id = $request->id;
    $keterangan = $request->keterangan;

    // Perbarui data pendaftaran dengan status 'Ditolak' dan keterangan
    $affectedRows = Mandiri::where('id', $id)
        ->update([
            'status' => 'Peserta mengundurkan diri',
            'keterangan' => $keterangan,
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}

public function tolakMagangW(Request $request)
{
    $request->validate([
        'id' => 'required|exists:wawancara,id',
        'keterangan' => 'required|string',
    ]);

    // Ambil id dan keterangan dari permintaan
    $id = $request->id;
    $keterangan = $request->keterangan;

    // Perbarui data pendaftaran dengan status 'Ditolak' dan keterangan
    $affectedRows = Wawancara::where('id', $id)
        ->update([
            'status' => 'Peserta mengundurkan diri',
            'keterangan' => $keterangan,
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
public function tolakMagangK(Request $request)
{
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
            'status' => 'Peserta mengundurkan diri',
            'keterangan' => $keterangan,
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
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

    public function selesaiMagang(Request $request)
    {
        // Validasi permintaan
        $request->validate([
            'id' => 'required|exists:laporan_akhir,id',
        ]);
    
        // Ambil id dari permintaan
        $id = $request->id;
    
        // Ambil user_id dari laporan akhir yang sesuai dengan id
        $laporanAkhir = LaporanAkhir::find($id);
        $user_id = $laporanAkhir->user_id;
    
        // Perbarui status peserta magang selesai di tabel Mandiri jika ada
        Mandiri::where('user_id', $user_id)
            ->where('status', 'Peserta Magang Aktif')
            ->update(['status' => 'Peserta selesai magang']);
    
        // Perbarui status peserta magang selesai di tabel Posting jika ada
        Posting::where('user_id', $user_id)
            ->where('status', 'Peserta Magang Aktif')
            ->update(['status' => 'Peserta selesai magang']);
    
        // Mengembalikan respons JSON
        return response()->json(['success' => true]);
    }
    

}
