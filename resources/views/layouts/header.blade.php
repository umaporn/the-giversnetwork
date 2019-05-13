<header>
    <div class="grid-container">
        <section class="hide-for-print">
            <section class="top-header">
                @include( 'layouts.top_menu' )
            </section>
            <section class="main-menu">
                <nav>
                    <ul class="vertical medium-horizontal menu" data-responsive-menu="accordion medium-dropdown">
                        @each( 'layouts.main_menu', $mainMenu, 'menuItem' )
                    </ul>
                </nav>
            </section>
        </section>
    </div>
</header>