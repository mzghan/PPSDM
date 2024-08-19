<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TingkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tingkats = [
            [1, 'Sekolah Menengah Kejuruan'],
            [2, 'Perguruan Tinggi'],
        ];
        $tingkatan = [];
        foreach ($tingkats as $item) {
            $tingkatan[] = [
                'id' => $item[0],
                'nama_tingkat' => $item[1],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tingkat')->insert($tingkatan);
    }
}
