<div>
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    @if ($updateMode)
                        Edit <b>{{ $task->name }}</b> task info
                    @else
                        Create a new task
                    @endif
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-margin">
                    <label for="task.project_id" class="uk-form-label">
                        Project
                    </label>
                    <select
                        class="uk-select @error('task.project_id') uk-form-danger @enderror"
                        name="task.project_id"
                        id="task.project_id"
                        wire:model.defer="task.project_id"
                        required
                    >
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">
                                {{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('task.project_id')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin" x-data="{ show: $wire.task.quoted }">
                    <label for="task.quoted" class="uk-form-label">
                        Task quoted
                    </label>
                    <select
                        class="uk-select @error('task.quoted') uk-form-danger @enderror"
                        name="task.quoted"
                        id="task.quoted"
                        x-on:change="show = !show, $refs.quotation_ref.value = ''"
                        wire:model.defer="task.quoted"
                        required
                    >
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    @error('task.quoted')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="uk-margin" x-show="show" x-cloak>
                        <label for="task.quotation_ref" class="uk-form-label">
                            Quotation reference
                        </label>
                        <input
                            type="text"
                            class="uk-input @error('task.quotation_ref') uk-form-danger @enderror"
                            name="task.quotation_ref"
                            id="task.quotation_ref"
                            x-ref="quotation_ref"
                            wire:model.defer="task.quotation_ref"
                        />
                    </div>
                    @error('task.quotation_ref')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin" x-data="{ show: $wire.task.billed }">
                    <label for="task.billed" class="uk-form-label">
                        Task billed
                    </label>
                    <select
                        class="uk-select @error('task.billed') uk-form-danger @enderror"
                        name="task.billed"
                        id="task.billed"
                        x-on:change="show = !show, $refs.bill_num.value = ''"
                        wire:model.defer="task.billed"
                        required
                    >
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    @error('task.billed')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="uk-margin" x-show="show" x-cloak>
                        <label for="task.bill_num" class="uk-form-label">
                            Bill number
                        </label>
                        <input
                            type="text"
                            class="uk-input @error('task.bill_num') uk-form-danger @enderror"
                            name="task.bill_num"
                            id="task.bill_num"
                            x-ref="bill_num"
                            wire:model.defer="task.bill_num"
                        />
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="task.duration" class="uk-form-label">
                        Time spent on this task
                    </label>
                    <div class="uk-inline uk-width-1-1">
                        <input
                            type="time"
                            class="uk-input @error('task.duration') uk-form-danger @enderror"
                            name="task.duration"
                            id="task.duration"
                            wire:model.defer="task.duration"
                        />
                        <div class="append-clock-icon">
                            <x-heroicon-o-clock />
                        </div>
                        @error('task.duration')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="task.starting_date" class="uk-form-label">
                        Task starting date
                    </label>
                    <div class="uk-inline uk-width-1-1">
                        <input
                            type="date"
                            class="uk-input @error('task.starting_date') uk-form-danger @enderror"
                            id="task.starting_date"
                            name="task.starting_date"
                            wire:model.defer="task.starting_date"
                            required
                        />
                        <div class="append-calendar-icon">
                            <x-heroicon-o-calendar />
                        </div>
                        @error('task.starting_date')
                            <span class="uk-text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="task.name" class="uk-form-label">Task name</label>
                    <input
                        type="text"
                        class="uk-input @error('task.name') uk-form-danger @enderror"
                        name="task.name"
                        id="task.name"
                        wire:model.defer="task.name"
                        required
                    />
                    @error('task.name')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label for="task.description" class="uk-form-label">
                        Task description
                    </label>
                    <textarea
                        class="uk-textarea @error('task.description') uk-form-danger @enderror"
                        name="task.description"
                        id="task.description"
                        cols="30"
                        rows="10"
                        wire:model.defer="task.description"
                    ></textarea>
                    @error('task.description')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin uk-align-right">
                    <a
                        href="{{ route('tasks.index') }}"
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
