<div>
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-background-primary">
                <div class="uk-text-center uk-text-white">
                    @if ($updateMode)
                        Update <b>{{ $category->type }}</b> project category info
                    @else
                        Add a new project category
                    @endif
                </div>
            </div>
            <div class="uk-card-body">
                <div class="uk-margin">
                    <label for="category.type" class="uk-form-label">
                        Project category type
                    </label>
                    <input
                        type="text"
                        class="uk-input @error('category.type') uk-form-danger @enderror"
                        name="category.type"
                        id="category.type"
                        wire:model.defer="category.type"
                        required
                    />
                    @error('category.type')
                        <span class="uk-text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="uk-margin uk-align-right">
                    <a
                        href="{{ route('categories.index') }}"
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
