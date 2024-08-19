<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;
    protected $fillable = ['nama_instansi'];
    protected $table = 'namin';
    protected $primaryKey = 'id'; // atur primary key ke kolom "id"
    public $incrementing = true;

    public function Mandiri()
    {
        return $this->hasMany(Mandiri::class);
    }

    public function Wawancara()
    {
        return $this->hasMany(Wawancara::class);
    }
    public function prodi()
{
    return $this->hasMany(Prodi::class);
}
}

