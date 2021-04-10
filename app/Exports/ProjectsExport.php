<?php

namespace App\Exports;

use App\Actions\TimeCalculation;
use App\Models\Project;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProjectsExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
     * Set the exported data.
     *
     * @return Collection
     */
    public function collection(): Collection
    {
        return Project::with('customer:id,designation')
            ->with('category:id,type')
            ->get();
    }

    /**
     * Map the data that needs to be added as a row.
     *
     * @param  mixed  $project
     * @return array
     */
    public function map($project): array
    {
        return [
            $project->id,
            $project->name,
            $project->category->type,
            $project->starting_date,
            $project->customer->designation,
            (new TimeCalculation($project))->getTotalTasksTime(),
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
            'Project name',
            'Category',
            'Starting date',
            'Customer',
            'Total task time'
        ];
    }
}
