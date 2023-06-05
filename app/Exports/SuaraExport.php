<?php

namespace App\Exports;

use App\Suara;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SuaraExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Suara::all();
    }

    public function headings(): array
    {
        return [
            'Nama Pemilih',
            'NIM',
            'Nama Kandidat',
            'Waktu Meilih',
        ];
    }

    public function map($suara): array
    {
        return [
            $suara->user->name,
            $suara->user->nim,
            '****************',
            $suara->created_at,
        ];
    }
}
