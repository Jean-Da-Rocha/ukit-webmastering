<?php

namespace App\Http\Livewire\Actions\Customers;

use App\Models\Customer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class BaseCustomer extends Component
{
    use AuthorizesRequests;

    /**
     * @var Customer
     */
    public Customer $customer;

    /**
     * @var bool
     */
    public bool $updateMode = false;

    /**
     * @var array
     */
    protected array $rules = [
        'customer.society_name' => ['required', 'string', 'max:255'],
        'customer.designation' => ['nullable', 'string', 'max:255'],
        'customer.email' => ['nullable', 'max:255', 'email:filter', 'unique:customers,email'],
        'customer.phone_number' => ['nullable', 'string', 'max:5000'],
        'customer.address' => ['nullable', 'string', 'max:255'],
        'customer.zip_code' => ['nullable', 'string', 'max:10'],
        'customer.city' => ['nullable', 'string', 'max:5000'],
    ];

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.customers.create_edit_form', [
            'customer' => $this->customer,
        ]);
    }
}
