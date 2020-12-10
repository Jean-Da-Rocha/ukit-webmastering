<div>
    <x-utils.message />

    <form wire:submit.prevent="save">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    Set up a contact email
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-margin">
                    <label for="setting.contact_email" class="uk-form-label">
                        Contact email
                    </label>
                    <input
                        type="email"
                        class="uk-input @error('setting.contact_email') uk-form-danger @enderror"
                        name="setting.contact_email"
                        id="setting.contact_email"
                        wire:model.defer="setting.contact_email"
                    />
                    @error('setting.contact_email')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin uk-align-right">
                    <button
                        type="submit"
                        class="uk-button uk-button-primary"
                    >
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
