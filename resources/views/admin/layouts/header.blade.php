<header>
    <div class="grid-container">
        <section class="hide-for-print">
            <section class="top-header">
                @include( 'admin.layouts.top_menu' )
            </section>
            @if( Auth::user() )
            <section class="main-menu">
                <nav>
                    <ul class="vertical medium-horizontal menu" data-responsive-menu="accordion medium-dropdown">
                        @each( 'admin.layouts.main_menu', $mainMenuAdmin, 'menuItem' )
                    </ul>
                </nav>
            </section>
            @endif
        </section>
    </div>
</header>