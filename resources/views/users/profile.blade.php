<x-layouts.app>
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center">
                    <b>{{ ucfirst($user->username) }}</b>'s user profile
                </div>
            </div>
            <div class="uk-card-body">
                <ul class="uk-list uk-list-divider">
                    <li>
                        Username
                        <div class="uk-align-right">
                            <span>{{ $user->username }}</span>
                        </div>
                    </li>
                    <li>
                        Email
                        <div class="uk-align-right">
                            <span>{{ $user->email }}</span>
                        </div>
                    </li>
                    <li>
                        Role
                        <div class="uk-align-right">
                            <span class="{{ get_role_color($user->role_id) }}">
                                {{ $user->role->name }}
                            </span>
                        </div>
                    </li>
                    <li>
                        Number of tasks done
                        <div class="uk-align-right">
                            <span class="uk-badge">
                                {{ $user->tasks->count() }}
                            </span>
                        </div>
                    </li>
                    <li>
                        Total time spent on these tasks
                        <div class="uk-align-right">
                            <span class="uk-badge">{{ $timeSpentOnTasks }}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-layouts.app>
