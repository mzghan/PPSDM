<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    public $table = "wawancara";
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'nik',
        'nim',
        'tingkatan',
        'universitas_sekolah',
        'alamat_universitas_sekolah',
        'jurusan',
        'tanggal',
        'judul_penelitian',
        'pkt_integritas',
        'proposal',
        'surat_pendukung',
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
