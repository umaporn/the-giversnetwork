<header>
    <div class="row columns">
        <section class="hide-for-print">
            <section class="top-header">
                @include( 'layouts.top_menu' )
                <div class="logo">
                    <a href="{{ route('home.index') }}">
                        <img src="{{ asset( config( 'app.logo' ) ) }}" alt="{{ trans('header.images.logo') }}"/>
                    </a>
                </div>
            </section>
            <section class="main-menu">
                <nav>
                    <ul class="dropdown menu" data-dropdown-menu>
                        @each( 'layouts.main_menu', $mainMenu, 'menuItem' )
                    </ul>
                </nav>
            </section>
        </section>
    </div>
</header>