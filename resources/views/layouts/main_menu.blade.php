@if( $menuItem['url'] != '#' || count( $menuItem['childMenu'] ) )
    <li>
        <a href="{{ $menuItem['url'] }}">{{ $menuItem['menuText'] }}</a>
        @if( count( $menuItem['childMenu'] ) )
            <ul class="menu vertical">
                @each( 'layouts.main_menu', $menuItem['childMenu'], 'menuItem' )
            </ul>
        @endif
    </li>
@endif