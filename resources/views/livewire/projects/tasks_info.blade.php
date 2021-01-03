<div class="uk-width-2-3@l uk-width-1-1@m">
    <div class="uk-card uk-card-default uk-height-1-1">
        <div class="uk-card-header uk-background-primary">
            <div class="uk-text-center uk-text-white">
                <b>{{ ucfirst($project->name) }}</b>'s project details
            </div>
        </div>
        <div class="uk-card-body">
            <ul class="uk-list uk-list-divider">
                <li>
                    Total time spent on these tasks
                    <div class="uk-align-right">
                        <span class="uk-badge">{{ $totalTasksTime }}</span>
                    </div>
                </li>
                <li>
                    Number of tasks for this project
                    <div class="uk-align-right">
                        <span class="uk-badge">{{ $numberOfTasks }}</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
