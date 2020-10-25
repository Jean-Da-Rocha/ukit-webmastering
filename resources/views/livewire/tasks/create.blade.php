<div>
    <form>
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    Create a task
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-margin">
                    <label for="project_id" class="uk-form-label">
                        Project
                    </label>
                    <select
                        class="uk-select @error('project_id') uk-form-danger @enderror"
                        name="project_id"
                        id="project_id"
                        required
                    >
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">
                                {{ $project->project_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('project_id')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin" x-data="{ show: false }">
                    <label for="quoted" class="uk-form-label">
                        Task quoted
                    </label>
                    <select
                        class="uk-select"
                        name="quoted"
                        id="quoted"
                        required
                        x-on:change="show = !show"
                    >
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <template x-if="show">
                        <div class="uk-margin">
                            <label for="quotation_ref" class="uk-form-label">
                                Quotation reference
                            </label>
                            <input
                                type="text"
                                class="uk-input"
                                name="quotation_ref"
                                id="quotation_ref"
                            />
                        </div>
                    </template>
                </div>
                <div class="uk-margin" x-data="{ show: false }">
                    <label for="billed" class="uk-form-label">
                        Task billed
                    </label>
                    <select
                        class="uk-select"
                        name="billed"
                        id="billed"
                        required
                        x-on:change="show = !show"
                    >
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <template x-if="show">
                        <div class="uk-margin">
                            <label for="bill_num" class="uk-form-label">
                                Bill number
                            </label>
                            <input
                                type="text"
                                class="uk-input"
                                name="bill_num"
                                id="bill_num"
                                x-ref="bill_num"
                            />
                        </div>
                    </template>
                </div>
                <div class="uk-margin">
                    <label for="task_duration" class="uk-form-label">
                        Time spent on this task
                    </label>
                    <div class="uk-inline uk-width-1-1">
                        <input
                            type="time"
                            class="uk-input @error('task_duration') uk-form-danger @enderror test-time"
                            name="task_duration"
                            id="task_duration"
                        />
                        @error('task_duration')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="task_starting_date" class="uk-form-label">
                        Task starting date
                    </label>
                    <div class="uk-inline uk-width-1-1">
                        <input
                            type="date"
                            class="uk-input @error('task_starting_date') uk-form-danger @enderror"
                            id="task_starting_date"
                            name="task_starting_date"
                            required
                        />
                        @error('task_starting_date')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="task_name" class="uk-form-label">Task name</label>
                    <input
                        type="text"
                        class="uk-input @error('task_name') uk-form-danger @enderror"
                        name="task_name"
                        id="task_name"
                    />
                    @error('task_name')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label for="task_description" class="uk-form-label">
                        Task description
                    </label>
                    <textarea
                        class="uk-textarea @error('task_description') uk-form-danger @enderror"
                        name="task_description"
                        id="task_description"
                        cols="30"
                        rows="10"
                    ></textarea>
                    @error('task_description')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin uk-align-right">
                    <a
                        href="{{ route('tasks.index') }}"
                        class="uk-button uk-button-secondary"
                        title="Go back to tasks list"
                    >
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="uk-button uk-button-primary"
                        title="Create a new task"
                    >
                        Create
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
