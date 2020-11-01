<?php

namespace App\Http\Livewire\Tables;

use App\Models\Customer;

use Illuminate\Database\Eloquent\Builder;

class CustomerTable extends TableComponent
{
    /**
     * Return an Eloquent model query to be used by the table.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return Customer::query();
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
                ->view('vendor.includes.customers.full_address')
                ->searchable()
                ->sortable(),
            Column::make('Phone number', 'phone_number')->searchable()->sortable(),
            Column::make('Email', 'email')->searchable()->sortable(),
            Column::make('Actions')->view('vendor.includes.actions_buttons'),
        ];
    }
}
