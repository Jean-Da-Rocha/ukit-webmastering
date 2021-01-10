<div>
    <x-utils.message />

    <form wire:submit.prevent="authorizeUsers">
        <div class="uk-card uk-card-default uk-height-1-1">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    <b>{{ ucfirst($project->name) }}</b>'s project authorizations
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-flex uk-flex-between">
                    @if ($this->users->count() > 10)
                        <button type="button" class="uk-button uk-button-secondary" wire:click="loadLess">
                            Load less users
                        </button>
                    @endif

                    @if ($this->users->count() < $totalUsers)
                        <button type="button" class="uk-button uk-button-secondary" wire:click="loadMore">
                            Load more users
                        </button>
                    @endif
                </div>
                <ul class="uk-list uk-list-divider">
                    @foreach ($this->users as $user)
                        <li :key="{{ $loop->index }}">
                            {{ $user->username }}
                            <div class="uk-align-right">
                                <label for="authorizations-{{ $user->id }}"></label>
                                <input
                                    type="checkbox"
                                    name="authorizations-{{ $user->id }}"
                                    id="authorizations-{{ $user->id }}"
                                    class="uk-checkbox"
                                    wire:model.defer="authorizations"
                                    value="{{ $user->id }}"
                                    {{ $project->authorizations && in_array($user->id, $project->authorizations) ? 'checked' : '' }}
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
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
