@if( $menuItem['url'] !== '#' || count( $menuItem['childMenu'] ) )
    <li class="{{ $menuItem['active'] }}">
        <a class="button" href="{{ $menuItem['url'] }}">
            {{ $menuItem['menuText'] }}
        </a>
        @if( count( $menuItem['childMenu'] ) )
            <ul class="menu vertical nested">
                @each( 'admin.layouts.main_menu', $menuItem['childMenu'], 'menuItem' )
            </ul>
        @endif
    </li>
@endif
