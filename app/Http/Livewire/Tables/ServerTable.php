<?php

namespace App\Http\Livewire\Tables;

use App\Http\Livewire\Tables\{Column, TableComponent};
use App\Models\Server;
use App\Traits\Livewire\WithDeleteConfirmation;

use Illuminate\Database\Eloquent\Builder;

class ServerTable extends TableComponent
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
        return Server::select('id', 'name');
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
            Column::make('Server name', 'name')->searchable()->sortable(),
            Column::make('Server information', 'information')->searchable()->sortable(),
            Column::make('Actions')
                ->view('vendor.includes.actions_buttons')
                ->hideBoth(auth()->user()->cannot('performAdminAction'))
        ];
    }
}
