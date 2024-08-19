<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInti extends Model
{
    use HasFactory;
    protected $table = 'data_admin';
    protected $fillable = ['kepala_unit', 'nip', 'tanda_tangan'];
}
