<footer class="grid-container full">
    <div id="spinner" class="spinner-box"></div>
    <section class="join-us grid-x padding-content text-center">
        <div class="cell small-12 grid-x align-center">
            <h2 class="align-self-middle">@lang('footer.join_me')</h2>
            <a href="{{ route('register') }}" class="btn-join-us eff-btn">@lang('button.join_us')</a>
        </div>
    </section>
    <section class="bottom-menu grid-x padding-content">
        <div class="cell small-12 medium-6 large-3">
            <div class="grid-x align-middle">
                <h2 class="cell shrink">@lang('footer.bottom_menu_1.title')</h2>
                <div class="cell auto grid-x align-middle">
                    <div class="cell line auto"></div>
                    <div class="cell shrink"><span class="outline-dot float-right"><span class="dot"></span></span>
                    </div>
                </div>
            </div>

            <ul class="no-bullet">
                @foreach( $mainMenu as $menu )
                    <li><a href="{{ $menu['url'] }}">{{ $menu['menuText'] }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="cell small-12 medium-6 large-3">
            <div class="grid-x align-middle">
                <h2 class="cell shrink">@lang('footer.bottom_menu_2.title')</h2>
                <div class="cell auto grid-x align-middle">
                    <div class="cell line auto"></div>
                    <div class="cell shrink"><span class="outline-dot float-right"><span class="dot"></span></span>
                    </div>
                </div>
            </div>

            <ul class="no-bullet">
                <li><a href="{{ route('register') }}">@lang('register.page_link.index')</a></li>
                <li><a data-open="login">@lang('login.page_link.index')</a></li>
            </ul>
        </div>
        <div class="cell small-12 medium-6 large-3">
            <div class="grid-x align-middle">
                <h2 class="cell shrink">@lang('footer.bottom_menu_3.title')</h2>
                <div class="cell auto grid-x align-middle">
                    <div class="cell line auto"></div>
                    <div class="cell shrink"><span class="outline-dot float-right"><span class="dot"></span></span>
                    </div>
                </div>
            </div>
            <ul class="no-bullet">
                @foreach( __('footer.bottom_menu_3.list') as $menu )
                    <li><a href="{{ $menu['url'] }}">{{ $menu['text'] }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="social cell small-12 medium-6 large-3 align-self-bottom text-right">
            <label>Follow us</label>
            <ul class="no-bullet float-right">
                <li>
                    <a href="{{ config('url.facebook') }}" target="_blank">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ config('url.linked_in') }}" target="_blank">
                        <i class="fab fa-linkedin fa-2x"></i>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <section class="copyright grid-x padding-content">
        <div class="cell small-12 medium-12 large-6 text-left">
            @lang('footer.copy_rights')
        </div>
        <div class="cell small-12 medium-12 large-6 text-right">
            <a href="{{ route('terms') }}">@lang('footer.term_of_services')</a> |
            <a href="{{ route('policy') }}">@lang('footer.policy')</a>
        </div>
    </section>
</footer>


