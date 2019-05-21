{{--<div class="no-js">
    <div class="title-bar" data-responsive-toggle="top-menu" data-hide-for="medium">
        <button class="menu-icon" type="button" data-toggle="top-menu"></button>
        <div class="title-bar-title">@lang('app.top_menu')</div>
    </div>
    <div class="top-menu top-bar" id="top-menu">
        <div class="top-bar-right">
            <ul class="language menu">
                @foreach( config('app.language_codes') as $languageCode )
                    <li>
                        <a href="{{ route( 'language.change', [ 'languageCode' => $languageCode ] ) }}">
                            @lang( 'languages.' . $languageCode )
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul class="menu">
                @if( Auth::guest() )
                    <li><a href="{{ route('login') }}">@lang('login.page_link.index')</a></li>
                    <li><a href="{{ route('admin.login') }}">@lang('login_admin.page_link.index')</a></li>
                    <li><a href="{{ route('register') }}">@lang('register.page_link.index')</a></li>
                @else
                    <li>
                        <a href="{{ route('user.getProfile') }}" title="@lang('user.links.profile')">
                            {{ Auth::user()->username }}
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit">@lang('login.logout_button')</button>
                        </form>
                    </li>
                @endif
            </ul>--}}

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
                    @if( Auth::guest() )
                        @each( 'layouts.main_menu', $mainMenu, 'menuItem' )
                        {{--<li><a href="{{ route('login') }}">@lang('login.page_link.index')</a></li>
                        <li><a href="{{ route('admin.login') }}">@lang('login_admin.page_link.index')</a></li>
                        <li><a href="{{ route('register') }}">@lang('register.page_link.index')</a></li>--}}
                    @else
                        <li>
                            <a href="{{ route('user.getProfile') }}" title="@lang('user.links.profile')">
                                {{ Auth::user()->username }}
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit">@lang('login.logout_button')</button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="cell medium-shrink align-self-middle">
                <ul class="user-profile float-left no-bullet">
                {{--    <li><a href="">@lang('menu.profile_menu.sign_up')</a></li>
                    <li><a href="">@lang('menu.profile_menu.log_in')</a></li>--}}
                    <li><a href="{{ route('login') }}">@lang('login.page_link.index')</a></li>
                    <li><a href="{{ route('admin.login') }}">@lang('login_admin.page_link.index')</a></li>
                    <li><a href="{{ route('register') }}">@lang('register.page_link.index')</a></li>
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