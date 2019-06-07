<header id="header" data-sticky-container>
	<div class="sticky sticky-topbar" data-sticky data-options="anchor: page; marginTop: 0; stickyOn: small;">
		<nav class="grid-x top-bar topbar-responsive padding-content">
			<div class="cell medium-shrink top-bar-title">
				<span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
					<button class="menu-icon" type="button" data-toggle></button>
				</span>
				<a href="{{ route('home.index') }}" class="topbar-responsive-logo">
					<img src="{{ asset( config( 'app.logo' ) ) }}" alt="@lang('header.images.logo')" />
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
			<div class="cell medium-shrink align-self-middle grid-middle">
				<!-- before user login -->
				<!-- <ul class="user-profile float-left no-bullet">
					<li><a href="#home">@lang('menu.profile_menu.sign_up')</a></li>
					<li><a data-open="login">@lang('menu.profile_menu.log_in')</a></li>
					<div class="reveal modal-style" id="login" data-reveal>
						<h2 class="modal-topic">Login</h2>
						<div class="modal-content">
							<form class="modal-form">

								<div class="grid-x grid-padding-x user-form-space">
									<div class="cell small-12">
										<label for="email" class="form-label">Email</label>
									</div>
									<div class="cell small-12">
										<input type="email" id="email" class="form-fill" value="">
									</div>
								</div>
								<div class="grid-x grid-padding-x user-form-space">
									<div class="cell small-12">
										<div class="grid-flex">
											<label for="password" class="form-label">Password</label>
											<a toggle="#password-field" class="toggle-password">show</a>
										</div>
									</div>
									<div class="cell small-12">
										<input type="password" id="password-field" class="form-fill" value="">
									</div>
									<div class="cell small-12 text-left">
										<a href="#" class="form-link-sub">Forgot Password?</a>
									</div>
								</div>

								<button class="btn-blue btn-long">LOGIN</button>
							</form>
							<div class="grid-x align-middle login-line">
								<div class="cell line auto"></div>
								<div class="cell shrink">
									<span class="outline-dot float-right">
										<span class="dot"></span>
									</span>
								</div>
							</div>
							<article class="login-signup">
								Are you new?
								<a href="#">Sign up</a>
							</article>
						</div>
						<button class="close-button" data-close aria-label="Close reveal" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</ul>  -->
				<!-- after user login -->
				<section class="user-profile-after float-left" data-toggle="user-menu">
					<figure class="user-profile-image">
						<img src="{{ asset(config('images.home.profile.user_profile' )) }}">
					</figure>
					<p class="user-profile-name">Username <i class="fas fa-caret-down"></i></p>
					<div class="dropdown-pane user-menu" id="user-menu" data-dropdown data-hover="true" data-hover-pane="true" data-v-offset=15>
						<ul class="user-menu-show">
							<li><a href="#"><i class="fas fa-user-edit"></i> Edit My Profile</a></li>
							<li><a href="#"><i class="fas fa-user-circle"></i> View My Profile</a></li>
							<li><a href="#"><i class="fas fa-sign-out-alt"></i>  Log out</a></li>
						</ul>
					</div>
				</section> 
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