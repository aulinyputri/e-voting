<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return user::where('role', 'user')->whereNotNull('password')->get();
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
