<div>

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
    </div>

    <table class="uk-table uk-table-middle uk-table-hover uk-table-divider uk-table-responsive">
        <thead>
            <tr>
                @foreach ($columns as $column)
                    @if ($column->isVisible())
                        @if ($column->isSortable())
                            <th>
                                <span style="cursor: pointer;" wire:click="sort('{{ $column->getAttribute() }}')">
                                    {{ $column->getText() }}
                                    @if ($sortField === $column->getAttribute())
                                        <span data-uk-icon="arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></span>
                                    @else
                                        <span data-uk-icon="arrow-up"></span>
                                    @endif
                                </span>
                            </th>
                        @else
                            <th>
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
                        @if ($column->isVisible())
                            <td>
                                @if ($column->getView())
                                    @include($column->getView())
                                @else
                                    {{ Arr::get($model->toArray(), $column->getAttribute()) }}
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

    {{ $models->links() }}
</div>
