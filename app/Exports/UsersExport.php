<?php

namespace App\Exports;

use App\Models\Pegawai;
use App\Models\Pekerja;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        // Gabungkan data dari kedua tabel berdasarkan NIP
        $mergedCollection = DB::table('pegawais')
            ->leftJoin('pekerja', 'pegawais.nip', '=', 'pekerja.nip')
            ->select(
                'pegawais.id',
                'pegawais.role',
                'pegawais.nip',
                'pegawais.nama',
                'pekerja.unit',
                'pekerja.id_unit'
            )
            ->get();

        return $mergedCollection;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Role',
            'NIP',
            'Nama',
            'Unit',
            'ID Unit',
        ];
    }
}