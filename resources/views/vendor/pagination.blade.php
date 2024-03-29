@if ($paginator->hasPages())
    <ul class="uk-pagination">
        {{-- Previous Page Link --}}
        @unless ($paginator->onFirstPage())
            <li>
                <a href="#/" wire:click="previousPage" rel="prev" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">
                        <x-heroicon-o-chevron-double-left />
                    </span>
                </a>
            </li>
        @endunless

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="uk-disabled" aria-disabled="true">
                    <span>{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page === $paginator->currentPage())
                        <li class="uk-active" aria-current="page">
                            <span>{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="#/" wire:click="gotoPage({{ $page }})">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="#/" wire:click="nextPage" rel="next" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">
                        <x-heroicon-o-chevron-double-right />
                    </span>
                </a>
            </li>
        @endif
    </ul>
@endif
