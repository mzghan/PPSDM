<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = [
        'user_id',
        'nilai_rata_rata',
        'hasil_nilai',
        'kesan',
        'saran',
    ];

    // Relasi dengan model LaporanAkhir// Dalam model Nilai
        public function laporanAkhir()
        {
            return $this->belongsTo(LaporanAkhir::class, 'laporan_akhir_id', 'user_id');
        }

}
