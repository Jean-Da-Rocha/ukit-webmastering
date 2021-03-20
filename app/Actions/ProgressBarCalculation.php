<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;

class ProgressBarCalculation
{
    /** @var Model */
    private Model $model;

    /**
     * Instantiate the ProgressBarCalculation service class.
     *
     * @param  Model  $model
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Count the number of newly created entity
     * for the current month.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->model::whereBetween('created_at', [
            now()->startOfMonth(), now()->endOfMonth(),
        ])->count();
    }

    /**
     * Get the progress bar percentage as float.
     *
     * @return float
     */
    public function getPercentage()
    {
        return ceil(
            ($this->getCount() * $this->model::count()) / 100
        );
    }
}
