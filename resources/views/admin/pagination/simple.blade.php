@if( $paginator->hasPages() )
    <ul class="pagination text-center" role="navigation" aria-label="{{ trans('pagination.pagination') }}">
        <!-- Previous Page Link -->
        @if( $paginator->onFirstPage() )
            <li class="pagination-previous disabled">
                {{ trans('pagination.previous') }} <span class="show-for-sr">{{ trans('pagination.page') }}</span>
            </li>
        @else
            <li class="pagination-previous">
                <a href="{{ $paginator->previousPageUrl() }}"
                    aria-label="{{ trans('pagination.previous') }} {{ trans('pagination.page') }}"
                >
                    {{ trans('pagination.previous') }} <span class="show-for-sr">{{ trans('pagination.page') }}</span>
                </a>
            </li>
        @endif

        <!-- Next Page Link -->
        @if( $paginator->hasMorePages() )
            <li class="pagination-next">
                <a href="{{ $paginator->nextPageUrl() }}"
                    aria-label="{{ trans('pagination.next') }} {{ trans('pagination.page') }}"
                >
                    {{ trans('pagination.next') }} <span class="show-for-sr">{{ trans('pagination.page') }}</span>
                </a>
            </li>
        @else
            <li class="pagination-next disabled">
                {{ trans('pagination.next') }} <span class="show-for-sr">{{ trans('pagination.page') }}</span>
            </li>
        @endif
    </ul>
@endif
