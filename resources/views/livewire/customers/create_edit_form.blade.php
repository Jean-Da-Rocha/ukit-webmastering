<div>
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    @if ($updateMode)
                        Edit <b>{{ $customer->designation }} customer info</b>
                    @else
                        Create a new customer
                    @endif
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-column-1-2@l">
                    <div class="uk-margin">
                        <label for="customer.society_name" class="uk-form-label">
                            Society name
                        </label>
                        <input
                            type="text"
                            class="uk-input @error('customer.society_name') uk-form-danger @enderror"
                            name="customer.society_name"
                            id="customer.society_name"
                            wire:model.defer="customer.society_name"
                            required
                        />
                        @error('customer.society_name')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="uk-margin">
                        <label for="customer.designation" class="uk-form-label">
                            Full name
                        </label>
                        <input
                            type="text"
                            class="uk-input @error('customer.designation') uk-form-danger @enderror"
                            name="customer.designation"
                            id="customer.designation"
                            wire:model.defer="customer.designation"
                        />
                        @error('customer.designation')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-column-1-2@l">
                    <div class="uk-margin">
                        <label for="customer.phone_number" class="uk-form-label">
                            Phone number
                        </label>
                        <input
                            type="text"
                            class="uk-input @error('customer.phone_number') uk-form-danger @enderror"
                            name="customer.phone_number"
                            id="customer.phone_number"
                            wire:model.defer="customer.phone_number"
                        />
                        @error('customer.phone_number')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="uk-margin">
                        <label for="customer_email" class="uk-form-label">
                            Email
                        </label>
                        <input
                            type="email"
                            class="uk-input @error('customer.email') uk-form-danger @enderror"
                            name="customer.email"
                            id="customer.email"
                            wire:model.defer="customer.email"
                        />
                        @error('customer.email')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-column-1-3@l uk-column-1-2@m uk-column-1-1@s">
                    <div class="uk-margin">
                        <label for="customer.address" class="uk-form-label">
                            Address
                        </label>
                        <input
                            type="text"
                            class="uk-input @error('customer.address') uk-form-danger @enderror"
                            name="customer.address"
                            id="customer.address"
                            wire:model.defer="customer.address"
                        />
                        @error('customer.address')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="uk-margin">
                        <label for="customer.zip_code" class="uk-form-label">
                            Zip code
                        </label>
                        <input
                            type="text"
                            class="uk-input @error('customer.zip_code') uk-form-danger @enderror"
                            name="customer.zip_code"
                            id="customer.zip_code"
                            wire:model.defer="customer.zip_code"
                        />
                        @error('customer.zip_code')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="uk-margin">
                        <label for="city" class="uk-form-label">
                            City
                        </label>
                        <input
                            type="text"
                            class="uk-input @error('city') uk-form-danger @enderror"
                            name="city"
                            id="city"
                            wire:model.defer="customer.city"
                        />
                        @error('customer.city')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin uk-align-right">
                    <a
                        href="{{ route('customers.index') }}"
                        class="uk-button uk-button-secondary"
                    >
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="uk-button uk-button-primary"
                    >
                        {{ $updateMode ? 'Save' : 'Create' }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
