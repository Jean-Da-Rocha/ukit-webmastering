<div class="uk-width-1-3@l uk-width-1-1@m">
    <div class="uk-card uk-card-default">
        <div class="uk-card-header uk-background-primary">
            <div class="uk-text-center uk-text-white">
                Authorized users
            </div>
        </div>
        <div class="uk-card-body">
            <ul class="uk-list uk-list-divider uk-list-large">
                <li>
                    @if ($this->authorizedUsers->count() > 0)
                        Username
                        <div class="uk-align-right">
                            <label for="users-list"></label>
                            <select
                                class="uk-select"
                                name="users-list"
                                id="users-list"
                                wire:model="selectedUserId"
                            >
                                @foreach ($this->authorizedUsers as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->username }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <span class="uk-text-danger">
                            There are no users authorized for this project
                        </span>
                    @endif
                </li>
                <li>
                    Tasks created for this project
                    <div class="uk-align-right">
                        <span class="uk-badge">
                            @isset($selectedUser->tasks)
                                {{ $selectedUser->tasks->count() }}
                            @else
                                0
                            @endisset
                        </span>
                    </div>
                </li>
                <li>
                    Hours spent on this project
                    <div class="uk-align-right">
                        <span class="uk-badge">
                            {{ $selectedUserTotalTasksTime ?? '00 h 00 min' }}
                        </span>
                    </div>
                </li>
                @can('performWebmasterAction')
                    <li>
                        <div class="uk-margin-small-top"></div>
                        <a
                            href="{{ route('projects.authorizations', $project->id) }}"
                            class="uk-button uk-button-secondary uk-text-capitalize"
                        >
                            <x-heroicon-o-lock-open /> Manage authorizations
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
