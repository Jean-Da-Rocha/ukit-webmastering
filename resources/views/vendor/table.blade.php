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

        <div class="uk-align-right">
            <label for="perPage"></label>
            <select name="perPage" id="perPage" class="uk-select uk-width-small" wire:model="perPage">
                @foreach ($perPageOptions as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="uk-text-primary">
        Results: {{ $models->count() }} / {{ $models->total() }}
    </div>

    <table class="uk-table uk-table-middle uk-table-hover uk-table-divider uk-table-responsive">
        <thead style="background-color: #373c40;">
            <tr>
                @foreach ($columns as $column)
                    @if ($column->hasVisibleColumn())
                        @if ($column->isSortable())
                            <th style="color: #fff;">
                                <span style="cursor: pointer;" wire:click="sort('{{ $column->getAttribute() }}')">
                                    {{ $column->getText() }}
                                    @if ($sortField === $column->getAttribute())
                                        @if ($sortDirection === 'asc')
                                            <span>&#8648;</span>
                                        @else
                                            <span>&#8650;</span>
                                        @endif
                                    @else
                                        <span>&#8645;</span>
                                    @endif
                                </span>
                            </th>
                        @else
                            <th style="color: #fff;">
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
</div>
