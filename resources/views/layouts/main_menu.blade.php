@if( $menuItem['url'] != '#' || count( $menuItem['childMenu'] ) )
    <li class="{{ $menuItem['active'] }}">
        <a class="button" href="{{ $menuItem['url'] }}">
            {{ $menuItem['menuText'] }}
        </a>
        @if( count( $menuItem['childMenu'] ) )
            <ul class="menu nested">
                @each( 'layouts.main_menu', $menuItem['childMenu'], 'menu' )
            </ul>
        @endif
    </li>
@endif
