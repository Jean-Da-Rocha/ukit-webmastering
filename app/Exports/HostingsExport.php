<?php

namespace App\Exports;

use App\Models\Hosting;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class HostingsExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
     * Set the exported data.
     *
     * @return Collection
     */
    public function collection(): Collection
    {
        return Hosting::with('customer:id,designation')
            ->with('project:id,name')
            ->with('server:id,name')
            ->with('billingStatus:id,name')
            ->get();
    }

    /**
     * Map the data that needs to be added as a row.
     *
     * @param  mixed  $hosting
     * @return array
     */
    public function map($hosting): array
    {
        return [
            $hosting->id,
            $hosting->customer->designation,
            $hosting->project->name ?? '-',
            $hosting->domain_name,
            $hosting->server->name,
            $hosting->renewal_date,
            $hosting->billingStatus->name,
            $hosting->domain_managing === 1 ? 'Yes' : 'No',
            $hosting->pricing . ' €',
            $hosting->comment,
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
            'Customer',
            'Project name',
            'Domain name',
            'Server',
            'Date renewal',
            'Status',
            'Domain managing',
            'Price',
            'Comment'
        ];
    }
}
