<table class="uk-table uk-table-middle uk-table-hover uk-table-divider uk-table-responsive">
    <thead>
        <tr>
            @foreach ($columns as $column)
                @if ($column->isVisible())
                    @if ($column->isSortable())
                        <th>
                            <span style="cursor: pointer;" wire:click="sort('{{ $column->getAttribute() }}')">
                                {{ $column->getText() }}
                                @if ($sortAttribute === $column->getAttribute())
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
