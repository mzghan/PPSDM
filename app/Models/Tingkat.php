<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    use HasFactory;
    protected $table = 'tingkat';

    public function Mandiri()
    {
        return $this->hasMany(Mandiri::class);
    }

    public function Wawancara()
    {
        return $this->hasMany(Wawancara::class);
    }
}
