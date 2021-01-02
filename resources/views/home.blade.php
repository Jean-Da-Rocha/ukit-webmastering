<x-layouts.app>
    <div class="uk-child-width-1-2@s uk-grid-match" data-uk-grid>
        <div>
            <div class="uk-card uk-card-primary uk-card-hover uk-card-body">
                <h3 class="uk-card-title">Number of projects</h3>
                <p class="uk-text-lead" style="color: #fff;">
                    <span data-uk-icon="git-branch"></span> {{ $totalProjects }}
                </p>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-primary uk-card-hover uk-card-body">
                <h3 class="uk-card-title">Number of tasks</h3>
                <p class="uk-text-lead" style="color: #fff;">
                    <span data-uk-icon="file-text"></span> {{ $totalTasks }}
                </p>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-secondary uk-card-hover uk-card-body uk-light">
                <h3 class="uk-card-title">Number of customers</h3>
                <p class="uk-text-lead" style="color: #fff;">
                    <span data-uk-icon="users"></span> {{ $totalCustomers }}
                </p>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-secondary uk-card-hover uk-card-body uk-light">
                <h3 class="uk-card-title">Number of users</h3>
                <p class="uk-text-lead" style="color: #fff;">
                    <span data-uk-icon="user"></span> {{ $totalUsers }}
                </p>
            </div>
        </div>
    </div>
</x-layouts.app>
