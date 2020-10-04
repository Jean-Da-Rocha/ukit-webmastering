<?php

namespace App\Traits\Livewire\Tables;

trait Searching
{
    /**
     * The initial search string.
     *
     * @var string
     */
    public $search = '';

    /**
     * Method to search by: debounce or lazy.
     *
     * @var string
     */
    public $searchUpdateMethod = 'debounce';

    /**
     * false = disabled
     * int = Amount of time in ms to wait to send the search query and refresh the table.
     *
     * @var int
     */
    public $searchDebounce = 350;

    /**
     * A button to clear the search box.
     *
     * @var bool
     */
    public $clearSearchButton = false;

    /**
     * Resets the search string.
     *
     * @return void
     */
    public function clearSearch()
    {
        $this->search = '';
    }
}
