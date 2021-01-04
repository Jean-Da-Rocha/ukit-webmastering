<?php

namespace App\Http\Livewire\Tables;

use App\Http\Livewire\Tables\{Column, TableComponent};
use App\Models\User;
use App\Traits\Livewire\WithDeleteConfirmation;

use Illuminate\Database\Eloquent\Builder;

class UserTable extends TableComponent
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
        return User::with('role')->select('users.*');
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
            Column::make('Username', 'username')
                ->format(fn (User $model) => generate_html_link(route('users.profile', $model->id), $model->username))
                ->searchable()
                ->sortable(),
            Column::make('Email', 'email')->searchable()->sortable(),
            Column::make('Role', 'role.name')->searchable()->sortable(),
            Column::make('Actions')->view('vendor.includes.actions_buttons'),
        ];
    }
}
