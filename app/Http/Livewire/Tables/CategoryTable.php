<?php

namespace App\Http\Livewire\Tables;

use App\Http\Livewire\Tables\{Column, TableComponent};
use App\Models\Category;
use App\Traits\Livewire\WithDeleteConfirmation;

use Illuminate\Database\Eloquent\Builder;

class CategoryTable extends TableComponent
{
    use WithDeleteConfirmation;

    /**
     * Emit an event to access model identifiers
     * in the delete confirmation modal.
     *
     * @var array
     */
    protected $listeners = ['getModelIdentifiers'];

    /**
     * Return an Eloquent model query to be used by the table.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return Category::query();
    }

    /**
     * Set the array of columns to use in the table.
     *
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make('#', 'id')->sortable(),
            Column::make('Category type', 'type')->searchable()->sortable(),
            Column::make('Actions')
                ->view('vendor.includes.actions_buttons')
                ->hideBoth(auth()->user()->cannot('performAdminAction'))
        ];
    }
}
