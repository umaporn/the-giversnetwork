<header id="header" data-sticky-container>
    <div class="sticky sticky-topbar" data-sticky data-options="anchor: page; marginTop: 0; stickyOn: xlarge;">
        <nav class="grid-x topbar-responsive padding-content">
            <div class="cell large-shrink top-bar-title">
				<span data-responsive-toggle="topbar-responsive" data-hide-for="large">
					<button class="menu-icon" type="button" data-toggle></button>
				</span>
                <a href="{{ route('home.index') }}" class="topbar-responsive-logo">
                    <img src="{{ asset( config( 'app.logo' ) ) }}" alt="@lang('header.images.logo')"/>
                </a>
            </div>
            <div class="cell large-auto topbar-responsive-links align-self-stretch" id="topbar-responsive">
                <ul class="menu vertical medium-horizontal float-right" data-smooth-scroll>
                    @each( 'layouts.main_menu', $mainMenu, 'menuItem' )
                </ul>
            </div>
            <div class="cell large-shrink align-self-middle grid-middle">
                @if( Auth::guest() )
                    <ul class="user-profile float-left no-bullet">
                        <li><a href="{{ route('register') }}">@lang('register.page_link.index')</a></li>
                        <li><a data-open="login">@lang('login.page_link.index')</a></li>
                    </ul>

                    <div class="reveal modal-style" id="login" data-reveal>
                        <h2 class="modal-topic">Login</h2>
                        <div class="modal-content">

                            @include('auth.login')

                            <div class="grid-x align-middle login-line">
                                <div class="cell line auto"></div>
                                <div class="cell shrink">
									<span class="outline-dot float-right">
										<span class="dot"></span>
									</span>
                                </div>
                            </div>
                            <article class="login-signup">
                                @lang('login.are_you_new')
                                <a href="{{ route('register') }}">@lang('register.page_link.index')</a>
                            </article>
                        </div>
                        <button class="close-button" data-close aria-label="Close reveal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if( Auth::user() )
                    <section class="user-profile-after" data-toggle="user-menu">
                        <figure class="user-profile-image">
                            <img src="{{ Auth::user()->image_path ? Storage::url( Auth::user()->image_path ) : asset( config( 'images.home.profile.user_profile' ) ) }}"
                                 alt="{{ Auth::user()->username }}">
                        </figure>
                        <p class="user-profile-name">{{ Auth::user()->username }} <i class="fas fa-caret-down"></i></p>
                        <div class="dropdown-pane user-menu" id="user-menu" data-dropdown data-hover="true">
                            <ul class="user-menu-show">
                                <li>
                                    <a href="{{ route('user.editProfile') }}">
                                        <i class="fas fa-user-edit"></i> @lang('user.edit_profile')
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.getProfile') }}">
                                        <i class="fas fa-user-circle"></i> @lang('user.view_profile')
                                    </a>
                                </li>
                                @if( Auth::user()->fk_permission_id === 1 )
                                    <li>
                                        <a href="{{ route('admin.home.index') }}">
                                            <i class="fa fa-cog"></i> @lang('admin.admin_panel')
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" name="logout">
                                        {{ csrf_field() }}
                                        <a onclick="document.logout.submit();">
                                            <i class="fas fa-sign-out-alt"></i> @lang('login.logout_button')
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </section>
                @endif
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