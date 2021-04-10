<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
     * Set the exported data.
     *
     * @return Collection
     */
    public function collection(): Collection
    {
        return User::with('role:id,name')
            ->select('id', 'username', 'email', 'role_id')
            ->get();
    }

    /**
     * Map the data that needs to be added as a row.
     *
     * @param  mixed  $user
     * @return array
     */
    public function map($user): array
    {
        return [
            $user->id,
            $user->username,
            $user->email,
            $user->role->name,
        ];
    }

    /**
     * Set the headings for the exported excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'Username',
            'Email',
            'Role'
        ];
    }
}
