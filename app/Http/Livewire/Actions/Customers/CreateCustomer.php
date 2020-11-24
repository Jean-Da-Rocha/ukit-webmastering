<?php

namespace App\Http\Livewire\Actions\Customers;

use App\Models\Customer;

class CreateCustomer extends BaseCustomer
{
    /**
     * Set the initial customer properties.
     *
     * @return void
     */
    public function mount()
    {
        $this->updateMode = false;

        $this->customer = new Customer();
    }

    /**
     * Store a newly created customer in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->customer->save($this->validate());

        session()->flash('success', trans('message.created'));

        return redirect()->to('/customers');
    }
}
