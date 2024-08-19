<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LaporanAkhir extends Model
{
    use HasFactory;

    protected $table = 'laporan_akhir';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'status_pengumpulan',
        'status_penilaian',
        'terakhir_diubah',
        'unit',
        'nik',
        'nim',
        'jurusan',
        'tingkatan',
        'posisi',
        'universitas_sekolah',
        'durasi',
        'pengumpulan_laporan',
        'nilai_rata_rata',
        'hasil_nilai',
        'kesan',
        'saran',
    ];

    protected $casts = [
        'terakhir_diubah' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Definisikan relasi dengan tabel Posting
    public function postings()
    {
        return $this->hasMany(Posting::class, 'user_id', 'user_id');
    }
    // Definisikan relasi satu-satu dengan model Nilai
    public function nilai()
    {
        return $this->hasOne(Nilai::class);
    }
}
