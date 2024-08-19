<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriterias';
    protected $fillable = [
        'posisi',
        'timeline',
        'durasi',
        'tingkatan',
        'jurusan',
        'desk_pekerjaan',
    ];
}
