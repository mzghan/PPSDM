<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Kehadiran extends Model
{
    public $table = "kehadiran";
    protected $fillable = [
        'user_id',
        'unit',
        'name',
        'tanggal',
        'presensi',
        'jam_hadir',
        'keterangan',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kehadiran) {
            // Mengambil pengguna yang sedang login
            $user = Auth::user();
            if ($user) {
                // Set tanggal kehadiran menjadi tanggal saat ini
                $kehadiran->tanggal = now()->toDateString();
                // Set user_id dan name berdasarkan pengguna yang sedang login
                $kehadiran->user_id = $user->id;
                $kehadiran->name = $user->name;
                $kehadiran->jam_hadir = Carbon::now()->timezone('Asia/Jakarta')->format('H:i:s');
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getJamHadirAttribute($value)
    {
        // Tetap gunakan fungsi Carbon untuk memformat waktu yang disimpan dalam database
        return Carbon::parse($value)->format('H:i:s');
    }
}
