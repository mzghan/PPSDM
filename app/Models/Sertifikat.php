<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    public $table = "sertifikat";
    protected $fillable = [
    'user_id',
    'name',
    'nim',
    'jurusan',
    'unit_kerja',
    'waktu_mulai',
    'waktu_selesai',
    'nilai',
    'nosertif',
    'kepala',
    'nip',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
