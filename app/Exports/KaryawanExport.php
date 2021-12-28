<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KaryawanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pegawai::all();
    }
    public function headings(): array
    {
        return[
            '#',
            'NIP',
            'Nama Lengkap',
            'Email',
            'Jabatan',
            'Jenis Kelamin',
            'Tempat Tugas',
            'Wilayah',
            'Foto Profile',
        ];
    }
    public function map($pegawai): array{
        return [
            $pegawai->id,
            $pegawai->NIP,
            $pegawai->nama_lengkap,
            $pegawai->email,
            $pegawai->jabatan,
            $pegawai->jenis_kelamin,
            $pegawai->tempat_tugas,
            $pegawai->wilayah,
            $pegawai->foto_profile,
                ];
    }
}
