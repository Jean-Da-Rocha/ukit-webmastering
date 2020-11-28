<?php

namespace App\Http\Livewire\Actions\BillingStatus;

use App\Models\BillingStatus;

class CreateBillingStatus extends BaseBillingStatus
{
    /**
     * Set the initial billing status properties.
     *
     * @return void
     */
    public function mount()
    {
        $this->updateMode = false;

        $this->billing_status = new BillingStatus();
    }

    /**
     * Store a newly created billing status in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->billing_status->save($this->validate());

        session()->flash('success', trans('message.created'));

        return redirect()->to('/billing-status');
    }
}
