<div>
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    @if ($updateMode)
                        Update <b>{{ $server->name }}</b> server info
                    @else
                        Add a new server
                    @endif
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-margin">
                    <label for="server.name" class="uk-form-label">
                        Server name
                    </label>
                    <input
                        type="text"
                        class="uk-input @error('server.name') uk-form-danger @enderror"
                        name="server.name"
                        id="server.name"
                        wire:model.defer="server.name"
                        required
                    />
                    @error('server.name')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label for="server.information" class="uk-form-label">
                        Server information
                    </label>
                    <textarea
                        class="uk-textarea @error('server.information') uk-form-danger @enderror"
                        name="server.information"
                        id="server.information"
                        cols="30"
                        rows="5"
                        wire:model.defer="server.information"
                    ></textarea>
                    @error('server.information')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin uk-align-right">
                    <a
                        href="{{ route('servers.index') }}"
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
