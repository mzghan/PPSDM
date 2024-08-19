<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mandiri extends Model
{
    public $table = "mandiri";
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'nik',
        'nim',
        'tingkatan',
        'universitas_sekolah',
        // 'alamat_universitas_sekolah',
        'jurusan',
        'unit_kerja',
        'durasi',
        'proposal',
        'surat_pendukung',
        'tujuan_magang',
        'ilmu_yang_dicari',
        'output_setelah_magang',
        'jenis',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function Tingkat()
    {
        return $this->belongsTo(Tingkat::class);
    }

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

}