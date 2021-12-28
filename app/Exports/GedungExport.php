<?php

namespace App\Exports;

use App\Models\Gedung;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class GedungExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gedung::all();
    }
    public function headings(): array
    {
        return[
            '#',
            'Wilayah',
            'Nama Gedung',
            'Alamat',
            'No. Telp',
            'Klasifikasi',
            'Nama FSM',
            'Struktur MKKG',
            'Foto Profile',
            'Keterangan',
            'Surat Keterangan Peatihan',
            'Foto Dokumentasi',
        ];
    }
    public function map($gedung): array{
        return [
            $gedung->id,
            $gedung->wilayah,
            $gedung->nama_gedung,
            $gedung->alamat,
            $gedung->nomor_telp,
            $gedung->klasifikasi,
            $gedung->nama_fsm,
            $gedung->struktur_mkkg,
            $gedung->foto_profile,
            $gedung->keterangan,
            $gedung->surat_keterangan_pelatihan,
            $gedung->foto_dokumentasi
                ];
    }
}
