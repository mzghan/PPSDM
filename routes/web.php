<?php

use App\Models\Penilaian;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Peserta\MagangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MandiriController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\WawancaraController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\SertifikatController;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/pegawai', function () {
    return view('welcome');
});

Route::get('/daftar',[AuthController::class,'loadDaftar']);
Route::post('/daftar',[AuthController::class,'daftar'])->name('daftar');
Route::get('/masuk',function(){
    return redirect('/pegawai');
});
Route::get('/pegawai',[AuthController::class,'loadMasuk']);
Route::post('/masuk',[AuthController::class,'masuk'])->name('masuk');
Route::get('/logout',[AuthController::class,'logout']);

// **** Super Admin Routes ***
Route::group(['prefix' => 'super-admin','middleware'=>['wab','isSuperAdmin']],function(){
    Route::get('/dashboard',[SuperAdminController::class,'dashboard']);

    Route::get('/users',[SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::get('/manage-role',[SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',[SuperAdminController::class,'updateRole'])->name('updateRole');
});

// **** Unit Kerja Routes ***
Route::group(['prefix' => 'sub-admin','middleware'=>['wab','isSubAdmin']],function(){
    Route::get('/dashboard',[SubAdminController::class,'dashboard']);

    Route::get('/input',[SubAdminController::class,'input'])->name('input');
    Route::get('/inputptn',[SubAdminController::class,'inputptn'])->name('inputptn');
    Route::post('/inputptn', [LaporanController::class, 'store'])->name('nilai.store');
    Route::get('/kriteria', [SubAdminController::class, 'kriteria'])->name('kriteria');
    Route::post('/kriteria/store', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('/laporan',[SubAdminController::class,'laporan'])->name('laporan');
    Route::get('/penilian',[SubAdminController::class,'penilaian'])->name('penilaian');
    Route::get('/peserta',[SubAdminController::class,'kehadiran']);
    
    Route::get('/seleksi',[SubAdminController::class,'seleksi'])->name('seleksi');
    // Di dalam file routes/web.php atau dalam file routes yang sesuai
    Route::get('/posisi', [SubAdminController::class, 'posisi'])->name('posisi.form');
    Route::get('/posisiM', [SubAdminController::class, 'posisiM'])->name('posisiM.form');
    Route::get('/posisiW', [SubAdminController::class, 'posisiW'])->name('posisiW.form');
    // Rute Menampilkan Posting
    Route::post('/posisi', [SubAdminController::class, 'posisiP'])->name('posisi.process');
    // Rute Menampilkan Mandiri
    Route::post('/posisi', [SubAdminController::class, 'posisiM'])->name('posisi.proses');
    // Rute Menampilkan Wawancara
    Route::post('/posisi', [SubAdminController::class, 'posisiW'])->name('posisi.proses');
    Route::get('/posisi/set/{id}', [SubAdminController::class, 'setPosisi'])->name('posisi.set');
    Route::get('/posisiP/set/{id}', [SubAdminController::class, 'setPosisiP'])->name('posisiP.set');
    Route::get('/posisiM/set/{id}', [SubAdminController::class, 'setPosisiM'])->name('posisiM.set');
    Route::get('/posisiW/set/{id}', [SubAdminController::class, 'setPosisiW'])->name('posisiW.set');
    
    Route::get('/download/{filename}', [SubAdminController::class, 'download'])->name('file.download');
    
    //TERIMA TOLAK MANDIRI            
    Route::post('/posisi/terima', [SubAdminController::class, 'terimaPendaftaran'])->name('posisi.terima');
    Route::post('/posisi/tolak', [SubAdminController::class, 'tolakPendaftaran'])->name('posisi.tolak');
    Route::post('/posisi/ajukan', [SubAdminController::class, 'perubahanTanggal'])->name('posisi.ajukan');
    Route::post('/posisi/konfirmasi', [SubAdminController::class, 'konfirmasiPendaftaran'])->name('posisi.konfirmasi');
    Route::post('/posisi/konfirmasiK', [SubAdminController::class, 'konfirmasiPendaftaranK'])->name('posisi.konfirmasiK');
    //TERIMA TOLAK POSTING
    Route::post('/posisi/terimaK', [SubAdminController::class, 'terimaPendaftaranK'])->name('posisi.terimaK');
    Route::post('/posisi/tolakK', [SubAdminController::class, 'tolakPendaftaranK'])->name('posisi.tolakK');
    Route::post('/posisi/ajukanK', [SubAdminController::class, 'perubahanTanggalK'])->name('posisi.ajukanK');
    //TERIMA TOLAK WAWANCARA
    Route::post('/posisi/terimaW', [SubAdminController::class, 'terimaPendaftaranW'])->name('posisi.terimaW');
    Route::post('/posisi/tolakW', [SubAdminController::class, 'tolakPendaftaranW'])->name('posisi.tolakW');
    Route::post('/posisi/ajukanW', [SubAdminController::class, 'perubahanTanggalW'])->name('posisi.ajukanW');
    Route::get('/nilailaporan',[SubAdminController::class,'nilailaporan'])->name('nilailaporan');
    Route::post('/nilailaporan/terima', [SubAdminController::class, 'terimaLaporan'])->name('laporan.terima');
    Route::post('/nilailaporan/revisi', [SubAdminController::class, 'revisiLaporan'])->name('laporan.revisi');
    
    Route::get('/download/{filename}', [SubAdminController::class, 'download'])->name('file.downloadNilai');
    
});

//route pdf

Route::get('generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF']);
// Definisi rute untuk mengunduh PDF
Route::get('/download-pdf/{laporan_id}', [PDFController::class, 'generatePDF'])->name('download-pdf');



// **** Admin Routes ***
Route::group(['prefix' => 'admin','middleware'=>['wab','isAdmin']],function(){
    Route::get('/homepage',[AdminController::class,'homepage']);

    Route::get('/administrator',[AdminController::class,'administrator'])->name('administrator');
    Route::get('/administrator',[AdminController::class,'administrator'])->name('administrator');
    Route::get('/homepage',[AdminController::class,'homepage'])->name('homepage');
    Route::get('/data',[AdminController::class,'data'])->name('data');
    Route::get('/peserta',[AdminController::class,'peserta'])->name('peserta');
    Route::get('/export-pegawai', [ExportController::class, 'exportPegawai'])->name('export.pegawai');
    Route::get('/export-peserta', [ExportController::class, 'exportPeserta'])->name('export.peserta');
    Route::get('/pegawai',[AdminController::class,'pegawai'])->name('pegawai');
        // Route untuk menyimpan (store) pegawai baru
    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
    // Rute untuk menghapus pegawai
    Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.delete');

    Route::post('/pegawai/ubah', [PegawaiController::class, 'update'])->name('pegawai.ubah');
    Route::post('/store-data', [DataController::class, 'store'])->name('store.data');
    Route::get('/kualifikasi',[AdminController::class,'kualifikasi'])->name('kualifikasi');
    Route::post('/kualifikasi/tolak', [AdminController::class, 'tolakPostingan'])->name('kualifikasi.tolak');
    Route::post('/kualifikasi/terima', [AdminController::class, 'terimaPostingan'])->name('kualifikasi.terima');

    Route::get('/download/{filename}', [AdminController::class, 'download'])->name('file.download');
    Route::post('/administrator/sertif', [AdminController::class, 'simpanNomorSertifikat'])->name('simpan.sertifikat');

    //tolak terima di mandiri
    Route::get('/mandiri',[AdminController::class,'mandiri'])->name('mandiri');
    Route::post('/mandiri/tolak', [AdminController::class, 'tolakPendaftaran'])->name('mandiri.tolak');
    Route::post('/mandiri/terima', [AdminController::class, 'terimaPendaftaran'])->name('mandiri.terima');
    //tolak terima di penelitian
    Route::get('/penelitian',[AdminController::class,'penelitian'])->name('penelitian');
    Route::post('/penelitian/tolakW', [AdminController::class, 'tolakPendaftaranW'])->name('penelitian.tolakW');
    Route::post('/penelitian/terimaW', [AdminController::class, 'terimaPendaftaranW'])->name('penelitian.terimaW');
    Route::get('/posting',[AdminController::class,'posting'])->name('posting');
    Route::get('/verifikasi',[AdminController::class,'posting'])->name('posting');
    //tolak terima di seleksi akhir
    Route::get('/seleksiakhir',[AdminController::class,'seleksiakhir'])->name('seleksiakhir');
    Route::post('/seleksiakhir/terima', [AdminController::class, 'validasiPendaftaran'])->name('seleksiakhir.terima');
    Route::post('/seleksiakhir/teruskan', [AdminController::class, 'teruskanPendaftaran'])->name('seleksiakhir.teruskan');
    Route::post('/seleksiakhir/konfirmasi', [AdminController::class, 'konfirmasiPendaftaran'])->name('seleksiakhir.konfirmasi');
    Route::post('/seleksiakhir/terimaW', [AdminController::class, 'validasiPendaftaranW'])->name('seleksiakhir.terimaW');
    Route::post('/seleksiakhir/teruskanW', [AdminController::class, 'teruskanPendaftaranW'])->name('seleksiakhir.teruskanW');
    Route::post('/seleksiakhir/terimaK', [AdminController::class, 'validasiPendaftaranK'])->name('seleksiakhir.terimaK');
    Route::post('/seleksiakhir/konfirmasiK', [AdminController::class, 'konfirmasiPendaftaranK'])->name('seleksiakhir.konfirmasiK');
    
    //tolak terima di pilihan
    Route::get('/pilihan', [AdminController::class, 'pilihan'])->name('pilihan');
    Route::post('/pilihan/tolak', [AdminController::class, 'tolakPendaftaran'])->name('pilihan.tolak');
    Route::post('/pilihan/terima', [AdminController::class, 'terimaPendaftaran'])->name('pilihan.terima');
    Route::post('/pilihan/tolakW', [AdminController::class, 'tolakPendaftaranW'])->name('pilihan.tolakW');
    Route::post('/pilihan/terimaW', [AdminController::class, 'terimaPendaftaranW'])->name('pilihan.terimaW');


});

// **** User Routes ***
Route::group(['middleware'=>['web','isUser']],function(){
    Route::get('/dashboard',[UserController::class,'dashboard']);
});


// Route Peserta

Auth::routes(['verify'=>true]);
Route::get('/login',[MagangController::class, 'login']);

Route::get('/',[MagangController::class, 'welcome'])->name('welcome');
Route::get('/redirect-to-gmail', [MagangController::class, 'redirectToGmail'])->name('redirect.to.gmail');
// tambahan 1


// Route::post('/magang/home', [MagangController::class, 'home'])->middleware('checkRequestMethod');
// Route::get('/magang/home', [MagangController::class, 'home'])->middleware('checkRequestMethod');

Route::post('/magang/beranda', [MagangController::class, 'beranda'])->middleware('checkRequestMethod');
Route::get('/magang/beranda', [MagangController::class, 'beranda'])->middleware('checkRequestMethod');
Route::get('/magang/hasil', [MagangController::class, 'hasil']);

Route::get('/download/{filename}', [MagangController::class, 'download'])->name('file.download');

Route::post('/magang/hasil/ajukan', [MagangController::class, 'terimaPerubahan'])->name('hasil.terimaajuan');
Route::post('/magang/hasil/ajukanW', [MagangController::class, 'terimaPerubahanW'])->name('hasil.terimaajuanW');
Route::post('/magang/hasil/ajukanK', [MagangController::class, 'terimaPerubahanK'])->name('hasil.terimaajuanK');

Route::post('/magang/hasil/lolos', [MagangController::class, 'terimaMagang'])->name('hasil.lolos');
Route::post('/magang/hasil/lolosW', [MagangController::class, 'terimaMagangW'])->name('hasil.lolosW');
Route::post('/magang/hasil/lolosK', [MagangController::class, 'terimaMagangK'])->name('hasil.lolosK');

Route::post('/magang/hasil/gagal', [MagangController::class, 'tolakMagang'])->name('hasil.gagal');
Route::post('/magang/hasil/gagalW', [MagangController::class, 'tolakMagangW'])->name('hasil.gagalW');
Route::post('/magang/hasil/gagalK', [MagangController::class, 'tolakMagangK'])->name('hasil.gagalK');

Route::post('/magang/hasil/tolakajukan', [MagangController::class, 'tolakPerubahan'])->name('hasil.tolakajuan');
Route::post('/magang/hasil/tolakajukanW', [MagangController::class, 'tolakPerubahanW'])->name('hasil.tolakajuanW');
Route::post('/magang/hasil/tolakajukanK', [MagangController::class, 'tolakPerubahanK'])->name('hasil.tolakajuanK');

Route::get('/magang/input', [MagangController::class, 'input']);
Route::get('/magang/magang', [MagangController::class, 'magang']);
Route::post('/mandiri/store', [MandiriController::class, 'store'])->name('mandiri.store');
Route::get('/magang/submit', [MagangController::class, 'submit']);
Route::get('/magang/wawancara', [MagangController::class, 'wawancara']);
Route::post('/wawancara/store', [WawancaraController::class, 'store'])->name('wawancara.store');
Route::get('/magang/apply', [MagangController::class, 'apply']);
Route::get('/magang/posisi', [MagangController::class, 'posisi']);
Route::get('/magang/apply/{id}', [MagangController::class, 'setApply']);
Route::get('/magang/absensi', [MagangController::class, 'kehadiran']);
Route::post('/absensi/store', [KehadiranController::class, 'store'])->name('absensi.store');
Route::get('/magang/assignment', [MagangController::class, 'assignment']);
Route::post('/update-lapstatus', [MagangController::class, 'updateLapstatus'])->name('update.lapstatus');
Route::post('/magang/assignment/submitK', [MagangController::class, 'submitLaporanK'])->name('pengumpulan.submitK');
Route::post('/magang/assignment/replace-file', [MagangController::class, 'replaceFile'])->name('replace.file');
Route::post('/magang/assignment', [LaporanController::class, 'submit'])->name('laporan.submit');
Route::get('/magang/daftar', [MagangController::class, 'daftar']);
Route::get('/magang/daftar/{id}', [MagangController::class, 'setDaftar']);
Route::post('/posting/store', [PostingController::class, 'store'])->name('posting.store');
Route::get('/magang/tatatertib', [MagangController::class, 'tatatertib']);
Route::get('/magang/sertifikat', [MagangController::class, 'sertifikat']);
Route::post('/sertifikat/store', [SertifikatController::class, 'store'])->name('sertifikat.store');
Route::get('/evaluasi/create', [EvaluasiController::class, 'create'])->name('evaluasi.create');
Route::post('/evaluasi', [EvaluasiController::class, 'store'])->name('evaluasi.store');

Route::post('/magang/sertifikat/selesai', [MagangController::class, 'selesaiMagang'])->name('magang.selesai');

Route::get('/sesi/logout',[MagangController::class, 'logout']);
Route::post('/sesi/login',[MagangController::class, 'login']);

Route::get('/test-404', function () {
    abort(404);
});
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::post('/login', 'LoginController@login')->name('login');


Auth::routes();

Route::get('/magang/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Verifikasi
Auth::routes();

Route::get('/magang/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// tambahan 3
// Route::get('/magang/home', function () {
//     $table = DB::table('kriterias')->get();
//     return view('home', ['table' => $table]);
// });