<table class="uk-table uk-table-middle uk-table-hover uk-table-divider uk-table-responsive {{ $tableClass }}">
    <thead class="{{ $theadClass }}">
        <tr>
            @foreach ($columns as $column)
                <th>
                    @if ($column->sortable)
                        <span style="cursor: pointer;" wire:click="sort('{{ $column->attribute }}')">
                            {{ $column->heading }}
                            @if ($sortAttribute === $column->attribute)
                                <span data-uk-icon="arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></span>
                            @else
                                <span data-uk-icon="arrow-up"></span>
                            @endif
                        </span>
                    @else
                        {{ $column->heading }}
                    @endif
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @forelse ($models as $model)
            <tr>
                @foreach ($columns as $column)
                    <td>
                        @if ($column->view)
                            {{-- TODO: convert to Laravel 7/8 component. --}}
                            @include($column->view)
                        @else
                           {{ Arr::get($model->toArray(), $column->attribute) }}
                        @endif
                    </td>
                @endforeach
            </tr>
        @empty
            <tr>
                <td>No results to display</td>
            </tr>
        @endforelse
    </tbody>
</table>
