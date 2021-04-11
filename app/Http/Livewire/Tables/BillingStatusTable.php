<?php

namespace App\Http\Livewire\Tables;

use App\Http\Livewire\Tables\{Column, TableComponent};
use App\Models\BillingStatus;
use App\Traits\Livewire\WithDeleteConfirmation;

use Illuminate\Database\Eloquent\Builder;

class BillingStatusTable extends TableComponent
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
        return BillingStatus::select('id', 'name', 'color');
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
            Column::make('Billing status', 'name')
                ->format(function (BillingStatus $model) {
                    return "
                        <div class='uk-badge' style='background: {$model->color}'>
                            {$model->name}
                        </div>
                    ";
                })
                ->raw()
                ->searchable()
                ->sortable(),
            Column::make('Hexadecimal color', 'color')->searchable()->sortable(),
            Column::make('Actions')
                ->view('vendor.includes.actions_buttons')
                ->hideBoth(auth()->user()->cannot('performAdminAction')),
        ];
    }
}
