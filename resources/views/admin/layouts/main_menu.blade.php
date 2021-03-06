@if( $menuItem['url'] !== '#' || count( $menuItem['childMenu'] ) )
    @if(count( $menuItem['childMenu'] ))
        <li class="accordion-item {{ ( Request::is('admin/' . $menuItem['name'] . '/*') || Request::is('admin/' . $menuItem['name'] ))  ? 'is-active' : '' }}"
            data-accordion-item
        >
            <a class="accordion-title" href="{{ $menuItem['url'] }}">
                {{ $menuItem['menuText'] }}
            </a>
            @if( count( $menuItem['childMenu'] ) )
                <div class="accordion-content" data-tab-content>
                    @each( 'admin.layouts.main_menu', $menuItem['childMenu'], 'menuItem' )
                </div>
            @endif
        </li>
    @else
        <a href="{{ $menuItem['url'] }}" class="{{ $menuItem['url'] === url()->current() ? $menuItem['active'] : '' }}">
            <i class="fas fa-caret-right"></i>
            {{ $menuItem['menuText'] }}
        </a>
        @each( 'admin.layouts.main_menu', $menuItem['childMenu'], 'menuItem' )
    @endif
@endif
