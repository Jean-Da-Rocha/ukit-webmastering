<?php

namespace App\Actions;

use App\Models\Project;

use Carbon\Carbon;

class TasksCalculation
{
    /**
     * Return the total tasks time for the given project.
     *
     * @param  Project  $project
     * @return string
     */
    public function getTotalTasksTime(Project $project)
    {
        return $this->calculateTotalTasksTime($project);
    }

    /**
     * Calculate the total tasks time for the given project
     * and format the result.
     *
     * @param  Project  $project
     * @return string
     */
    public function calculateTotalTasksTime(Project $project)
    {
        if ($project->tasks->count() <= 0) {
            return '00 h 00 min';
        }

        $totalTasksTimeInSeconds = $project->tasks->sum(
            fn ($task) => Carbon::parse($task->task_duration)->diffInSeconds('00:00:00')
        );

        return $this->setTimeFormat($totalTasksTimeInSeconds);
    }

    /**
     * Set a format for the given total time in seconds
     * obtained for a project (format: hours h : minutes min).
     *
     * @param  int  $totalTimeInSeconds
     * @return string
     */
    private function setTimeFormat(int $totalTimeInSeconds)
    {
        return floor($totalTimeInSeconds / 3600) . ' h '
            . floor(($totalTimeInSeconds % 3600) / 60) . ' min';
    }
}
