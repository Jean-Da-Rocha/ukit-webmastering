<x-layouts.app>
    <div class="uk-width-1-2@l uk-child-width-1-1@m">
        <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-card-title">Global stats</h3>
            {!! $globalStatsChart->render() !!}
        </div>
    </div>
    <div class="uk-width-1-2@l uk-width-1-1@m">
        <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-card-title">User role distribution</h3>
            {!! $userRoleChart->render() !!}
        </div>
    </div>
    <div class="uk-width-1-2@l uk-width-1-1@m uk-margin-medium">
        <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-card-title">Users with most tasks</h3>
            {!! $userTasksChart->render() !!}
        </div>
    </div>
    <div class="uk-width-1-2@l uk-width-1-1@m uk-margin-medium">
        <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-card-title">Most expensive hostings (€)</h3>
            {!! $expensiveHostingsChart->render() !!}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</x-layouts.app>
