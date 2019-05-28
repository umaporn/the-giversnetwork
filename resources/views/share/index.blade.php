@extends('layouts.app')

@section('page-title', __('share.page_title.index'))
@section('page-description', __('share.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

<section class="share all">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <i class="fas fa-shapes"></i>
            <h2 class="topic-light">share</h2>
        </div>
    </div>
    <section class="grid-x padding-content">
        <div class="cell small-12">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> Share
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <section class="most-popular padding-content">
        <div class="grid-x grid-margin-x grid-margin-y">
            <div class="cell small-12">
                <h2 class="cell auto topic-dark">Most popular</h2>
            </div>
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
                <span class="category">Category Name</span>
            </article>
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ asset(config('images.home.learn.home_learn_02' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
                <span class="category">Category Name</span>
            </article>
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ asset(config('images.home.learn.home_learn_03' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
                <span class="category">Category Name</span>
            </article>

        </div>
        <div class="grid-x align-middle grid-margin-y">
            <div class="cell auto grid-x align-middle">
                <div class="cell line auto"></div>
                <div class="cell shrink"><span class="outline-dot float-right"><span class="dot"></span></span></div>
            </div>
        </div>

    </section>
    <div class="grid-x grid-margin-x padding-content">
        <div class="cell small-12 medium-12 large-8">
            <section class="articles">
                <div class="grid-x align-middle">
                    <h2 class="cell auto topic-dark">Articles</h2>
                </div>
                <article class="grid-x grid-margin-x grid-margin-y ">
                    <div class="cell small-12 medium-6">
                        <figure>
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                    </div>
                    <div class="cell small-12 medium-6">
                        <a href="#">
                            <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh
                                arcu.</h3>
                        </a>
                        <p>Content : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh
                            arcu. Morbi sollicitudin turpis id nisi fermentum mollis. </p>
                    </div>
                </article>
                <article class="grid-x grid-margin-x grid-margin-y ">
                    <div class="cell small-12 medium-6">
                        <figure>
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                    </div>
                    <div class="cell small-12 medium-6">
                        <a href="#">
                            <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh
                                arcu.</h3>
                        </a>
                        <p>Content : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh
                            arcu. Morbi sollicitudin turpis id nisi fermentum mollis. </p>
                    </div>
                </article>
                <article class="grid-x grid-margin-x grid-margin-y ">
                    <div class="cell small-12 medium-6">
                        <figure>
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                    </div>
                    <div class="cell small-12 medium-6">
                        <a href="#">
                            <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh
                                arcu.</h3>
                        </a>
                        <p>Content : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh
                            arcu. Morbi sollicitudin turpis id nisi fermentum mollis. </p>
                    </div>
                </article>
                <article class="grid-x grid-margin-x grid-margin-y ">
                    <div class="cell small-12 medium-6">
                        <figure>
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                    </div>
                    <div class="cell small-12 medium-6">
                        <a href="#">
                            <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh
                                arcu.</h3>
                        </a>
                        <p>Content : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh
                            arcu. Morbi sollicitudin turpis id nisi fermentum mollis. </p>
                    </div>
                </article>
                <article class="grid-x grid-margin-x grid-margin-y ">
                    <div class="cell small-12 medium-6">
                        <figure>
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                    </div>
                    <div class="cell small-12 medium-6">
                        <a href="#">
                            <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh
                                arcu.</h3>
                        </a>
                        <p>Content : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh
                            arcu. Morbi sollicitudin turpis id nisi fermentum mollis. </p>
                    </div>
                </article>

                <a href="#" id="loadMore" class="load-more">View More <i class="fas fa-caret-down"></i></a>

            </section>
        </div>
        <div class="cell small-12 medium-12 large-4">

            <section class="events">


                <div class="grid-x align-middle">
                    <h2 class="cell auto topic-dark">Events</h2>
                    <div class="cell shrink view-all">
                        <a href="#">
                            <span>View All</span>
                            <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                        </a>
                    </div>
                </div>
                <div class="grid-x grid-margin-x">
                    <article class="cell">
                        <div class="grid-x grid-margin-x large-margin-collapse">

                            <div class="cell small-12 medium-6 large-12">
                                <figure class="cover">
                                    <img src="{{ asset(config('images.home.events.home_events_01' )) }}">
                                    <figcaption><time datetime="2019-04-29 12:00">18 May 2019 : 12.00 -16.00</time>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="cell small-12 medium-6 large-12">
                                <a href="#">
                                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                                    </h3>
                                </a>
                                <div class="profile">
                                    <figure class="display-profile">
                                        <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                    </figure>
                                    <span>By Host name or speaker name</span>
                                </div>
                            </div>
                        </div>

                    </article>
                </div>



            </section>
            <section class="news">
                <div class="grid-x align-middle">
                    <h2 class="cell auto topic-dark">News</h2>
                    <div class="cell shrink view-all">
                        <a href="#">
                            <span>View All</span>
                            <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                        </a>
                    </div>
                </div>
                <div class="grid-x grid-margin-x grid-margin-y ">

                    <article class="cell">
                        <div class="grid-x grid-margin-x large-margin-collapse">
                            <div class="cell small-12 medium-6 large-12">
                                <figure>
                                    <img src="{{ asset(config('images.home.news.home_news_01' )) }}">
                                </figure>
                            </div>
                            <div class="cell small-12 medium-6 large-12">
                                <a href="#">
                                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                                    </h3>
                                </a>
                                <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i>29 April 2019</time>
                            </div>
                        </div>
                    </article>

                    <article class="cell">
                        <div class="grid-x grid-margin-x large-margin-collapse">
                            <div class="cell small-12 medium-6 large-12">
                                <figure>
                                    <img src="{{ asset(config('images.home.news.home_news_01' )) }}">
                                </figure>
                            </div>
                            <div class="cell small-12 medium-6 large-12">
                                <a href="#">
                                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                                    </h3>
                                </a>
                                <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i>29 April 2019</time>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </div>

    </div>

</section>


@endsection