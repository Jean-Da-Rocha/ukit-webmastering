<?php

namespace App\Http\Livewire\Actions\Hostings;

use App\Models\{BillingStatus, Customer, Hosting};

class CreateHosting extends BaseHosting
{
    /**
     * Set the initial hosting properties.
     *
     * @return void
     */
    public function mount()
    {
        $this->updateMode = false;

        $this->hosting = new Hosting();
        $this->hosting->domain_managing = 0;
        $this->hosting->customer_id = Customer::orderBy('designation')->first()->id;
        $this->hosting->billing_status_id = BillingStatus::orderBy('name')->first()->id;
    }

    /**
     * Store a newly created hosting in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->hosting->save($this->validate());

        session()->flash('success', trans('message.created'));

        return redirect()->to('/hostings');
    }
}
