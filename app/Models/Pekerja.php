<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pekerja extends Model
{
    protected $table = 'pekerja';
    protected $primaryKey = 'nip';
    protected $fillable = [
        'nama',
        'nip',
        'unit',
        'id_unit',
    ];

    // Mendefinisikan relasi "belongsTo" dengan model Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nip', 'nip');
    }
    public function kriteria(): HasMany
    {
        return $this->hasMany(Kriteria::class, 'pekerja_id');
    }

}
