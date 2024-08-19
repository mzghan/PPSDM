<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table("pegawais")->insert([
            'nama' => 'Khiratul Azizi, S.Farm, Apt',
            'nip' => '199411132019032005',
            'role'=> '2',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'dr. Belda Evina',
            'nip' => '199406052019032004',
            'role'=> '2',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'Lia Ristiyanti, S.SI',
            'nip' => '199508232022032001',
            'role'=> '3',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'Hendrizal, S.Kom',
            'nip' => '199011262018011001',
            'role'=> '3',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'Wikan Yogi Pratomo, SE',
            'nip' => '198703172010121003',
            'role'=> '2',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'Sarah Olivia, S.E.',
            'nip' => '199308272022032002',
            'role'=> '2',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'Fajar Fachrudin, S.E',
            'nip' => '199609032020121005',
            'role'=> '2',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'Rani Pamungkas, SAP',
            'nip' => '198405242006042003',
            'role'=> '2',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'Ghina Sophia Azmi, S.Si, M.Si',
            'nip' => '198312292006042001',
            'role'=> '2',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'Atep Dwi Pamungkas, A.Md',
            'nip' => '198710312023211011',
            'role'=> '2',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'Kemala S Nagur, S.Si., M.Si',
            'nip' => '198104032005012001',
            'role'=> '2',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'Rian Kurniawan, A.Md.',
            'nip' => '199503142019031003',
            'role'=> '2',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'Judhi Saraswati, SP,MKM',
            'nip' => '197110311999032001',
            'role'=> '2',
            'password' => Hash::make('coba1234'),
        ]);
        DB::table("pegawais")->insert([
            'nama' => 'Ryan Amdiar, SE',
            'nip' => '199304042018011001',
            'role'=> '2',
            'password' => Hash::make('coba1234'),
        ]);

        $this->call(InstansiSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(TingkatSeeder::class);
        $this->call(UnitKerjaSeeder::class);
        $this->call(PekerjaSeeder::class);
    }
}