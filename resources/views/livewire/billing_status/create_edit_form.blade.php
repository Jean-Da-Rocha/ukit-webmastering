<div>
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    @if ($updateMode)
                        Update <b>{{ $billing_status->name }}</b> billing status info
                    @else
                        Add a new billing status
                    @endif
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-column-1-2@l">
                    <div class="uk-margin">
                        <label for="billing_status.name" class="uk-form-label">
                            Billing status label name
                        </label>
                        <input
                            type="text"
                            class="uk-input @error('billing_status.name') uk-form-danger @enderror"
                            name="billing_status.name"
                            id="billing_status.name"
                            wire:model.defer="billing_status.name"
                            required
                        />
                        @error('billing_status.name')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="uk-margin">
                        <label for="billing_status.color" class="uk-form-label">
                            Billing status label color
                            <br>
                        </label>
                        <input
                            type="color"
                            class="uk-input @error('billing_status.color') uk-form-danger @enderror"
                            name="billing_status.color"
                            id="billing_status.color"
                            wire:model.defer="billing_status.color"
                            style="max-width: 60px; cursor: pointer;"
                        />
                        @error('billing_status.color')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin uk-align-right">
                    <a
                        href="{{ route('billing_status.index') }}"
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
