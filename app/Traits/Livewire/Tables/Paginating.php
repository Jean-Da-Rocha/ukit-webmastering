<?php

namespace App\Traits\Livewire\Tables;

trait Paginating
{
    /**
     * The options to limit the amount of results per page.
     *
     * @var array
     */
    public $perPageOptions = [10, 25, 50, 100];

    /**
     * Amount of items to show per page.
     *
     * @var int
     */
    public $perPage = 10;

    /**
     * Resetting Pagination After Filtering Data.
     * https://laravel-livewire.com/docs/pagination
     *
     * @return void
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Resetting Pagination After Changing the perPage.
     * https://laravel-livewire.com/docs/pagination
     *
     * @return void
     */
    public function updatingPerPage()
    {
        $this->resetPage();
    }
}
