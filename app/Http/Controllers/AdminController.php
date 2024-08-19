<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Mandiri;
use App\Models\Instansi;
use App\Models\Wawancara;
use App\Models\Kriteria;
use App\Models\LaporanAkhir;
use App\Models\Nilai;
use App\Models\User;
use App\Models\Posting;
use App\Models\Tingkat;
use App\Models\Category;
use App\Models\DataInti;
use App\Models\Prodi;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Charts\GrafikPOMChart;
use App\Models\Evaluasi;
use App\Models\Pekerja;
use Illuminate\Support\Facades\Session;



class AdminController extends Controller
{
    //
    public function homepage()
    {
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
        // Membuat instance GrafikPOMChart
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

        return view('admin.homepage', $data);
    }
    public function data()
    {
        $pegawais = Pegawai::where('role', '!=', 3)->get();
          // Mendapatkan data tingkat dan prodi
          $tingkats = Tingkat::all();
          $prodi = Prodi::all(); 
          $data_intis = DataInti::get();
          
        return view('admin.data', compact( 'data_intis','tingkats', 'prodi'));
    }
    public function kualifikasi()
{
    $pegawais = Pegawai::where('role', '!=', 3)->get();
    
    // Mendapatkan jumlah kriteria yang memiliki status "Pengajuan Baru"
    $newKriteriaCount = Kriteria::where('status', 'Diajukan')->count();

    // Simpan jumlah kriteria baru di session untuk digunakan di view
    Session::put('newKriteriaCount', $newKriteriaCount);

    $kriterias = Kriteria::whereNotIn('status', ['Pengajuan Ditolak','Pengajuan Diterima'])->get();
    $data = [
        'kriterias' => $kriterias, // Mengirim data pegawai
    ];

    return view('admin.kualifikasi', $data, compact('kriterias'));
}
    public function mandiri(Request $request)
    {
        $pegawais = Pegawai::where('role','!=',3)->get();
        $mandiris = DB::table('mandiri')->get();
        // $wawancaras = Wawancara::get();
        $data = Category::all();
        $prodi = Prodi::all(); 
        $mandiris = Mandiri::whereIn('status', ['Proccess'])->get();
        
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $data = [
                'pegawais' => $pegawais,
                'mandiris' => Mandiri::where('name', 'like', '%' . $searchQuery . '%')
                                ->orWhere('status', 'like', '%' . $searchQuery . '%')
                                ->orWhere('jenis', 'like', '%' . $searchQuery . '%')
                                ->orWhere('universitas_sekolah', 'like', '%' . $searchQuery . '%')
                                ->orWhere('jurusan', 'like', '%' . $searchQuery . '%')
                                ->get(),
                // 'wawancaras' => Wawancara::where('name', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('status', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('jenis', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('universitas_sekolah', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('jurusan', 'like', '%' . $searchQuery . '%')
                //                 ->get(),
                // 'postings' => Posting::where('name', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('status', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('jenis', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('universitas_sekolah', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('jurusan', 'like', '%' . $searchQuery . '%')
                //                 ->get(),
                'data' => $data,
                'prodi' => $prodi,
            ];
        } else {
            $data = [
                'pegawais' => $pegawais, // Mengirim data pegawai
                'mandiris' => $mandiris,
                // 'wawancaras' => $wawancaras,
                'data' => $data,
                'prodi'=>$prodi
            ];
        }
        return view('admin.mandiri', $data);
    }
    public function penelitian()
    {
        $pegawais = Pegawai::where('role','!=',3)->get();
        $mandiris = DB::table('mandiri')->get();
        $namins = Instansi::all();
        $wawancaras = Wawancara::get();
        $data = Category::all();
        $tingkats = Tingkat::all();
        $prodi = Prodi::all(); 
        $wawancaras = Wawancara::whereIn('status', ['Proccess'])->get();
        
    
        $data = [
            'pegawais' => $pegawais, // Mengirim data pegawai
            'mandiris' => $mandiris,
            'wawancaras' => $wawancaras,
            'data' => $data,
            'prodi'=>$prodi,
            'tingkats'=>$tingkats,
            'namins' => $namins

        ];
        return view('admin.penelitian', $data);
    }
     public function seleksiakhir()
    {
        $pegawais = Pegawai::where('role','!=',3)->get();
        $mandiris = DB::table('mandiri')->get();
        $wawancaras = Wawancara::get();
        $postings = DB::table('posting')->get();
        $data = Category::all();
        $prodi = Prodi::all(); 
        // Mengambil semua entri Mandiri yang belum 'Diterima' atau 'ditolak'
        $mandiris = Mandiri::whereIn('status', ['Ditolak Unit', 'Diterima Unit' , 'Peserta mengundurkan diri'])->get();
        $postings = Posting::whereIn('status', ['Ditolak Unit', 'Diterima Unit' , 'Peserta mengundurkan diri'])->get();

        // Notifikasi
        // Menghitung jumlah entri dengan status "Ditolak Unit" atau "Diterima Unit" dari tabel Mandiri
        $newSeleksiCount = Mandiri::whereIn('status', ['Ditolak Unit', 'Diterima Unit' , 'Peserta mengundurkan diri'])->count() +
        Posting::whereIn('status', ['Ditolak Unit', 'Diterima Unit' , 'Peserta mengundurkan diri'])->count();

        // Simpan jumlah entri baru dengan status "Ditolak Unit" atau "Diterima Unit" di session untuk digunakan di view
        Session::put('newSeleksiCount', $newSeleksiCount);
       // Ambil semua unit_kerja dari tabel mandiri
       $mandiriUnits = DB::table('mandiri')->pluck('unit_kerja')->toArray();
       $postingUnits = DB::table('posting')->pluck('unit')->toArray();
       
       // Menggabungkan unit dari kedua tabel
       $allUnits = array_merge($mandiriUnits, $postingUnits);
       
       // Hilangkan karakter khusus dari nilai array unit_kerja
       $allUnits = array_map(function($unit) {
           return trim($unit, '[]\"\'');
       }, $allUnits);
       
       // Ambil data pekerja yang unit-nya sama dengan salah satu unit_kerja di tabel mandiri atau posting
       $pekerja = Pekerja::whereHas('pegawai', function ($q) {
           $q->where('role', 2); // Pastikan role pegawai adalah 2
       })
       ->where(function ($query) use ($allUnits) {
           $query->whereIn('unit', $allUnits);
       })
       ->get();
       
    
        $data = [
            'pegawais' => $pegawais, // Mengirim data pegawai
            'mandiris' => $mandiris,
            'postings' => $postings,
            'wawancaras' => $wawancaras,
            'data' => $data,
            'pekerja' => $pekerja,
            'prodi' => $prodi,
        ];
    
        return view('admin.seleksiakhir', $data);
    }
    public function pilihan(Request $request)
    {
        $pegawais = Pegawai::where('role','!=',3)->get();
        $mandiris = DB::table('mandiri')->get();
        $wawancaras = Wawancara::get();
        $postings = Posting::get();
        $data = Category::all();
        $prodi = Prodi::all(); 
        // Mengambil semua entri Mandiri yang belum 'Diterima' atau 'ditolak'
        $mandiris = Mandiri::whereIn('status', ['Proccess'])->get();

        // Mengambil semua entri Wawancara yang belum 'Diteruskan ke Unit' atau 'ditolak'
        $wawancaras = Wawancara::whereIn('status', ['Proccess'])->get();
        $postings = Posting::whereIn('status', ['Proccess'])->get();

        // Notifikasi
        // Mendapatkan jumlah entri yang memiliki status "Proccess" dari tabel Mandiri, Wawancara, dan Posting
        $newProccessCount = Mandiri::where('status', 'Proccess')->count() +
                            Wawancara::where('status', 'Proccess')->count() +
                            Posting::where('status', 'Proccess')->count();

        // Simpan jumlah entri baru dengan status "Proccess" di session untuk digunakan di view
        Session::put('newProccessCount', $newProccessCount);
        // End Notifikasi

        if ($request->has('search')) {
            $searchQuery = $request->search;
            $data = [
                'pegawais' => $pegawais,
                'mandiris' => Mandiri::where('name', 'like', '%' . $searchQuery . '%')
                                ->orWhere('status', 'like', '%' . $searchQuery . '%')
                                ->orWhere('jenis', 'like', '%' . $searchQuery . '%')
                                ->orWhere('universitas_sekolah', 'like', '%' . $searchQuery . '%')
                                ->orWhere('jurusan', 'like', '%' . $searchQuery . '%')
                                ->get(),
                'wawancaras' => Wawancara::where('name', 'like', '%' . $searchQuery . '%')
                                ->orWhere('status', 'like', '%' . $searchQuery . '%')
                                ->orWhere('jenis', 'like', '%' . $searchQuery . '%')
                                ->orWhere('universitas_sekolah', 'like', '%' . $searchQuery . '%')
                                ->orWhere('jurusan', 'like', '%' . $searchQuery . '%')
                                ->get(),
                'postings' => Posting::where('name', 'like', '%' . $searchQuery . '%')
                                ->orWhere('status', 'like', '%' . $searchQuery . '%')
                                ->orWhere('jenis', 'like', '%' . $searchQuery . '%')
                                ->orWhere('universitas_sekolah', 'like', '%' . $searchQuery . '%')
                                ->orWhere('jurusan', 'like', '%' . $searchQuery . '%')
                                ->get(),
                'data' => $data,
                'prodi' => $prodi,
            ];
        } else {
            $data = [
                'pegawais' => $pegawais,
                'mandiris' => $mandiris,
                'wawancaras' => $wawancaras,
                'postings' => $postings,
                'data' => $data,
                'prodi' => $prodi,
            ];
        }
    
        return view('admin.pilihan', $data); // Mengirim semua data ke view
    }
    public function posting(Request $request)
    {
        $pegawais = Pegawai::where('role','!=',3)->get();
        $postings = Posting::get();
        $postings = Posting::whereIn('status', ['Proccess'])->get();
        $data = Category::all();
        $prodi = Prodi::all(); 
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $data = [
                'pegawais' => $pegawais,
                // 'mandiris' => Mandiri::where('name', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('status', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('jenis', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('universitas_sekolah', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('jurusan', 'like', '%' . $searchQuery . '%')
                //                 ->get(),
                // 'wawancaras' => Wawancara::where('name', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('status', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('jenis', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('universitas_sekolah', 'like', '%' . $searchQuery . '%')
                //                 ->orWhere('jurusan', 'like', '%' . $searchQuery . '%')
                //                 ->get(),
                'postings' => Posting::where('name', 'like', '%' . $searchQuery . '%')
                                ->orWhere('status', 'like', '%' . $searchQuery . '%')
                                ->orWhere('jenis', 'like', '%' . $searchQuery . '%')
                                ->orWhere('universitas_sekolah', 'like', '%' . $searchQuery . '%')
                                ->orWhere('jurusan', 'like', '%' . $searchQuery . '%')
                                ->get(),
                'data' => $data,
                'prodi' => $prodi,
            ];
        } else {
            $data = [
                'pegawais' => $pegawais, // Mengirim data pegawai
                'postings' => $postings,
            ];
        }
        return view('admin.posting', $data);
    }
    public function administrator()
{
    $pegawais = Pegawai::where('role','!=',3)->get();
    
    // Ambil data terbaru yang memiliki status "Laporan Diterima" dan kolom "keterangan" null
    $laporan_akhirs = LaporanAkhir::whereIn('user_id', function ($query) {
        $query->select('user_id')
              ->from('laporan_akhir')
              ->where('status', 'Laporan Diterima')
              ->groupBy('user_id');
    })->whereNull('keterangan') // Filter hanya data dengan kolom "keterangan" null
      ->orderBy('created_at', 'desc')
      ->get();

    // Inisialisasi array untuk menyimpan data evaluasi
    $evaluasis = [];

    // Mengambil data evaluasi untuk setiap user_id laporan akhir
    foreach ($laporan_akhirs as $laporan_akhir) {
        // Mengambil evaluasi berdasarkan user_id laporan akhir
        $evaluasi = Evaluasi::where('user_id', $laporan_akhir->user_id)->first();

        // Jika evaluasi ditemukan, tambahkan ke array evaluasis
        if ($evaluasi) {
            $evaluasis[$laporan_akhir->user_id] = $evaluasi;
        }
    }

    return view('admin.administrator', compact('laporan_akhirs', 'evaluasis'));
}

public function pegawai(Request $request)
{
    // Mengambil data pegawai dengan join ke tabel pekerja dan menggunakan paginate
    $query = Pegawai::select('pegawais.*', DB::raw('pekerja.unit AS unit'), DB::raw('pekerja.id_unit AS id_unit'))
                    ->leftJoin('pekerja', 'pegawais.nip', '=', 'pekerja.nip');

    // Filter berdasarkan pencarian jika ada
    if ($request->has('search')) {
        $searchQuery = $request->search;
        $query->where(function ($q) use ($searchQuery) {
            $q->where('pegawais.nip', 'like', '%' . $searchQuery . '%')
                ->orWhere('pegawais.nama', 'like', '%' . $searchQuery . '%')
                ->orWhere('pegawais.role', 'like', '%' . $searchQuery . '%')
                ->orWhere('pekerja.unit', 'like', '%' . $searchQuery . '%');
        });
    }

    // Paginate hasil query
    $pegawais = $query->paginate(8);

    $data = Category::all();
    
    // Mengambil semua role
    $roles = Pegawai::distinct()->pluck('role');

    // Mengirim data pegawai dan role ke view
    return view('admin.pegawai', compact('pegawais', 'roles', 'data'));
}
public function peserta(Request $request)
{
    $pegawais = Pegawai::where('role','!=',3)->get();
    $mandiris = DB::table('mandiri')->get();
    $wawancaras = Wawancara::get();
    $postings = Posting::get();
    $data = Category::all();
    $prodi = Prodi::all(); 
    // // Mengambil semua entri Mandiri yang belum 'Diterima' atau 'ditolak'
    // $mandiris = Mandiri::whereIn('status', ['Peserta selesai magang'])->get();

    // // Mengambil semua entri Wawancara yang belum 'Diteruskan ke Unit' atau 'ditolak'
    // $wawancaras = Wawancara::whereIn('status', ['Peserta selesai magang'])->get();
    // $postings = Posting::whereIn('status', ['Peserta selesai magang'])->get();

    // Notifikasi
    // Mendapatkan jumlah entri yang memiliki status "Proccess" dari tabel Mandiri, Wawancara, dan Posting
    $newProccessCount = Mandiri::where('status', 'Peserta selesai magang')->count() +
                        Wawancara::where('status', 'Peserta selesai magang')->count() +
                        Posting::where('status', 'Peserta selesai magang')->count();

    // Simpan jumlah entri baru dengan status "Proccess" di session untuk digunakan di view
    Session::put('newProccessCount', $newProccessCount);
    // End Notifikasi

    if ($request->has('search')) {
        $searchQuery = $request->search;
        $data = [
            'pegawais' => $pegawais,
            'mandiris' => Mandiri::where('name', 'like', '%' . $searchQuery . '%')
                            ->orWhere('status', 'like', '%' . $searchQuery . '%')
                            ->orWhere('jenis', 'like', '%' . $searchQuery . '%')
                            ->orWhere('universitas_sekolah', 'like', '%' . $searchQuery . '%')
                            ->orWhere('jurusan', 'like', '%' . $searchQuery . '%')
                            ->get(),
            'wawancaras' => Wawancara::where('name', 'like', '%' . $searchQuery . '%')
                            ->orWhere('status', 'like', '%' . $searchQuery . '%')
                            ->orWhere('jenis', 'like', '%' . $searchQuery . '%')
                            ->orWhere('universitas_sekolah', 'like', '%' . $searchQuery . '%')
                            ->orWhere('jurusan', 'like', '%' . $searchQuery . '%')
                            ->get(),
            'postings' => Posting::where('name', 'like', '%' . $searchQuery . '%')
                            ->orWhere('status', 'like', '%' . $searchQuery . '%')
                            ->orWhere('jenis', 'like', '%' . $searchQuery . '%')
                            ->orWhere('universitas_sekolah', 'like', '%' . $searchQuery . '%')
                            ->orWhere('jurusan', 'like', '%' . $searchQuery . '%')
                            ->get(),
            'data' => $data,
            'prodi' => $prodi,
        ];
    } else {
        $data = [
            'pegawais' => $pegawais,
            'mandiris' => $mandiris,
            'wawancaras' => $wawancaras,
            'postings' => $postings,
            'data' => $data,
            'prodi' => $prodi,
        ];
    }

    return view('admin.peserta', $data); // Mengirim semua data ke view
}

    public function verifikasi()
    {
        $pegawais = Pegawai::where('role','!=',3)->get();
        return view('admin.verifikasi');
    }
    public function terimaPendaftaran(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => 'required', // Pastikan id ada
        'unit' => 'required|array', // Pastikan unit ada dan berupa array
    ]);

    // Ambil id dan unit_kerja dari permintaan
    $id = $request->id;
    $units = $request->unit;

    // Update status menjadi 'Diterima' dan unit_kerja sesuai dengan ID dan nilai formulir yang dipilih
    if (Mandiri::where('id', $id)->exists()) {
        $mandiri = Mandiri::find($id);
        $mandiri->status = 'Diteruskan ke Unit';
        $mandiri->unit_kerja = $units; // Menggunakan  untuk menyimpan array ke dalam database
        $mandiri->save();
    } elseif (Wawancara::where('id', $id)->exists()) {
        $wawancara = Wawancara::find($id);
        $wawancara->status = 'Diteruskan ke Unit';
        $wawancara->unit_kerja = $units; // Menggunakan json_encode untuk menyimpan array ke dalam database
        $wawancara->save();
    } else {
        return response()->json(['error' => 'ID tidak valid'], 404);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
public function terimaPendaftaranW(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => 'required', // Pastikan id ada
        'unit' => 'required|array', // Pastikan unit ada dan berupa array
    ]);

    // Ambil id dan unit_kerja dari permintaan
    $id = $request->id;
    $units = $request->unit;

    // Update status menjadi 'Diterima' dan unit_kerja sesuai dengan ID dan nilai formulir yang dipilih
    if (Wawancara::where('id', $id)->exists()) {
        $wawancara = Wawancara::find($id);
        $wawancara->status = 'Diteruskan ke Unit';
        $wawancara->unit_kerja = json_encode($units); // Menggunakan json_encode untuk menyimpan array ke dalam database
        $wawancara->save();
    } else {
        return response()->json(['error' => 'ID tidak valid'], 404);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
public function validasiPendaftaran(Request $request)
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
        'pegawai' => 'required', // Menambahkan validasi untuk nilai pegawai
        'berkas' => 'required|file|max:10240', // maksimum 10MB
    ]);

    // Ambil id dari permintaan
    $id = $request->id;
    $pegawai = $request->pegawai; // Ambil nilai pegawai dari permintaan

    // Update status menjadi 'Lolos seleksi Magang' atau 'Lolos seleksi Penelitian'
    if (Mandiri::where('id', $id)->exists()) {
        Mandiri::where('id', $id)->update(['status' => 'Lolos seleksi Magang', 'pegawai' => $pegawai]);
    } elseif (Wawancara::where('id', $id)->exists()) {
        Wawancara::where('id', $id)->update(['status' => 'Lolos seleksi Penelitian', 'pegawai' => $pegawai]);
    }

    // Mengelola berkas yang diunggah
    if ($request->hasFile('berkas')) {
        $berkas = $request->file('berkas');
        $berkasName = time() . '.' . $berkas->getClientOriginalExtension();
        $berkas->move(public_path('assets'), $berkasName);
        // Simpan nama berkas ke dalam kolom 'berkas' di database
        Mandiri::where('id', $id)->update(['berkas' => $berkasName]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}

    public function validasiPendaftaranW(Request $request)
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
        'berkas' => 'required|file|max:10240', // maksimum 10MB
    ]);

    // Ambil id dari permintaan
    $id = $request->id;

    // Update status menjadi 'Lolos seleksi Magang' atau 'Lolos seleksi Penelitian'
    if (Wawancara::where('id', $id)->exists()) {
        Wawancara::where('id', $id)->update(['status' => 'Lolos seleksi Penelitian']);
    } elseif (Wawancara::where('id', $id)->exists()) {
        Wawancara::where('id', $id)->update(['status' => 'Lolos seleksi Penelitian']);
    }

    // Mengelola berkas yang diunggah
    if ($request->hasFile('berkas')) {
        $berkas = $request->file('berkas');
        $berkasName = time() . '.' . $berkas->getClientOriginalExtension();
        $berkas->move(public_path('assets'), $berkasName);
        // Simpan nama berkas ke dalam kolom 'berkas' di database
        Wawancara::where('id', $id)->update(['berkas' => $berkasName]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
    }    
    
    public function validasiPendaftaranK(Request $request)
    {
            // Validasi permintaan
    $request->validate([
        'id' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!Mandiri::where('id', $value)->exists() && !Wawancara::where('id', $value)->exists() && !Posting::where('id', $value)->exists() ) {
                    $fail('The selected ID is invalid.');
                }
            },
        ],
        'pegawai' => 'required', // Menambahkan validasi untuk nilai pegawai
        'berkas' => 'required|file|max:10240', // maksimum 10MB
    ]);

    // Ambil id dari permintaan
    $id = $request->id;
    $pegawai = $request->pegawai; // Ambil nilai pegawai dari permintaan

    // Update status menjadi 'Lolos seleksi Magang' atau 'Lolos seleksi Penelitian'
    if (Posting::where('id', $id)->exists()) {
        Posting::where('id', $id)->update(['status' => 'Lolos seleksi Magang', 'pegawai' => $pegawai]);
    } elseif (Wawancara::where('id', $id)->exists()) {
        Wawancara::where('id', $id)->update(['status' => 'Lolos seleksi Penelitian']);
    }

    // Mengelola berkas yang diunggah
    if ($request->hasFile('berkas')) {
        $berkas = $request->file('berkas');
        $berkasName = time() . '.' . $berkas->getClientOriginalExtension();
        $berkas->move(public_path('assets'), $berkasName);
        // Simpan nama berkas ke dalam kolom 'berkas' di database
        Posting::where('id', $id)->update(['berkas' => $berkasName]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
    }


    public function teruskanPendaftaran(Request $request)
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
            Mandiri::where('id', $id)->update(['status' => 'Ditolak tahap 2']);
        } elseif (Wawancara::where('id', $id)->exists()) {
            Wawancara::where('id', $id)->update(['status' => 'Ditolak tahap 2']);
        }
    
        // Mengembalikan respons JSON
        return response()->json(['success' => true]);
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
            Mandiri::where('id', $id)->update(['status' => 'mengundurkan diri']);
        } elseif (Wawancara::where('id', $id)->exists()) {
            Wawancara::where('id', $id)->update(['status' => 'mengundurkan diri']);
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
            Posting::where('id', $id)->update(['status' => 'mengundurkan diri']);
        } elseif (Wawancara::where('id', $id)->exists()) {
            Wawancara::where('id', $id)->update(['status' => 'mengundurkan diri']);
        }
    
        // Mengembalikan respons JSON
        return response()->json(['success' => true]);
    }
    public function teruskanPendaftaranW(Request $request)
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
        if (Wawancara::where('id', $id)->exists()) {
            Wawancara::where('id', $id)->update(['status' => 'Ditolak tahap 2']);
        }
    
        // Mengembalikan respons JSON
        return response()->json(['success' => true]);
    }
public function tolakPendaftaran(Request $request)
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
            'status' => 'Ditolak tahap 1',
            'keterangan' => $keterangan,
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}

public function tolakPendaftaranW(Request $request)
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
            'status' => 'Ditolak tahap 1',
            'keterangan' => $keterangan,
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}
public function terimaPostingan(Request $request)
{
    // Validasi permintaan
    $request->validate([
        'id' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!Kriteria::where('id', $value)->exists()) {
                    $fail('The selected ID is invalid.');
                }
            },
        ],
    ]);

    // Ambil id dari permintaan
    $id = $request->id;

    // Update status menjadi 'diterima' untuk model yang sesuai dengan ID
    Kriteria::where('id', $id)->update(['status' => 'Pengajuan Diterima']);

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
}

public function tolakPostingan(Request $request)
{
    $request->validate([
        'id' => 'required|exists:kriterias,id',
        'keterangan' => 'required|string',
    ]);

    // Ambil id dan keterangan dari permintaan
    $id = $request->id;
    $keterangan = $request->keterangan;

    // Perbarui data pendaftaran dengan status 'Ditolak' dan keterangan
    $affectedRows = Kriteria::where('id', $id)
        ->update([
            'status' => 'Pengajuan Ditolak',
            'keterangan' => $keterangan,
        ]);

    // Jika tidak ada baris yang terpengaruh, tandai sebagai gagal
    if ($affectedRows === 0) {
        return response()->json(['success' => false]);
    }

    // Mengembalikan respons JSON
    return response()->json(['success' => true]);
    // Validasi permintaan
    
}

public function simpanNomorSertifikat(Request $request)
{
    // Periksa apakah ada setidaknya satu baris dalam tabel data_admin
    $adminCount = DataInti::count();

    // Jika tidak ada baris dalam tabel data_admin, kembalikan respons JSON dengan kegagalan
    if ($adminCount === 0) {
        return response()->json(['success' => false, 'message' => 'Tidak dapat menyimpan nomor sertifikat. Harap isi data kepala unit terlebih dahulu.']);
    }

    // Validasi permintaan
    $request->validate([
        'user_id' => 'required|exists:laporan_akhir,user_id', // Mengubah validasi untuk memeriksa user_id
        'nomor_sertifikat' => 'required|string',
    ]);

    // Ambil user_id dan nomor_sertifikat dari permintaan
    $userId = $request->user_id;
    $nomorSertifikat = $request->nomor_sertifikat;

    // Periksa apakah nomor sertifikat sudah ada dalam database untuk user_id tertentu
    $existingCertificate = LaporanAkhir::where('user_id', $userId)
        ->where('nomor_sertifikat', $nomorSertifikat)
        ->first();

    // Jika nomor sertifikat sudah ada, kembalikan respons JSON dengan kegagalan
    if ($existingCertificate) {
        return response()->json(['success' => false, 'message' => 'Nomor sertifikat sudah ada untuk pengguna ini.']);
    }

    // Perbarui data laporan akhir dengan nomor_sertifikat
    $affectedRows = LaporanAkhir::where('user_id', $userId)
        ->update([
            'nomor_sertifikat' => $nomorSertifikat,
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


}
