@if( $paginator->hasPages() )
    <ul class="pagination text-right" aria-label="{{ __('pagination.pagination') }}">
        <!-- Previous Page Link -->
        @if( $paginator->onFirstPage() )
            <li class="pagination-previous disabled">
                <span class="show-for-sr">{{ __('pagination.page') }}</span>
            </li>
        @else
            <li class="pagination-previous">
                <a href="{{ $paginator->previousPageUrl() }}"
                    aria-label="{{ __('pagination.previous') }} {{ __('pagination.page') }}"
                >
                    <span class="show-for-sr">{{ __('pagination.page') }}</span>
                </a>
            </li>
        @endif

        <!-- Pagination Elements -->
        @foreach( $elements as $element )
            <!-- "Three Dots" Separator -->
            @if( is_string( $element ) )
                <li class="ellipsis" aria-hidden="true"></li>
            @endif

            <!-- Array Of Links -->
            @if( is_array( $element ) )
                @foreach( $element as $page => $url )
                    @if( $page == $paginator->currentPage() )
                        <li class="current"><span class="show-for-sr">{{ __('pagination.current') }}</span>{{ $page }}</li>
                    @else
                        <li><a href="{{ $url }}" aria-label="Page {{ $page }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if( $paginator->hasMorePages() )
            <li class="pagination-next">
                <a href="{{ $paginator->nextPageUrl() }}"
                    aria-label="{{ __('pagination.next') }} {{ __('pagination.page') }}"
                >
                    <span class="show-for-sr">{{ __('pagination.page') }}</span>
                </a>
            </li>
        @else
            <li class="pagination-next disabled">
                <span class="show-for-sr">{{ __('pagination.page') }}</span>
            </li>
        @endif
    </ul>
@endif
