<x-layouts.app>
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center">
                    <b>{{ ucfirst($task->name) }}</b>'s task details
                </div>
            </div>
            <div class="uk-card-body">
                <ul class="uk-list uk-list-divider">
                    <li>
                        Task name
                        <div class="uk-align-right">
                            <span>{{ $task->name }}</span>
                        </div>
                    </li>
                    <li>
                        Task starting date
                        <div class="uk-align-right">
                            <span>{{ $task->starting_date }}</span>
                        </div>
                    </li>
                    <li>
                        Task duration
                        <div class="uk-align-right">
                            <span>{{ $task->duration }}</span>
                        </div>
                    </li>
                    <li>
                        Project
                        <div class="uk-align-right">
                            <span>{{ $task->project->name }}</span>
                        </div>
                    </li>
                    <li>
                        Customer
                        <div class="uk-align-right">
                            <span>{{ $task->project->customer->designation }}</span>
                        </div>
                    </li>
                    <li>
                        Task description
                        <div class="uk-align-right">
                            <span>{{ $task->description }}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-layouts.app>
