<?php

namespace App\Traits\Livewire\Tables;

trait Searching
{
    /**
     * The initial search string.
     *
     * @var string
     */
    public string $search = '';

    /**
     * Method to search by: debounce or lazy.
     *
     * @var string
     */
    public string $searchUpdateMethod = 'debounce';

    /**
     * false = disabled
     * int = Amount of time in ms to wait to send the search query and refresh the table.
     *
     * @var int
     */
    public int $searchDebounce = 350;

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
