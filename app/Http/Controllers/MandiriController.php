<?php

namespace App\Http\Controllers;

use App\Models\Mandiri;
use App\Models\Wawancara;
use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Instansi;
use App\Models\Prodi;

class MandiriController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Mendapatkan data pengguna yang terautentikasi
            $userId = Auth::id();
            $userName = Auth::user()->name;
            $userEmail = Auth::user()->email;
            $userPhone = Auth::user()->phone;
            
            // Validasi data yang dikirimkan dari formulir
            $request->validate([
                // Tambahkan aturan validasi untuk setiap kolom formulir di sini
            ]);

            // Mendapatkan status terbaru dari user_id
            $latestStatus = collect([
                Mandiri::where('user_id', $userId)->latest('created_at')->first(),
                Wawancara::where('user_id', $userId)->latest('created_at')->first(),
                Posting::where('user_id', $userId)->latest('created_at')->first(),
            ])->filter()->sortByDesc('created_at')->first();

            // Jika status terbaru adalah "Ditolak tahap 1" atau "Ditolak tahap 2", izinkan pengguna untuk mendaftar lagi
            if ($latestStatus && in_array($latestStatus->status, ['Peserta selesai magang', 'Peserta mengundurkan diri', 'Mengundurkan diri', 'mengundurkan diri', 'Ditolak Unit', 'Ditolak tahap 1', 'Ditolak tahap 2'])) {
                // Izinkan pendaftaran
            }

            // Cek apakah user sudah mendaftar pada jenis lain dan status terbaru bukan "Ditolak tahap 1" atau "Ditolak tahap 2"
            $userAlreadyRegistered = Mandiri::where('user_id', $userId)->exists() ||
                Wawancara::where('user_id', $userId)->exists() ||
                Posting::where('user_id', $userId)->exists();

            // Jika user sudah mendaftar dan status terbaru bukan "Ditolak tahap 1" atau "Ditolak tahap 2", kembalikan pesan kesalahan
            if ($userAlreadyRegistered && !in_array($latestStatus->status, ['Peserta selesai magang', 'Peserta mengundurkan diri', 'Mengundurkan diri', 'mengundurkan diri', 'Ditolak Unit', 'Ditolak tahap 1', 'Ditolak tahap 2'])) {
                return redirect()->back()->with('error', 'Maaf, Anda sudah dalam proses pendaftaran. Silahkan periksa hasil pendaftaran Anda.');
            }

            // Tambahan validasi backend
            $validatedData = $request->validate([
                'instansi' => 'required|string|max:150', 
                'jurusan' => 'required|string|max:150',
                'proposal' => 'required|file|mimes:pdf|max:2048', // Hanya menerima file PDF maksimal 2MB
                'surat_pendukung' => 'required|file|mimes:pdf|max:2048', // Hanya menerima file PDF maksimal 2MB
            ]);
    
            $instansiName = $validatedData['instansi'];
            $jurusanName = $validatedData['jurusan'];
    
            // Cek apakah instansi sudah ada di database atau belum
            $existingInstansi = Instansi::where('nama_instansi', $instansiName)->first();
            $existingProdi = Prodi::where('nama_jurusan', $validatedData['jurusan'])->first();
    
            if (!$existingInstansi) {
                Instansi::create(['nama_instansi' => $validatedData['instansi']]);
            }
    
            if (!$existingProdi) {
                Prodi::create(['nama_jurusan' => $validatedData['jurusan']]);
            }
            
    
            $validator = Validator::make($request->all(), [
                'nik' => ['required', 'numeric', 'digits:16'],
                'nim' => ['required', 'numeric', 'digits_between:1,20'],
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }
            // End
            

            $mandiri = new Mandiri();
            $mandiri->user_id = $userId;
            $mandiri->name = $userName;
            $mandiri->email = $userEmail;
            $mandiri->phone = $userPhone;
            $mandiri->nik = $request->input('nik');
            $mandiri->nim = $request->input('nim');
            $mandiri->tingkatan = $request->input('tingkatan');
            $mandiri->universitas_sekolah = $request->input('instansi');
            // $mandiri->alamat_universitas_sekolah = $request->input('alamat_universitas_sekolah');
            $mandiri->jurusan = $request->input('jurusan');
            $mandiri->unit_kerja = $request->input('unit');
            $mandiri->durasi = $request->input('durasi');   
            $proposal = $request->file('proposal');
            $proposalName = uniqid() . '.' . $proposal->getClientOriginalExtension();
            $proposal->move(public_path('assets'), $proposalName);
            $mandiri->proposal = $proposalName;

            $suratPendukung = $request->file('surat_pendukung');
            $suratPendukungName = uniqid() . '.' . $suratPendukung->getClientOriginalExtension();
            $suratPendukung->move(public_path('assets'), $suratPendukungName);
            $mandiri->surat_pendukung = $suratPendukungName;
            
            $mandiri->tujuan_magang = $request->input('tujuan_magang');
            // $mandiri->tujuan_magang = pg_escape_string($request->input('tujuan_magang'));
            $mandiri->ilmu_yang_dicari = $request->input('ilmu_yang_dicari');
            $mandiri->output_setelah_magang = $request->input('output_setelah_magang');
            $mandiri->jenis = $request->input('jenis');    
            
            $mandiri->save();
            

        
            return redirect()->back()->with('success', 'Pendaftaran Mandiri berhasil');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Silahkan coba lagi.');
        }
    }
    public function show($id)
    {
        $mandiri = Mandiri::find($id);
        $userName = $mandiri->user->name;
        $userEmail = $mandiri->user->email;
        $userPhone = $mandiri->user->phone;

        return response()->json(['userName'=>$userName, 'userEmail'=>$userEmail,'userPhone'=>$userPhone]);
    }
    public function getUniversitas()
    {
        // Implementasi untuk mengambil data Universitas dari database
        $universitas = [
            ['id' => 1, 'nama_instansi' => 'Universitas Indonesia'],
            ['id' => 2, 'nama_instansi' => 'Universitas Negeri Jakarta'],
            ['id' => 3, 'nama_instansi' => 'Institut Teknologi Bandung'],
        ];

        return response()->json($universitas);
    }

    public function getSmk()
    {
        // Implementasi untuk mengambil data SMK dari database
        $smk = [
            ['id' => 4, 'nama_instansi' => 'SMK Negeri 2 Jakarta'],
            ['id' => 5, 'nama_instansi' => 'SMK Negeri 56 Jakarta'],
            ['id' => 6, 'nama_instansi' => 'SMK Pangudi Luhur Santo Yoseph'],
        ];

        return response()->json($smk);
    }
}
