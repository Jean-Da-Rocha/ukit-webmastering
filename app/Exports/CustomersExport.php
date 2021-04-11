<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class CustomersExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithColumnFormatting
{
    /**
     * @var array
     */
    private array $selectAttributes = [
        'id',
        'society_name',
        'address',
        'city',
        'zip_code',
        'phone_number',
        'email'
    ];

    /**
     * Set the exported data.
     *
     * @return Collection
     */
    public function collection(): Collection
    {
        return Customer::select($this->selectAttributes)->get();
    }

    /**
     * Map the data that needs to be added as a row.
     *
     * @param  mixed  $customer
     * @return array
     */
    public function map($customer): array
    {
        return [
            $customer->id,
            $customer->society_name,
            $customer->full_address,
            $customer->phone_number,
            $customer->email,
        ];
    }

    /**
     * Format specific columns for the spreadsheet.
     *
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'D' =>  '0',
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
            'Society name',
            'Full address',
            'Phone number',
            'Customer email'
        ];
    }
}
