<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Posting extends Model
{
    public $table = "posting";
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'unit',
        'posisi',
        'nik',
        'nim',
        'universitas_sekolah',
        // 'alamat_universitas_sekolah',
        // 'timeline',
        'durasi',
        'tujuan_magang',
        'ilmu_yang_dicari',
        'output_setelah_magang',
        'proposal',
        'surat_pendukung',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function laporanAkhir()
    {
        return $this->hasOne(LaporanAkhir::class, 'user_id', 'user_id');
    }
}
