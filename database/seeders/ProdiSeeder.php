<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodi = [
            'Pendidikan Teknik Informatika dan Komputer',
            'Pendidikan Teknik Elektronika',
            'Akuntansi',
            'Sistem Teknologi Informasi',
            'Pendidikan Teknik Elektro',
            'Farmasi',
            'Ilmu Komputer'
        ];
        $jurusan = [];
        foreach ($prodi as $item) {
            $jurusan[] = [
                'nama_jurusan' => $item,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    
        DB::table('prodi')->insert($jurusan);
    }
}
