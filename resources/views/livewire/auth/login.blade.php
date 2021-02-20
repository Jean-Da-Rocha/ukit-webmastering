<div>
    <div class="uk-card uk-card-default">
        <div class="uk-card-header uk-background-primary">
            <div class="uk-text-center">
                Login form
            </div>
        </div>
        <div class="uk-card-body">
            <form wire:submit.prevent="authenticate">
                <div class="uk-margin">
                    <label class="uk-form-label" for="user_email">
                        Email
                    </label>
                    <div class="uk-inline uk-width-1-1">
                        <x-heroicon-o-user class="uk-form-icon" />
                        <input
                            type="email"
                            class="uk-input @error('email') uk-form-danger @enderror"
                            name="email"
                            id="email"
                            wire:model.defer="email"
                            autofocus
                            required
                        />
                        @error('email')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="password" class="uk-form-label">
                        Password
                    </label>
                    <div class="uk-inline uk-width-1-1">
                        <x-heroicon-o-lock-closed class="uk-form-icon" />
                        <input
                            type="password"
                            class="uk-input @error('password') uk-form-danger @enderror"
                            name="password"
                            id="password"
                            wire:model.defer="password"
                            required
                        />
                    </div>
                </div>
                <div class="uk-margin">
                    <button class="uk-button uk-button-primary uk-float-right" type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
