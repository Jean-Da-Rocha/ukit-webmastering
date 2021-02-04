<x-layouts.app>
    <div class="uk-child-width-1-2@l uk-child-width-1-1@m uk-grid-match" data-uk-grid>
        <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-card-title">Global stats</h3>
            {!! $globalStatsChart->render() !!}
        </div>
        <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-card-title">User role distribution</h3>
            {!! $userRoleChart->render() !!}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</x-layouts.app>
