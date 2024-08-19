<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $namins = [
            'Universitas Negeri Jakarta',
            'Universitas Negeri Semarang',
            'Universitas Indonesia',
            'Universitas Negeri Jambi',
            'Universitas Negeri Jember',
            'Sekolah Menengah Kejuruan Negeri 8 Jakarta'
        ];
        $instansi = [];
        foreach ($namins as $item) {
            $instansi[] = [
                'nama_instansi' => $item,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    
        DB::table('namin')->insert($instansi);
    }
}
