<header>
    <div class="grid-container">
        <section class="hide-for-print">
            <section class="top-header">
                @include( 'layouts.top_menu' )
                <div class="logo">
                    <a href="{{ route('home.index') }}">
                        <img src="{{ asset( config( 'app.logo' ) ) }}" alt="@lang('header.images.logo')"/>
                    </a>
                </div>
            </section>
        </section>
    </div>
</header>