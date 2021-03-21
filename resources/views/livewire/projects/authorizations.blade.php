<div>
    <x-utils.message />

    <form wire:submit.prevent="saveAuthorizations">
        <div class="uk-card uk-card-default uk-height-1-1">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    <b>{{ ucfirst($project->name) }}</b>'s project authorizations
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-search uk-search-default">
                    <span class="uk-search-icon-flip" data-uk-search-icon wire:ignore></span>
                    <input
                        class="uk-search-input"
                        type="search"
                        placeholder="Search..."
                        wire:model="searchTerms"
                    />
                </div>
                <ul class="uk-list uk-list-divider">
                    @foreach ($this->users as $key => $user)
                        <li>
                            {{ $user->username }}
                            <div class="uk-align-right">
                                <label for="authorizations-{{ $user->id }}"></label>
                                <input
                                    type="checkbox"
                                    name="authorizations-{{ $user->id }}"
                                    id="authorizations-{{ $user->id }}"
                                    class="uk-checkbox"
                                    wire:model.defer="authorizations.{{ $key }}"
                                    value="{{ $user->id }}"
                                />
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="uk-margin uk-align-right">
                    <a
                        href="{{ route('projects.index') }}"
                        class="uk-button uk-button-secondary"
                    >
                        Cancel
                    </a>
                    <button type="submit" class="uk-button uk-button-primary">
                        Save authorizations
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
