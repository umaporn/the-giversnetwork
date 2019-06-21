@if( $menuItem['url'] !== '#' || count( $menuItem['childMenu'] ) )

    @if(isset( $menuItem['parentMenu'] ) )
        <li class="accordion-item {{ $menuItem['active'] }}" data-accordion-item>
            @endif

            <a class="accordion-title" href="{{ $menuItem['url'] }}">
                {{ $menuItem['menuText'] }}
            </a>
            @if( count( $menuItem['childMenu'] ) )
                <div class="accordion-content" data-tab-content>
                    @each( 'admin.layouts.main_menu', $menuItem['childMenu'], 'menuItem' )
                </div>
            @endif

            @if(isset( $menuItem['parentMenu'] ))
        </li>
    @endif
@endif
{{--
<li class="accordion-item" data-accordion-item>
    <a href="#" class="accordion-title">Give</a>
    <div class="accordion-content" data-tab-content>
        <a href="{{ route('admin.giveAll') }}"><i class="fas fa-caret-right"></i> All Give</a>
        <a href="{{ route('admin.recAll') }}"><i class="fas fa-caret-right"></i> All Receive</a>
        <a href="{{ route('admin.giveAdd') }}"><i class="fas fa-caret-right"></i> Add Give & Recive</a>
    </div>
</li>
--}}
