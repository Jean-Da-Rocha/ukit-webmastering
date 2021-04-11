<?php

namespace App\Http\Livewire\Tables;

use App\Models\Customer;
use App\Traits\Livewire\WithDeleteConfirmation;

use Illuminate\Database\Eloquent\Builder;

class CustomerTable extends TableComponent
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
     * Route name used to export
     * customers data in .xlsx format.
     *
     * @var string
     */
    public $exportRouteName = 'customers.export';

    /**
     * Return an Eloquent model query to be used by the table.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return Customer::select([
            'id',
            'society_name',
            'address',
            'zip_code',
            'city',
            'phone_number',
            'email'
        ]);
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
            Column::make('Society name', 'society_name')->searchable()->sortable(),
            Column::make('Full address', 'address')
                ->format(fn (Customer $model) => $model->full_address)
                ->searchable()
                ->sortable(),
            Column::make('Phone number', 'phone_number')->searchable()->sortable(),
            Column::make('Email', 'email')->searchable()->sortable(),
            Column::make('Actions')
                ->view('vendor.includes.actions_buttons')
                ->hideBoth(auth()->user()->cannot('performAdminAction'))
        ];
    }
}
