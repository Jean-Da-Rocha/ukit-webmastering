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
    public function hideColumnIf(bool $condition)
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
    public function hideRowIf(bool $condition)
    {
        $this->rowHidden = $condition;

        return $this;
    }

    /**
     * Hide both the row and the column
     * depending on the given condition.
     *
     * @param  bool  $condition
     * @return $this
     */
    public function hideBoth(bool $condition)
    {
        $this->columnHidden = $condition;
        $this->rowHidden = $condition;

        return $this;
    }

    /**
     * Force the column and the row to be hidden.
     *
     * @return $this
     */
    public function forceHide()
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
