<div>
    <x-utils.message />

    <div class="uk-margin">
        <form class="uk-search uk-search-default">
            <span class="uk-search-icon-flip" data-uk-search-icon wire:ignore></span>
            <input
                class="uk-search-input"
                type="search"
                placeholder="Search..."
                @if (is_numeric($searchDebounce) && $searchUpdateMethod === 'debounce')
                    wire:model.debounce.{{ $searchDebounce }}ms="search"
                @endif
                @if ($searchUpdateMethod === 'lazy') wire:model.lazy="search" @endif
            />
        </form>

        <div class="uk-align-right">
            <label for="perPage"></label>
            <select name="perPage" id="perPage" class="uk-select uk-width-small" wire:model="perPage">
                @foreach ($perPageOptions as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="uk-flex uk-flex-between uk-width-1-1">
        <p class="uk-text-primary">
            Results: {{ $models->count() }} / {{ $models->total() }}
        </p>
        @if ($models->count())
            <div>
                <a
                    href="{{ has_route($models->first()->getTable() . '.create') }}"
                    class="uk-button uk-button-secondary uk-button-small"
                    title="Add a new entity"
                >
                    <x-heroicon-s-plus /> Add
                </a>
            </div>
        @endif
    </div>

    @if ($models->count() && isset($exportRouteName) && Route::has($exportRouteName))
        <div class="uk-margin">
            <a
                href="{{ route($exportRouteName, $exportRouteParam ?? []) }}"
                class="uk-button uk-button-primary"
                title="Export {{ $models->first()->getTable() }} data to .xlsx (excel) format"
            >
                <x-heroicon-o-document-download />
            </a>
        </div>
    @endif

    <table class="uk-table uk-table-middle uk-table-responsive">
        <thead>
            <tr>
                @foreach ($columns as $column)
                    @if ($column->hasVisibleColumn())
                        @if ($column->isSortable())
                            <th class="uk-text-white">
                                <span style="cursor: pointer;" wire:click="sort('{{ $column->getAttribute() }}')">
                                    {{ $column->getText() }}
                                    @if ($sortField === $column->getAttribute())
                                        @if ($sortDirection === 'asc')
                                            <x-heroicon-s-arrow-narrow-up />
                                        @else
                                            <x-heroicon-s-arrow-narrow-down />
                                        @endif
                                    @else
                                        <x-heroicon-o-switch-vertical />
                                    @endif
                                </span>
                            </th>
                        @else
                            <th class="uk-text-white">
                                {{ $column->getText() }}
                            </th>
                        @endif
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse ($models as $model)
                <tr>
                    @foreach ($columns as $column)
                        @if ($column->hasVisibleRow())
                            <td>
                                @if ($column->getViewName())
                                    @include($column->getViewName())
                                @elseif ($column->isFormatted())
                                    @if ($column->isRaw())
                                        {!! $column->formatted($model, $column) !!}
                                    @else
                                        {{ $column->formatted($model, $column) }}
                                    @endif
                                @elseif ($column->isRaw())
                                    {!! $column->getHtmlContent() !!}
                                @else
                                    {{ data_get($model, $column->getAttribute()) }}
                                @endif
                            </td>
                        @endif
                    @endforeach
                </tr>
            @empty
                <tr class="uk-text-center">
                    <td colspan="{{ count($columns) }}">
                        No results to display
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $models->links('vendor.pagination') }}

    <x-utils.delete_confirmation_modal />
</div>
