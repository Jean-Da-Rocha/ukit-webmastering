<?php

namespace App\Http\Livewire\Actions\Hostings;

use App\Models\{BillingStatus, Customer, Hosting, Project, Server};

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Livewire\Component;

class BaseHosting extends Component
{
    use AuthorizesRequests;

    /** @var Hosting */
    public Hosting $hosting;

    /** @var bool */
    public bool $updateMode = false;

    /** @var array */
    protected array $rules = [
        'hosting.domain_name' => ['required', 'string', 'max:255'],
        'hosting.date_renewal' => ['required', 'date', 'date_format:Y-m-d', 'after:today'],
        'hosting.customer_id' => ['required', 'integer'],
        'hosting.domain_managing' => ['required', 'boolean'],
        'hosting.project_id' => ['nullable', 'integer'],
        'hosting.registrar' => ['nullable', 'string', 'max:255'],
        'hosting.billing_status_id' => ['required', 'integer'],
        'hosting.pricing' => ['required', 'numeric', 'min:0', 'max:9999'],
        'hosting.server_id' => ['nullable', 'integer'],
        'hosting.comment' => ['nullable', 'string', 'max:1000'],
    ];

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->authorize('performAdminAction');

        return view('livewire.hostings.create_edit_form', [
            'hosting' => $this->hosting,
            'customers' => Customer::select('id', 'designation')->orderBy('designation', 'asc')->get(),
            'projects' => Project::select('id', 'name')->orderBy('name', 'asc')->get(),
            'billingStatus' => BillingStatus::select('id', 'name')->orderBy('name', 'asc')->get(),
            'servers' => Server::select('id', 'name')->orderBy('name', 'asc')->get(),
        ]);
    }
}
