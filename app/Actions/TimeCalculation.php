<?php

namespace App\Actions;

use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;

class TimeCalculation
{
    /**
     * @var Model
     */
    private Model $model;

    /**
     * Authorized models for
     * total taks time calculation.
     *
     * @var array
     */
    private array $authorized = [
        Project::class,
        User::class,
    ];

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Return the total time spent on tasks
     * for the given model.
     *
     * @param  Project|User  $model
     * @return string
     *
     * @throws Exception
     */
    public function getTotalTasksTime()
    {
        if (in_array(get_class($this->model), $this->authorized)) {
            return $this->calculateTotalTasksTime();
        }

        throw new Exception(
            'The provided $model does not correspond to a Project or User model'
        );
    }

    /**
     * Business logic to calculate the total time spent on tasks.
     *
     * @return string
     */
    private function calculateTotalTasksTime()
    {
        if ($this->model->tasks->count() <= 0) {
            return '00 h 00 min';
        }

        $totalTasksTimeInSeconds = $this->model->tasks->sum(
            fn ($task) => Carbon::parse($task->duration)->diffInSeconds('00:00:00')
        );

        return $this->setTimeFormat($totalTasksTimeInSeconds);
    }

    /**
     * Set a format for the given total time in seconds
     * (format: hours h : minutes min).
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
