<?php

namespace App\Exports;

use App\Models\Task;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\{FromCollection, ShouldAutoSize, WithHeadings, WithMapping};

class ProjectTasksExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
     * @var array
     */
    private array $selectColumns = [
        'id',
        'name',
        'description',
        'starting_date',
        'duration',
        'project_id',
        'user_id',
    ];

    /**
     * Set the exported data.
     *
     * @return Collection
     */
    public function collection(): Collection
    {
        return Task::select($this->selectColumns)
            ->with('user:id,username')
            ->where('project_id', $this->project_id)
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
            $task->user->username,
            $task->description,
            $task->starting_date,
            format_time($task->duration),
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
            'Task author',
            'Task description',
            'Task starting date',
            'Time spent on this task'
        ];
    }
}
