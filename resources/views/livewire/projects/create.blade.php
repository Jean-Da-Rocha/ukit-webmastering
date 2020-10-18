<div>
    <form wire:submit.prevent="store">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    Create a new project
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-margin">
                    <label class="uk-form-label" for="category_id">
                        Project type
                    </label>
                    <select
                        class="uk-select @error('category_id') uk-form-danger @enderror"
                        name="category_id"
                        id="category_id"
                        wire:model.lazy="category_id"
                        required
                    >
                        @foreach ($projectCategories as $projectCategory)
                            <option value="{{ $projectCategory->id }}">
                                {{ $projectCategory->category_type }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="customer_id">
                        Customer
                    </label>
                    <select
                        class="uk-select @error('customer_id') uk-form-danger @enderror"
                        name="customer_id"
                        id="customer_id"
                        wire:model.lazy="customer_id"
                        required
                    >
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">
                                {{ $customer->designation }}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="project_name">
                        Project name
                    </label>
                    <input
                        type="text"
                        class="uk-input @error('project_name') uk-form-danger @enderror"
                        name="project_name"
                        id="project_name"
                        wire:model.lazy="project_name"
                        required
                    />
                    @error('project_name')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="project_starting_date">
                        Project starting date
                    </label>
                    <div class="uk-inline uk-width-1-1">
                        <input
                            type="date"
                            class="uk-input @error('project_starting_date') uk-form-danger @enderror"
                            name="project_starting_date"
                            id="project_starting_date"
                            wire:model.lazy="project_starting_date"
                            required
                        />
                        @error('project_starting_date')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="project_description">
                        Project description
                    </label>
                    <textarea
                        class="uk-textarea @error('project_description') uk-form-danger @enderror"
                        name="project_description"
                        id="project_description"
                        cols="30"
                        rows="10"
                        wire:model.lazy="project_description"
                    ></textarea>
                    @error('project_description')
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
                        title="Create a new project"
                    >
                        Create
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
