<?php

namespace App\Http\Views\Composers;

use App\Actions\ProgressBarCalculation;
use App\Models\Hosting;
use Illuminate\View\View;

class HostingComposer extends ProgressBarComposer
{
    /**
     * Instantiate the ProgressBar action class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->progressBar = new ProgressBarCalculation(new Hosting());
    }

    /**
     * {@inheritdoc}
     */
    public function compose(View $view)
    {
        $this->putToCache($view, 'newHostings', 'getCount');
        $this->putToCache($view, 'newHostingsPercentage', 'getPercentage');
    }
}
