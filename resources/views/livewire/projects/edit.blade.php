<div>
    <form wire:submit.prevent="update">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    Edit <b>{{ $project->project_name }}</b> project info
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
                        wire:model.lazy="project.category_id"
                        required
                    >
                        @foreach ($projectCategories as $projectCategory)
                            <option value="{{ $projectCategory->id }}">
                                {{ $projectCategory->category_type }}
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
                        wire:model.lazy="project.customer_id"
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
                    <label class="uk-form-label" for="project.project_name">
                        Project name
                    </label>
                    <input
                        type="text"
                        class="uk-input @error('project.project_name') uk-form-danger @enderror"
                        name="project.project_name"
                        id="project.project_name"
                        wire:model.lazy="project.project_name"
                        required
                    />
                    @error('project.project_name')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="project.project_starting_date">
                        Project starting date
                    </label>
                    <div class="uk-inline uk-width-1-1">
                        <input
                            type="date"
                            class="uk-input @error('project.project_starting_date') uk-form-danger @enderror"
                            name="project.project_starting_date"
                            id="project.project_starting_date"
                            wire:model.lazy="project.project_starting_date"
                            required
                        />
                        @error('project.project_starting_date')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="project.project_description">
                        Project description
                    </label>
                    <textarea
                        class="uk-textarea @error('project.project_description') uk-form-danger @enderror"
                        name="project.project_description"
                        id="project.project_description"
                        cols="30"
                        rows="10"
                        wire:model.lazy="project.project_description"
                    ></textarea>
                    @error('project.project_description')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin uk-align-right">
                    <a
                        href="{{ route('projects.index') }}"
                        class="uk-button uk-button-secondary"
                        title="Go back to projects list"
                    >
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="uk-button uk-button-primary"
                        title="Save modifications for this project"
                    >
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
