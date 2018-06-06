<div class="no-js">
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
                    <li><a href="{{ route('register') }}">@lang('register.page_link.index')</a></li>
                @else
                    <li>
                        <a href="{{ route('user.getProfile') }}" title="@lang('user.links.profile')">
                            {{ Auth::user()->getAuthIdentifier() }}
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
    </div>
</div>