<?php

namespace App\Http\Livewire\Actions\Customers;

use App\Models\Customer;

class EditCustomer extends BaseCustomer
{
    /**
     * Set the initial customer properties.
     *
     * @param  int  $id
     * @return void
     */
    public function mount(int $id)
    {
        $this->authorize('haveAccess');

        $this->updateMode = true;

        $this->customer = Customer::findOrFail($id);
    }

    /**
     * Update the specified customer in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->setValidationRules();

        $this->customer->update($this->validate());

        session()->flash('success', trans('message.updated'));

        return redirect()->to('/customers');
    }

    /**
     * Override specific validation rules from the original $rules array
     * so that we don't get the 'same email/username' error
     * or null password error during update.
     *
     * @return array
     */
    private function setValidationRules()
    {
        $this->rules['customer.email'] = [
            'nullable',
            'string',
            'max:255',
            'email:filter',
            'unique:customers,email,' . $this->customer->id,
        ];
    }
}
