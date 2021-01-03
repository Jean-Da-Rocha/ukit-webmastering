<x-layouts.app>
    <div>
        <div data-uk-grid>
            {{-- Left card --}}
            <livewire:actions.projects.get-tasks-info :project="$project"/>

            {{-- Right card --}}
            <livewire:actions.projects.user-dropdown :project="$project"/>

            {{-- Tasks list component for the given project --}}
            <div class="uk-width-1-1">
                <hr class="uk-divider-icon">
                <livewire:tables.project-tasks-table :id="$project->id" />
            </div>
        </div>
    </div>
</x-layouts.app>
