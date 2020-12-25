<div>
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    @if ($updateMode)
                        Edit <b>{{ $project->name }}</b> project info
                    @else
                        Create a new project
                    @endif
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-margin">
                    <label class="uk-form-label" for="project.category_id">
                        Project type
                    </label>
                    <select
                        class="uk-select @error('project.category_id') uk-form-danger @enderror"
                        name="project.category_id"
                        id="project.category_id"
                        wire:model.defer="project.category_id"
                        required
                    >
                        @foreach ($projectCategories as $projectCategory)
                            <option value="{{ $projectCategory->id }}">
                                {{ $projectCategory->type }}
                            </option>
                        @endforeach
                    </select>
                    @error('project.category_id')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="project.customer_id">
                        Customer
                    </label>
                    <select
                        class="uk-select @error('project.customer_id') uk-form-danger @enderror"
                        name="project.customer_id"
                        id="project.customer_id"
                        wire:model.defer="project.customer_id"
                        required
                    >
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">
                                {{ $customer->designation }}
                            </option>
                        @endforeach
                    </select>
                    @error('project.customer_id')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="project.name">
                        Project name
                    </label>
                    <input
                        type="text"
                        class="uk-input @error('project.name') uk-form-danger @enderror"
                        name="project.name"
                        id="project.name"
                        wire:model.defer="project.name"
                        required
                    />
                    @error('project.name')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="project.starting_date">
                        Project starting date
                    </label>
                    <div class="uk-inline uk-width-1-1">
                        <input
                            type="date"
                            class="uk-input @error('project.starting_date') uk-form-danger @enderror"
                            name="project.starting_date"
                            id="project.starting_date"
                            wire:model.defer="project.starting_date"
                            required
                        />
                        <div class="append-calendar-icon">
                            <x-heroicon-o-calendar />
                        </div>
                        @error('project.starting_date')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="project.description">
                        Project description
                    </label>
                    <textarea
                        class="uk-textarea @error('project.description') uk-form-danger @enderror"
                        name="project.description"
                        id="project.description"
                        cols="30"
                        rows="10"
                        wire:model.defer="project.description"
                    ></textarea>
                    @error('project.description')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin uk-align-right">
                    <a
                        href="{{ route('projects.index') }}"
                        class="uk-button uk-button-secondary"
                    >
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="uk-button uk-button-primary"
                    >
                        {{ $updateMode ? 'Save' : 'Create' }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
