@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

    @include('home.banner')
    @include('home.news')
    @include('home.share')

    <section class="give">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <i class="fas fa-gift"></i>
                <h2 class="topic-light">give</h2>
                <span>- Short description to explain share section : Definition</span>
            </div>
            <div class="cell shrink view-all">
                <a href="#">
                    <span>View All</span>
                    <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                </a>
            </div>
        </div>
        <div class="grid-x content padding-content">
            None
        </div>
    </section>

    <section class="learn">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <i class="fas fa-book"></i>
                <h2 class="topic-light">Learn</h2>
                <span>- Short description to explain share section : Definition</span>
            </div>
            <div class="cell shrink view-all">
                <a href="#">
                    <span>View All</span>
                    <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                </a>
            </div>
        </div>
        <div class="grid-x grid-margin-x content padding-content">
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" alt="">
                </figure>
                <a href="#"><h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3></a>
                <span class="category">Category Name</span>
            </article>
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ asset(config('images.home.learn.home_learn_02' )) }}" alt="">
                </figure>
                <a href="#"><h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3></a>
                <span class="category">Category Name</span>
            </article>
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ asset(config('images.home.learn.home_learn_03' )) }}" alt="">
                </figure>
                <a href="#"><h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3></a>
                <span class="category">Category Name</span>
            </article>
        </div>
    </section>


    <section class="events padding-content">
        <div class="grid-x align-middle">
            <h2 class="cell auto topic-dark">Events</h2>
            <div class="cell shrink view-all">
                <a href="#">
                    <span>View All</span>
                    <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                </a>
            </div>
        </div>
        <div class="grid-x grid-margin-x ">
            <article class="cell small-12 medium-4">
                <figure class="cover">
                    <img src="{{ asset(config('images.home.events.home_events_01' )) }}" alt="">
                    <figcaption>
                        <time datetime="2019-04-29 12:00">18 May 2019 : 12.00 -16.00</time>
                    </figcaption>
                </figure>
                <a href="#"><h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3></a>
                <div class="profile">
                    <figure class="display-profile">
                        <img src="{{ asset(config('images.home.profile.user_profile' )) }}" alt="">
                    </figure>
                    <span>By Host name or speaker name</span>
                </div>
            </article>
            <article class="cell small-12 medium-4">
                <figure class="cover">
                    <img src="{{ asset(config('images.home.events.home_events_02' )) }}" alt="">
                    <figcaption>
                        <time datetime="2019-04-29 12:00">18 May 2019 : 12.00 -16.00</time>
                    </figcaption>
                </figure>
                <a href="#"><h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3></a>
                <div class="profile">
                    <figure class="display-profile">
                        <img src="{{ asset(config('images.home.profile.user_profile' )) }}" alt="">
                    </figure>
                    <span>By Host name or speaker name</span>
                </div>
            </article>
            <article class="cell small-12 medium-4">
                <figure class="cover">
                    <img src="{{ asset(config('images.home.events.home_events_03' )) }}" alt="">
                    <figcaption>
                        <time datetime="2019-04-29 12:00">18 May 2019 : 12.00 -16.00</time>
                    </figcaption>
                </figure>
                <a href="#"><h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3></a>
                <div class="profile">
                    <figure class="display-profile">
                        <img src="{{ asset(config('images.home.profile.user_profile' )) }}" alt="">
                    </figure>
                    <span>By Host name or speaker name</span>
                </div>
            </article>
        </div>
    </section>

    <section class="about padding-content">
        <div class="grid-x align-center">
            <div class="cell small-5 medium-3 large-2">
                <a href="{{ route('home.index') }}">
                    <img src="{{ asset( config( 'images.logo' ) ) }}" alt="@lang('header.images.logo')"/>
                </a>
            </div>
        </div>
        <article class="grid-x grid-margin-x">
            <div class="cell small-12 medium-7 large-6">
                <h2 class="topic-dark">about us</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh arcu. Morbi
                    sollicitudin turpis id nisi fermentum mollis. Praesent elementum vulputate nibh ac hendrerit.
                    Integer a metus vitae mauris semper finibus ac vel tortor. Ut id odio lobortis, lacinia purus
                    pharetra, cursus metus. Fusce ultricies fringilla mauris, sed condimentum massa feugiat non. Fusce
                    faucibus, magna at auctor cursus, ipsum velit sollicitudin magna, a vulputate mauris lorem vitae
                    nunc. Sed efficitur ultricies leo, sit amet venenatis orci ultrices non. Nam viverra neque nec risus
                    dignissim consequat. Nunc placerat odio dui.
                </p>
            </div>
            <div class="cell small-12 medium-5 large-6">
                <figure>
                    <img src="{{ asset(config('images.home.about.home_about_01' )) }}" alt="">
                </figure>
            </div>
        </article>
        <div class="grid-x align-middle">
            <div class="cell auto grid-x align-middle">
                <div class="cell line auto"></div>
                <div class="cell shrink"><span class="outline-dot float-right"><span class="dot"></span></span></div>
            </div>
            <div class="cell shrink view-all">
                <a href="#">
                    <span>See more</span>
                    <i class="fas fa-caret-right"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
