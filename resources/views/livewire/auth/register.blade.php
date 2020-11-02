<div>
    <div class="uk-card uk-card-default">
        <div class="uk-card-header uk-background-primary">
            <div class="uk-text-center uk-text-white">
                Register form
            </div>
        </div>
        <div class="uk-card-body">
            <form wire:submit.prevent="register">
                <div class="uk-margin">
                    <label for="username" class="uk-form-label">
                        Username
                    </label>
                    <div class="uk-inline uk-width-1-1">
                        <x-heroicon-o-user class="uk-form-icon" />
                        <input
                            type="text"
                            class="uk-input @error('username') uk-form-danger @enderror"
                            name="username"
                            id="username"
                            wire:model.lazy="username"
                            autofocus
                            required
                        />
                        @error('username')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="email" class="uk-form-label">
                        Email
                    </label>
                    <div class="uk-inline uk-width-1-1">
                        <x-heroicon-o-mail class="uk-form-icon" />
                        <input
                            type="email"
                            class="uk-input @error('email') uk-form-danger @enderror"
                            name="email"
                            id="email"
                            wire:model.lazy="email"
                            required
                        />
                    </div>
                    @error('email')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label for="password" class="uk-form-label">
                        Password
                    </label>
                    <div class="uk-form-controls uk-inline uk-width-1-1">
                        <x-heroicon-o-lock-closed class="uk-form-icon" />
                        <input
                            type="password"
                            class="uk-input @error('password') uk-form-danger @enderror"
                            name="password"
                            id="password"
                            wire:model.lazy="password"
                            required
                        />
                    </div>
                    @error('password')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label for="password_confirmation" class="uk-form-label">
                        Password confirmation
                    </label>
                    <div class="uk-form-controls uk-inline uk-width-1-1">
                        <x-heroicon-o-lock-closed class="uk-form-icon" />
                        <input
                            type="password"
                            class="uk-input"
                            name="password_confirmation"
                            id="password_confirmation"
                            wire:model.lazy="passwordConfirmation"
                            required
                        />
                    </div>
                </div>
                <div class="uk-margin">
                    <button class="uk-button uk-button-primary uk-float-right" type="submit">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
