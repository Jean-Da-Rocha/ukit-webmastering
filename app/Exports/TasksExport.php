<?php

namespace App\Exports;

use App\Models\Task;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TasksExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
     * Set the exported data.
     *
     * @return Collection
     */
    public function collection(): Collection
    {
        return Task::with('project:id,name')
            ->with('user:id,username')
            ->get();
    }

    /**
     * Map the data that needs to be added as a row.
     *
     * @param  mixed  $task
     * @return array
     */
    public function map($task): array
    {
        return [
            $task->id,
            $task->name,
            $task->project->name,
            $task->user->username,
            $task->duration,
            $task->starting_date,
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
            'Task name',
            'Project name',
            'User',
            'Task duration',
            'Task starting date'
        ];
    }
}
