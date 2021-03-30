<?php

namespace App\Http\Views\Composers;

use App\Actions\ProgressBarCalculation;
use App\Models\Task;
use Illuminate\View\View;

class TaskComposer extends ProgressBarComposer
{
    /**
     * Instantiate the ProgressBar action class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->progressBar = new ProgressBarCalculation(new Task());
    }

    /**
     * {@inheritdoc}
     */
    public function compose(View $view)
    {
        $this->putToCache($view, 'newTasks', 'getCount');
        $this->putToCache($view, 'newTasksPercentage', 'getPercentage');
    }
}
