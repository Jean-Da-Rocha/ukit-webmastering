<?php

namespace App\Http\Livewire\Actions\BillingStatus;

use App\Models\BillingStatus;

class EditBillingStatus extends BaseBillingStatus
{
    /**
     * Set the initial billing status properties.
     *
     * @param  int  $id
     * @return void
     */
    public function mount(int $id)
    {
        $this->updateMode = true;

        $this->billing_status = BillingStatus::findOrFail($id);
    }

    /**
     * Update the specified billing status in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->billing_status->update($this->validate());

        session()->flash('success', trans('message.updated'));

        return redirect()->to('/billing-status');
    }
}
