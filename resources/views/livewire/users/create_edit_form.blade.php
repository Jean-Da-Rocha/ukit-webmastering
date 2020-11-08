<div>
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    @if ($updateMode)
                        Update <b>{{ $user->username }}</b> user info
                    @else
                        Create a new user
                    @endif
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
                    <label class="uk-form-label" for="user.role_id">
                        User role
                    </label>
                    <select
                        class="uk-select @error('user.role_id') uk-form-danger @enderror"
                        name="user.role_id"
                        id="user.role_id"
                        wire:model.defer="user.role_id"
                        required
                    >
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user.role_id')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                @if ($updateMode === false)
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
                            required
                        />
                        @error('user.password')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                @endif
                <div class="uk-margin uk-align-right">
                    <a
                        href="{{ route('users.index') }}"
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
