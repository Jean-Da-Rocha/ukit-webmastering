<?php

namespace App\Traits\Livewire\Tables;

trait Paginating
{
    /**
     * The options to limit the amount of results per page.
     *
     * @var array
     */
    public array $perPageOptions = [10, 25, 50, 100];

    /**
     * Amount of items to show per page.
     *
     * @var int
     */
    public int $perPage = 10;

    /**
     * Resetting Pagination after filtering data.
     *
     * @return void
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Resetting Pagination After Changing the perPage.
     *
     * @return void
     */
    public function updatingPerPage()
    {
        $this->resetPage();
    }
}
