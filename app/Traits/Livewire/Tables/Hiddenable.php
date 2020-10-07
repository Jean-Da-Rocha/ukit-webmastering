<?php

namespace App\Traits\Livewire\Tables;

trait Hiddenable
{
    /**
     * @var bool
     */
    private bool $columnHidden = false;

    /**
     * @var bool
     */
    private bool $rowHidden = false;

    /**
     * Hide the column depending on the given condition.
     *
     * @param  bool  $condition
     * @return $this
     */
    public function hideColumnIf($condition)
    {
        $this->columnHidden = $condition;

        return $this;
    }

    /**
     * Hide the row depending on the given condition.
     *
     * @param  bool  $condition
     * @return $this
     */
    public function hideRowIf($condition)
    {
        $this->rowHidden = $condition;

        return $this;
    }

    /**
     * Force the column and the row to be hidden.
     *
     * @return $this
     */
    public function hide()
    {
        $this->columnHidden = true;
        $this->rowHidden = true;

        return $this;
    }

    /**
     * Check if the column is visible.
     *
     * @return bool
     */
    public function hasVisibleColumn()
    {
        return $this->columnHidden !== true;
    }

    /**
     * Check if the row is visible.
     *
     * @return bool
     */
    public function hasVisibleRow()
    {
        return $this->rowHidden !== true;
    }
}
