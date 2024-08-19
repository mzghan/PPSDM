<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    public $table = "evaluasi";
    protected $fillable = [
        'user_id',
        'nilai1',
        'nilai2',
        'nilai3',
        'nilai4',
        'nilai5',
        'saran',
        'masukan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
