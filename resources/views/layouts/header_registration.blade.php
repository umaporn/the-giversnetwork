<header class="head" data-sticky-container>
    <div class="head-box" data-sticky data-options="marginTop:0;" data-sticky-on="small">
        <div class="nav-mobile-click" data-responsive-toggle="nav-mobile" data-hide-for="xlarge">
            <button type="button" data-toggle><i class="fas fa-bars fa-lg"></i></button>
        </div>
        <div class="head-show" id="nav-mobile">
            <div class="head-social">
                <div class="social-click">
                    <a href="#" class="share-btn"><i class="fas fa-share-alt fa-sm"></i></a>
                </div>
            </div>
            <ul class="head-lang">
                <li><a href="#">EN</a></li>
                <li><a href="#" class="lang-click">TH</a></li>
            </ul>
            <ul class="head-nav" data-magellan data-threshold="0" data-deep-linking="true">
            @foreach( __('event_registration.submenu') as $submenu )
                <li>
                    <a href="{{ $submenu['route'] }}" class="nav-click">{{ $submenu['name'] }}</a>
                </li>
            @endforeach 
            </ul>
        </div>
    </div>
</header>