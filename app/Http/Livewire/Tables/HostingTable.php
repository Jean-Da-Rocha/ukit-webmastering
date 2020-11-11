<?php

namespace App\Http\Livewire\Hostings;

use App\Http\Livewire\Tables\Column;
use App\Http\Livewire\Tables\TableComponent;
use App\Models\Hosting;

use Illuminate\Database\Eloquent\Builder;

class HostingTable extends TableComponent
{
    /**
     * Return an Eloquent model query to be used by the table.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return Hosting::with('customer')
            ->with('project')
            ->with('server')
            ->with('status')
            ->select('hostings.*');
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
            Column::make('Customer', 'customer.designation')->searchable()->sortable(),
            Column::make('Domain', 'domain_name')->searchable()->sortable(),
            Column::make('Server', 'server.server_name')->searchable()->sortable(),
            Column::make('Date renewal', 'date_renewal')->searchable()->sortable(),
            Column::make('Status', 'status.status_name')
                ->view('components.hostings.statuses')
                ->searchable()
                ->sortable(),
            Column::make('Domain managing', 'domain_managing')
                ->view('components.hostings.domain_managing')
                ->searchable()
                ->sortable(),
            Column::make('Price', 'price')
                ->view('components.hostings.price')
                ->searchable()
                ->sortable(),
            Column::make('Actions')->view('components.partials.action_buttons'),
        ];
    }
}
