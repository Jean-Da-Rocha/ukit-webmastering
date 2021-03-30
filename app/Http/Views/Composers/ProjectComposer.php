<?php

namespace App\Http\Views\Composers;

use App\Actions\ProgressBarCalculation;
use App\Models\Project;
use Illuminate\View\View;

class ProjectComposer extends ProgressBarComposer
{
    /**
     * Instantiate the ProgressBar action class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->progressBar = new ProgressBarCalculation(new Project());
    }

    /**
     * {@inheritdoc}
     */
    public function compose(View $view)
    {
        $this->putToCache($view, 'newProjects', 'getCount');
        $this->putToCache($view, 'newProjectsPercentage', 'getPercentage');
    }
}
