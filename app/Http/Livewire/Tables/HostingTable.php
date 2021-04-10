<?php

namespace App\Http\Livewire\Tables;

use App\Http\Livewire\Tables\Column;
use App\Http\Livewire\Tables\TableComponent;
use App\Models\Hosting;
use App\Traits\Livewire\WithDeleteConfirmation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class HostingTable extends TableComponent
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
     * hostings data in .xlsx format.
     *
     * @var string
     */
    public $exportRouteName = 'hostings.export';

    /**
     * Return an Eloquent model query to be used by the table.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return Hosting::with(['customer', 'project', 'server', 'billingStatus'])
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
            Column::make('Server', 'server.name')
                ->format(fn (Hosting $model) => $model->server->name ?? '-')
                ->searchable()
                ->sortable(),
            Column::make('Date renewal', 'renewal_date')->searchable()->sortable(),
            Column::make('Billing status', 'billingStatus.name')
                ->format(function (Hosting $model) {
                    return "
                        <div class='uk-badge' style='background: {$model->billingStatus->color}'>
                            {$model->billingStatus->name}
                        </div>
                    ";
                })
                ->raw()
                ->searchable()
                ->sortable(),
            Column::make('Domain managing', 'domain_managing')
                ->format(fn (Hosting $model) => $model->domain_managing === 1 ? 'Yes' : 'No')
                ->searchable()
                ->sortable(),
            Column::make('Pricing', 'pricing')
                ->format(fn (Hosting $model) => $model->pricing.' €')
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->view('vendor.includes.actions_buttons')
                ->hideBoth(auth()->user()->cannot('performAdminAction')),
        ];
    }
}
