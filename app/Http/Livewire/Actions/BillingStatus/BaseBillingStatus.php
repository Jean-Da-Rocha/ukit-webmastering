<?php

namespace App\Http\Livewire\Actions\BillingStatus;

use App\Models\BillingStatus;

use Livewire\Component;

class BaseBillingStatus extends Component
{
    /** @var Status */
    public BillingStatus $billing_status;

    /** @var bool */
    public bool $updateMode = false;

    /** @var array */
    protected array $rules = [
        'billing_status.name' => ['required', 'string', 'max:255'],
        'billing_status.color' => ['nullable', 'string', 'max:7'],
    ];

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.billing_status.create_edit_form', [
            'billing_status' => $this->billing_status,
        ]);
    }
}
