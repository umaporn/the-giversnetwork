<footer class="grid-container full">  
        <div id="spinner"></div>      
        <section class="join-us grid-x padding-content text-center">
            <div class="cell small-12 grid-x align-center">
                <h2 class="align-self-middle">LET'S CHANGE THE WORLD TOGETHER! WILL YOU JOIN US?</h2>
                <a href="#" class="btn-join-us eff-btn">Join us</a>
            </div>
        </section>
        <section class="bottom-menu grid-x padding-content">
            <div class="cell small-12 medium-6 large-3">
                <div class="grid-x align-middle">
                    <h2 class="cell shrink">@lang('footer.bottom_menu_1.title')</h2>
                    <div class="cell auto grid-x align-middle">
                        <div class="cell line auto"></div>
                        <div class="cell shrink"><span class="outline-dot float-right"><span class="dot"></span></span></div>
                    </div>
                </div>

                <ul class="no-bullet">
                    @foreach( __('footer.bottom_menu_1.list') as $menu )
                        <li>{{ $menu }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="cell small-12 medium-6 large-3">
                <div class="grid-x align-middle">
                    <h2 class="cell shrink">@lang('footer.bottom_menu_2.title')</h2>
                    <div class="cell auto grid-x align-middle">
                        <div class="cell line auto"></div>
                        <div class="cell shrink"><span class="outline-dot float-right"><span class="dot"></span></span></div>
                    </div>
                </div>

                <ul class="no-bullet">
                    @foreach( __('footer.bottom_menu_2.list') as $menu )
                        <li>{{ $menu }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="cell small-12 medium-6 large-3">
                <div class="grid-x align-middle">
                    <h2 class="cell shrink">@lang('footer.bottom_menu_3.title')</h2>
                    <div class="cell auto grid-x align-middle">
                        <div class="cell line auto"></div>
                        <div class="cell shrink"><span class="outline-dot float-right"><span class="dot"></span></span></div>
                    </div>
                </div>
                <ul class="no-bullet">
                    @foreach( __('footer.bottom_menu_3.list') as $menu )
                        <li>{{ $menu }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="social cell small-12 medium-6 large-3 align-self-bottom text-right">
                <label>Follow us</label>
                <ul class="no-bullet float-right">
                    <li><a href="#"><i class="fab fa-facebook-square fa-2x"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin fa-2x"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter-square fa-2x"></i></a></li>
                </ul>
            </div>
        </section>
        <section class="copyright grid-x padding-content">
            <div class="cell small-12 medium-12 large-6 text-left">©2019 The Giver Network</div>
            <div class="cell small-12 medium-12 large-6 text-right">Terms of Service | Privacy Policy</div>
        </section>
</footer>


