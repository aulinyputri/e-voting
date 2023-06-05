<?php

namespace App\Exports;

use App\user;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DatabaseExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return user::whereNull('password')->get();
    }

    public function headings(): array
    {
        return [
            'NIM',
            'Nama',
            'Email',
            'No HP',
        ];
    }

    public function map($user): array
    {
        return [
            $user->nim,
            $user->name,
            $user->email,
            $user->phone_number
        ];
    }
}
