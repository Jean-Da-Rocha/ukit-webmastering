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
        @if ($models->count() > 0)
            <div>
                <a
                    href="{{ has_route($models[0]->getTable() . '.create') }}"
                    class="uk-button uk-button-secondary uk-button-small"
                    title="Add a new entity"
                >
                    <x-heroicon-s-plus /> Add
                </a>
            </div>
        @endif
    </div>

    <table class="uk-table uk-table-middle uk-table-hover uk-table-divider uk-table-responsive">
        <thead class="uk-darken">
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
                <tr>
                    <td>No results to display</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $models->links('vendor.pagination') }}

    <x-utils.delete_confirmation_modal />
</div>
