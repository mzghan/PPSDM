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

class WawancaraController extends Controller
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
            if ($latestStatus && in_array($latestStatus->status, ['Ditolak tahap 1', 'Ditolak tahap 2', 'Peserta mengundurkan diri'])) {
                // Izinkan pendaftaran
            }

            // Cek apakah user sudah mendaftar pada jenis lain dan status terbaru bukan "Ditolak tahap 1" atau "Ditolak tahap 2"
            $userAlreadyRegistered = Mandiri::where('user_id', $userId)->exists() ||
                Wawancara::where('user_id', $userId)->exists() ||
                Posting::where('user_id', $userId)->exists();

            // Jika user sudah mendaftar dan status terbaru bukan "Ditolak tahap 1" atau "Ditolak tahap 2", kembalikan pesan kesalahan
            if ($userAlreadyRegistered && !in_array($latestStatus->status, ['Ditolak tahap 1', 'Ditolak tahap 2', 'Peserta mengundurkan diri'])) {
                return redirect()->back()->with('error', 'Maaf, Anda sudah dalam proses pendaftaran. Silahkan periksa hasil pendaftaran Anda.');
            }

            // Tambahan validasi backend
            $validatedData = $request->validate([
                'instansi' => 'required|string|max:150', 
                'jurusan' => 'required|string|max:150',
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


            // Simpan data pendaftaran
            $wawancara = new Wawancara();
            $wawancara->user_id = $userId;
            $wawancara->name = $userName;
            $wawancara->email = $userEmail;
            $wawancara->phone = $userPhone;
            $wawancara->nik = $request->input('nik');
            $wawancara->nim = $request->input('nim');
            $wawancara->universitas_sekolah = $request->input('instansi');
            $wawancara->alamat_universitas_sekolah = $request->input('alamat_universitas_sekolah');
            $wawancara->tingkatan = $request->input('tingkatan');
            $wawancara->jurusan = $request->input('jurusan');
            $wawancara->tanggal = $request->input('tanggal');
            $wawancara->judul_penelitian = $request->input('judul_penelitian');
            $wawancara->pkt_integritas = $request->input('pkt_integritas');

            $pkt_integritas = $request->file('pkt_integritas');
            $pkt_integritasName = time() . '.' . $pkt_integritas->getClientOriginalExtension();
            $pkt_integritas->move(public_path('assets'), $pkt_integritasName);
            $wawancara->pkt_integritas = $pkt_integritasName;

            $proposal = $request->file('proposal');
            $proposalName = time() . '.' . $proposal->getClientOriginalExtension();
            $proposal->move(public_path('assets'), $proposalName);
            $wawancara->proposal = $proposalName;
            
            $suratPendukung = $request->file('surat_pendukung');
            $suratPendukungName = time() . '.' . $suratPendukung->getClientOriginalExtension();
            $suratPendukung->move(public_path('assets'), $suratPendukungName);
            $wawancara->surat_pendukung = $suratPendukungName;
            $wawancara->jenis = $request->input('jenis');

            $wawancara->save();

            return redirect()->back()->with('success', 'Pendaftaran Penelitian berhasil');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Silahkan coba lagi.');
        }
    }
    public function show($id)
    {
        $wawancara = Wawancara::find($id);
        $userName = $wawancara->user->name;
        $userEmail = $wawancara->user->email;
        $userPhone = $wawancara->user->phone;

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
