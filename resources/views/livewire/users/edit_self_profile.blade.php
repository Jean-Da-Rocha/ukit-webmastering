<div>
    <x-utils.message />

    <form wire:submit.prevent="updateSelfProfile">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    Update
                    your profile's information
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-margin">
                    <label class="uk-form-label" for="user.username">
                        Username
                    </label>
                    <input
                        type="text"
                        class="uk-input @error('user.username') uk-form-danger @enderror"
                        name="user.username"
                        id="user.username"
                        wire:model.defer="user.username"
                        required
                    />
                    @error('user.username')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="user.email">
                        Email
                    </label>
                    <input
                        type="email"
                        class="uk-input @error('user.email') uk-form-danger @enderror"
                        name="user.email"
                        id="user.email"
                        wire:model.defer="user.email"
                        required
                    />
                    @error('user.email')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="user.password">
                        Password
                    </label>
                    <input
                        type="password"
                        class="uk-input @error('user.password') uk-form-danger @enderror"
                        name="user.password"
                        id="user.password"
                        wire:model.defer="user.password"
                    />
                    @error('user.password')
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
