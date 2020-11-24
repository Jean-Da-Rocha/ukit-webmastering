<div>
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    @if ($updateMode)
                        Update <b>{{ $hosting->customer->designation }}</b> hosting info
                    @else
                        Create a new hosting
                    @endif
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-column-1-2@l">
                    <div class="uk-margin">
                        <label for="hosting.domain_name" class="uk-form-label">
                            Domain name
                        </label>
                        <input
                            type="text"
                            name="hosting.domain_name"
                            id="hosting.domain_name"
                            class="uk-input @error('hosting.domain_name') uk-form-danger @enderror"
                            wire:model.defer="hosting.domain_name"
                            required
                        />
                        @error('hosting.domain_name')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="uk-margin">
                        <label for="hosting.date_renewal" class="uk-form-label">
                            Date renewal
                        </label>
                        <input
                            type="date"
                            name="hosting.date_renewal"
                            id="hosting.date_renewal"
                            class="uk-input @error('hosting.date_renewal') uk-form-danger @enderror"
                            wire:model.defer="hosting.date_renewal"
                            required
                        />
                        @error('hosting.date_renewal')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-column-1-3@l">
                    <div class="uk-margin">
                        <label for="hosting.domain_managing" class="uk-form-label">
                            Domain managing
                        </label>
                        <select
                            name="hosting.domain_managing"
                            id="hosting.domain_managing"
                            class="uk-select @error('hosting.domain_managing') uk-form-danger @enderror"
                            wire:model.defer="hosting.domain_managing"
                            required
                        >
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        @error('hosting.domain_managing')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="uk-margin">
                        <label for="hosting.registrar" class="uk-form-label">
                            Registrar
                        </label>
                        <input
                            type="text"
                            name="hosting.registrar"
                            id="hosting.registrar"
                            class="uk-input @error('hosting.registrar') uk-form-danger @enderror"
                            wire:model.defer="hosting.registrar"
                        />
                        @error('hosting.registrar')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="uk-margin">
                        <label for="hosting.server_id" class="uk-form-label">
                            Server
                        </label>
                        <select
                            name="hosting.server_id"
                            id="hosting.server_id"
                            class="uk-select @error('hosting.server_id') uk-form-danger @enderror"
                            wire:model.defer="hosting.server_id"
                        >
                            <option value="">None</option>
                            @foreach ($servers as $server)
                                <option value="{{ $server->id }}">
                                    {{ $server->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('hosting.server_id')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-column-1-2@l">
                    <div class="uk-margin">
                        <label for="hosting.pricing" class="uk-form-label">
                            Pricing
                        </label>
                        <input
                            type="number"
                            name="hosting.pricing"
                            id="hosting.pricing"
                            class="uk-input @error('hosting.pricing') uk-form-danger @enderror"
                            min="0"
                            max="9999"
                            wire:model.defer="hosting.pricing"
                            required
                        />
                        @error('hosting.pricing')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="uk-margin">
                        <label for="hosting.status_id" class="uk-form-label">
                            Billing status
                        </label>
                        <select
                            name="hosting.status_id"
                            id="hosting.status_id"
                            class="uk-select @error('hosting.status_id') uk-form-danger @enderror"
                            wire:model.defer="hosting.status_id"
                            required
                        >
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('hosting.status_id')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-column-1-2@l">
                    <div class="uk-margin">
                        <label for="hosting.project_id" class="uk-form-label">
                            Project
                        </label>
                        <select
                            name="hosting.project_id"
                            id="hosting.project_id"
                            class="uk-select @error('hosting.project_id') uk-form-danger @enderror"
                            wire:model.defer="hosting.project_id"
                        >
                            <option value="">None</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('hosting.project_id')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="uk-margin">
                        <label for="customer_id" class="uk-form-label">
                            Customer
                        </label>
                        <select
                            name="customer_id"
                            id="customer_id"
                            class="uk-select @error('customer_id') uk-form-danger @enderror"
                            wire:model.defer="hosting.customer_id"
                            required
                        >
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">
                                    {{ $customer->designation }}
                                </option>
                            @endforeach
                        </select>
                        @error('hosting.customer_id')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="hosting.comment" class="uk-form-label">
                        Comment
                    </label>
                    <textarea
                        type="text"
                        name="hosting.comment"
                        id="hosting.comment"
                        class="uk-textarea @error('hosting.comment') uk-form-danger @enderror"
                        rows="5"
                        wire:model.defer="hosting.comment"
                    ></textarea>
                    @error('hosting.comment')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-width-1-1 uk-text-right">
                    <a
                        href="{{ route('hostings.index') }}"
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
