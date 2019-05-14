<header id="header" data-sticky-container>
        <div class="sticky sticky-topbar" data-sticky data-options="anchor: page; marginTop: 0; stickyOn: small;">
            <nav class="grid-x top-bar topbar-responsive padding-content">
                <div class="cell medium-shrink top-bar-title">
                    <span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
                        <button class="menu-icon" type="button" data-toggle></button>
                    </span>
                    <a href="{{ route('home.index') }}" class="topbar-responsive-logo">
                        <img src="{{ asset( config( 'app.logo' ) ) }}" alt="@lang('header.images.logo')"/>
                    </a>
                </div>
                <div id="topbar-responsive" class="cell medium-auto topbar-responsive-links align-self-stretch">
                    <ul class="menu vertical medium-horizontal float-right" data-smooth-scroll>
                        <li><a href="#home">@lang('menu.top_menu.home')</a></li>
                        <li><a href="#about">@lang('menu.top_menu.learn')</a></li>
                        <li><a href="#service">@lang('menu.top_menu.share')</a></li>
                        <li><a href="#news">@lang('menu.top_menu.give')</a></li>
                        <li><a href="#contact">@lang('menu.top_menu.events')</a></li>
                        <li><a href="#contact">@lang('menu.top_menu.news')</a></li>
                        <li><a href="#contact">@lang('menu.top_menu.organization')</a></li>
                    </ul>
                </div>
                <div class="cell medium-shrink align-self-middle">
                    <ul class="user-profile float-left no-bullet">
                        <li><a href="#home">@lang('menu.profile_menu.sign_up')</a></li>
                        <li><a href="#about">@lang('menu.profile_menu.log_in')</a></li>                  
                    </ul>
                    <ul class="language float-right no-bullet"> 
                        @foreach( config('app.language_codes') as $languageCode )
                    <li class="{{$languageCode}}">
                                <a href="{{ route( 'language.change', [ 'languageCode' => $languageCode ] ) }}">
                                    @lang( 'languages.' . $languageCode )
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
    </header>