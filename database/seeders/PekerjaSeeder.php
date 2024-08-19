<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PekerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("pekerja")->insert([
            'nip' => '198703172010121003',
            'nama' => 'Wikan Yogi Pratomo, SE',
            'unit'=> 'Inspektorat I',
            'id_unit' => '10102'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '199308272022032002',
            'nama' => 'Sarah Olivia, S.E.',
            'unit'=> 'Inspektorat II',
            'id_unit' => '10103'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '199609032020121005',
            'nama' => 'Fajar Fachrudin, S.E',
            'unit'=> 'Biro Sumber Daya Manusia',
            'id_unit' => '10204'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '198405242006042003',
            'nama' => 'Rani Pamungkas, SAP',
            'unit'=> 'Biro Umum',
            'id_unit' => '10205'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '198312292006042001',
            'nama' => 'Ghina Sophia Azmi, S.Si, M.Si',
            'unit'=> 'Direktorat Registrasi Obat',
            'id_unit' => '10306'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '198710312023211011',
            'nama' => 'Atep Dwi Pamungkas, A.Md',
            'unit'=> 'Direktorat Pengawasan Obat Tradisional dan Suplemen Kesehatan',
            'id_unit' => '10403'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '198104032005012001',
            'nama' => 'Kemala S Nagur, S.Si., M.Si',
            'unit'=> 'Pusat Pengembangan Pengujian Obat dan Makanan Nasional',
            'id_unit' => '106'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '199011262018011001',
            'nama' => 'Hendrizal, S.Kom',
            'unit'=> 'Pusat Pengembangan Sumber Daya Manusia Pengawasan Obat dan Makanan',
            'id_unit' => '107'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '199508232022032001',
            'nama' => 'Lia Ristiyanti, S.SI',
            'unit'=> 'Pusat Pengembangan Sumber Daya Manusia Pengawasan Obat dan Makanan',
            'id_unit' => '107'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '199411132019032005',
            'nama' => 'Khiratul Azizi, S.Farm, Apt',
            'unit'=> 'Pusat Pengembangan Sumber Daya Manusia Pengawasan Obat dan Makanan',
            'id_unit' => '107'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '199406052019032004',
            'nama' => 'dr. Belda Evina',
            'unit'=> 'Pusat Pengembangan Sumber Daya Manusia Pengawasan Obat dan Makanan',
            'id_unit' => '107'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '199503142019031003',
            'nama' => 'Rian Kurniawan, A.Md.',
            'unit'=> 'Pusat Analisis Kebijakan Obat dan Makanan',
            'id_unit' => '108'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '197110311999032001',
            'nama' => 'Judhi Saraswati, SP,MKM',
            'unit'=> 'Pusat Data dan Informasi Obat dan Makanan',
            'id_unit' => '109'
        ]);
        DB::table("pekerja")->insert([
            'nip' => '199304042018011001',
            'nama' => 'Ryan Amdiar, SE',
            'unit'=> 'Direktorat Siber Obat dan Makanan',
            'id_unit' => '11004'
        ]);
    }
}
