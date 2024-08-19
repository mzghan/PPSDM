<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $fillable = ['nama_jurusan'];
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function Mandiri()
    {
        return $this->hasMany(Mandiri::class);
    }

    public function Wawancara()
    {
        return $this->hasMany(Wawancara::class);
    }
    public function instansi()
    {
    return $this->belongsTo(Instansi::class);
    }
}
