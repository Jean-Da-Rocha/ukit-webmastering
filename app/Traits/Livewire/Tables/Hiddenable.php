<?php

namespace App\Traits\Livewire\Tables;

trait Hiddenable
{
    /**
     * @var bool
     */
    protected $hidden = false;

    /**
     * @param  boolean  $condition
     * @return $this
     */
    public function hideIf($condition)
    {
        $this->hidden = $condition;

        return $this;
    }

    /**
     * @return $this
     */
    public function hide()
    {
        $this->hidden = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->hidden !== true;
    }

    /**
     * @return bool
     */
    public function isHidden()
    {
        return ! $this->isVisible();
    }
}
