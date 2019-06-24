@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach(config('images.home_banner') as $home_banner)
                <div class="swiper-slide"><img src="{{ asset($home_banner) }}"/></div>
            @endforeach
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next">
            <i class="fas fa-chevron-right fa-3x"></i>
        </div>
        <div class="swiper-button-prev">
            <i class="fas fa-chevron-left fa-3x"></i>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <section class="news padding-content">
        <div class="grid-x align-middle">
            <h2 class="cell auto topic-dark">News</h2>
            <div class="cell shrink view-all">
                <a href="#">
                    <span>View All</span>
                    <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                </a>
            </div>
        </div>
        <div class="grid-x grid-margin-x ">
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ asset(config('images.home.news.home_news_01' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
                <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i>29 April 2019</time>
            </article>
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ asset(config('images.home.news.home_news_01' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
                <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i>29 April 2019</time>
            </article>
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ asset(config('images.home.news.home_news_01' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
                <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i>29 April 2019</time>
            </article>
        </div>
    </section>

    <section class="share">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <i><img src="{{ asset(config('images.share_icon' )) }}" alt="share"></i>
                <h2 class="topic-light">share</h2>
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
            <div class="cell">
                <ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
                    <li class="tabs-title is-active"><a href="#panel1c" aria-selected="true">Recent Share</a></li>
                    <li class="tabs-title"><a href="#panel2c">Challenge</a></li>
                </ul>
            </div>
            <div class="cell">
                <div class="tabs-content" data-tabs-content="collapsing-tabs">
                    <div class="tabs-panel is-active" id="panel1c">
                        <div class="grid-x grid-margin-x recent-share">
                            <article class="cell grid-x medium-12 large-6">
                                <div class="cell small-12 medium-5">
                                    <figure>
                                        <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                                    </figure>
                                </div>
                                <div class="cell grid-x small-12 medium-7">
                                    <a href="#">
                                        <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing
                                                         elit.
                                                         Suspendisse eget nibh arcu.</h4>
                                    </a>
                                    <div class="cell grid-x align-self-bottom">
                                        <div class="cell auto profile">
                                            <figure class="display-profile">
                                                <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                            </figure>
                                            <span>username</span>
                                        </div>
                                        <div class="cell shrink like">
                                            <i class="far fa-thumbs-up"></i><span>415 likes</span>
                                        </div>
                                        <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                            comments</span></div>
                                    </div>
                                </div>
                            </article>
                            <article class="cell grid-x medium-12 large-6">
                                <div class="cell small-12 medium-5">
                                    <figure>
                                        <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                                    </figure>
                                </div>
                                <div class="cell grid-x small-12 medium-7">
                                    <a href="#">
                                        <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing
                                                         elit.
                                                         Suspendisse eget nibh arcu.</h4>
                                    </a>
                                    <div class="cell grid-x align-self-bottom">
                                        <div class="cell auto profile">
                                            <figure class="display-profile">
                                                <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                            </figure>
                                            <span>username</span>
                                        </div>
                                        <div class="cell shrink like">
                                            <i class="far fa-thumbs-up"></i><span>415 likes</span>
                                        </div>
                                        <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                            comments</span></div>
                                    </div>
                                </div>
                            </article>
                            <article class="cell grid-x medium-12 large-6">
                                <div class="cell small-12 medium-5">
                                    <figure>
                                        <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                                    </figure>
                                </div>
                                <div class="cell grid-x small-12 medium-7">
                                    <a href="#">
                                        <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing
                                                         elit.
                                                         Suspendisse eget nibh arcu.</h4>
                                    </a>
                                    <div class="cell grid-x align-self-bottom">
                                        <div class="cell auto profile">
                                            <figure class="display-profile">
                                                <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                            </figure>
                                            <span>username</span>
                                        </div>
                                        <div class="cell shrink like">
                                            <i class="far fa-thumbs-up"></i><span>415 likes</span>
                                        </div>
                                        <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                            comments</span></div>
                                    </div>
                                </div>
                            </article>
                            <article class="cell grid-x medium-12 large-6">
                                <div class="cell small-12 medium-5">
                                    <figure>
                                        <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                                    </figure>
                                </div>
                                <div class="cell grid-x small-12 medium-7">
                                    <a href="#">
                                        <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing
                                                         elit.
                                                         Suspendisse eget nibh arcu.</h4>
                                    </a>
                                    <div class="cell grid-x align-self-bottom">
                                        <div class="cell auto profile">
                                            <figure class="display-profile">
                                                <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                            </figure>
                                            <span>username</span>
                                        </div>
                                        <div class="cell shrink like">
                                            <i class="far fa-thumbs-up"></i><span>415 likes</span>
                                        </div>
                                        <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                            comments</span></div>
                                    </div>
                                </div>
                            </article>
                            <article class="cell grid-x medium-12 large-6">
                                <div class="cell small-12 medium-5">
                                    <figure>
                                        <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                                    </figure>
                                </div>
                                <div class="cell grid-x small-12 medium-7">
                                    <a href="#">
                                        <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing
                                                         elit.
                                                         Suspendisse eget nibh arcu.</h4>
                                    </a>
                                    <div class="cell grid-x align-self-bottom">
                                        <div class="cell auto profile">
                                            <figure class="display-profile">
                                                <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                            </figure>
                                            <span>username</span>
                                        </div>
                                        <div class="cell shrink like">
                                            <i class="far fa-thumbs-up"></i><span>415 likes</span>
                                        </div>
                                        <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                            comments</span></div>
                                    </div>
                                </div>
                            </article>
                            <article class="cell grid-x medium-12 large-6">
                                <div class="cell small-12 medium-5">
                                    <figure>
                                        <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                                    </figure>
                                </div>
                                <div class="cell grid-x small-12 medium-7">
                                    <a href="#">
                                        <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing
                                                         elit.
                                                         Suspendisse eget nibh arcu.</h4>
                                    </a>
                                    <div class="cell grid-x align-self-bottom">
                                        <div class="cell auto profile">
                                            <figure class="display-profile">
                                                <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                            </figure>
                                            <span>username</span>
                                        </div>
                                        <div class="cell shrink like">
                                            <i class="far fa-thumbs-up"></i><span>415 likes</span>
                                        </div>
                                        <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                            comments</span></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel2c">
                        <div class="grid-x grid-margin-x challenge">
                            <article class="cell small-12 medium-6 xxlarge-3">
                                <figure class="text-center">
                                    <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}">
                                </figure>
                                <a href="#">
                                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                                        Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse Lorem ipsum dolor
                                        sit
                                        amet, consectetur adipiscing elit. Suspendisse</h3>
                                </a>
                                <span class="category">Category Name</span>
                            </article>
                            <article class="cell small-12 medium-6 xxlarge-3">
                                <figure class="text-center">
                                    <img src="{{ asset(config('images.home.learn.home_learn_02' )) }}">
                                </figure>
                                <a href="#">
                                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Suspendisse</h3>
                                </a>
                                <span class="category">Category Name</span>
                            </article>
                            <article class="cell small-12 medium-6 xxlarge-3">
                                <figure class="text-center">
                                    <img src="{{ asset(config('images.home.learn.home_learn_03' )) }}">
                                </figure>
                                <a href="#">
                                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Suspendisse</h3>
                                </a>
                                <span class="category">Category Name</span>
                            </article>
                            <article class="cell small-12 medium-6 xxlarge-3">
                                <figure class="text-center">
                                    <img src="{{ asset(config('images.home.learn.home_learn_03' )) }}">
                                </figure>
                                <a href="#">
                                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Suspendisse</h3>
                                </a>
                                <span class="category">Category Name</span>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="give">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <i class="fas fa-gift"></i>
                <h2 class="topic-light">give</h2>
                <span>- Short description to explain share section : Definition</span>
            </div>
        </div>
        <div class="grid-x content padding-content">
            <div class="cell medium-3 align-self-stretch">
                <ul class="vertical tabs" data-tabs id="cate-tabs">
                    <li class="">Categories</li>
                    <li class="tabs-title is-active"><a href="#panel1v" aria-selected="true">Food non-perishable</a>
                    </li>
                    <li class="tabs-title"><a href="#panel2v">Food perishable</a></li>
                    <li class="tabs-title"><a href="#panel3v">School supply</a></li>
                    <li class="tabs-title"><a href="#panel4v">Housing</a></li>
                    <li class="tabs-title"><a href="#panel5v">Medical supplies</a></li>
                    <li class="tabs-title"><a href="#panel6v">Consulting</a></li>
                    <li class="tabs-title"><a href="#panel7v">Transportation</a></li>
                    <li class="tabs-title"><a href="#panel8v">Service</a></li>
                    <li class="tabs-title"><a href="#panel9v">Volunteer</a></li>
                    <li class="tabs-title"><a href="#panel10v">Other</a></li>
                </ul>
            </div>
            <div class="cell medium-9 align-self-stretch">
                <div class="tabs-content" data-tabs-content="cate-tabs">
                    <div class="tabs-panel is-active" id="panel1v">

                        <div class="grid-x large-up-5 align-center-middle text-center">
                            <div class="cell small-6 medium-4 ">
                                <article>
                                    <figure>
                                        <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}"
                                             class="img-cover">
                                    </figure>
                                    <a href="#">
                                        <h3>Ramen Noodles</h3>
                                    </a>
                                    <span class="sub-title">100 items</span>
                                </article>
                            </div>
                            <div class="cell small-6 medium-4 ">
                                <article>
                                    <figure>
                                        <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}"
                                             class="img-cover">
                                    </figure>
                                    <a href="#">
                                        <h3>Ramen Noodles</h3>
                                    </a>
                                    <span class="sub-title">100 items</span>
                                </article>
                            </div>
                            <div class="cell small-6 medium-4 ">
                                <article>
                                    <figure>
                                        <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}"
                                             class="img-cover">
                                    </figure>
                                    <a href="#">
                                        <h3>Ramen Noodles</h3>
                                    </a>
                                    <span class="sub-title">100 items</span>
                                </article>
                            </div>
                            <div class="cell small-6 medium-4 ">
                                <article>
                                    <figure>
                                        <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}"
                                             class="img-cover">
                                    </figure>
                                    <a href="#">
                                        <h3>Ramen Noodles</h3>
                                    </a>
                                    <span class="sub-title">100 items</span>
                                </article>
                            </div>
                            <div class="cell small-6 medium-4 ">
                                <article>
                                    <figure>
                                        <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}"
                                             class="img-cover">
                                    </figure>
                                    <a href="#">
                                        <h3>Ramen Noodles</h3>
                                    </a>
                                    <span class="sub-title">100 items</span>
                                </article>
                            </div>
                            <div class="cell small-6 medium-4 ">
                                <article>
                                    <figure>
                                        <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}"
                                             class="img-cover">
                                    </figure>
                                    <a href="#">
                                        <h3>Ramen Noodles</h3>
                                    </a>
                                    <span class="sub-title">100 items</span>
                                </article>
                            </div>
                            <div class="cell small-6 medium-4 ">
                                <article>
                                    <figure>
                                        <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}"
                                             class="img-cover">
                                    </figure>
                                    <a href="#">
                                        <h3>Ramen Noodles</h3>
                                    </a>
                                    <span class="sub-title">100 items</span>
                                </article>
                            </div>
                            <div class="cell small-6 medium-4 ">
                                <article>
                                    <figure>
                                        <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}"
                                             class="img-cover">
                                    </figure>
                                    <a href="#">
                                        <h3>Ramen Noodles</h3>
                                    </a>
                                    <span class="sub-title">100 items</span>
                                </article>
                            </div>
                            <div class="cell small-6 medium-4 ">
                                <article>
                                    <figure>
                                        <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}"
                                             class="img-cover">
                                    </figure>
                                    <a href="#">
                                        <h3>Ramen Noodles</h3>
                                    </a>
                                    <span class="sub-title">100 items</span>
                                </article>
                            </div>
                            <div class="cell small-6 medium-4 view-all align-self-top text-center">
                                <a href="#">
                                    <i class="fas fa-angle-right"></i>
                                </a>
                                <span class="sub-title">MORE</span>
                            </div>
                        </div>

                    </div>
                    <div class="tabs-panel" id="panel2v">

                        2

                    </div>
                    <div class="tabs-panel" id="panel3v">

                        3

                    </div>
                    <div class="tabs-panel" id="panel4v">

                        4

                    </div>
                    <div class="tabs-panel" id="panel5v">

                        5

                    </div>
                    <div class="tabs-panel" id="panel6v">

                        6

                    </div>
                    <div class="tabs-panel" id="panel7v">

                        7

                    </div>
                    <div class="tabs-panel" id="panel8v">

                        8

                    </div>
                    <div class="tabs-panel" id="panel9v">

                        9

                    </div>
                    <div class="tabs-panel" id="panel10v">

                        10

                    </div>
                </div>
            </div>
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
        <div class="grid-x grid-padding-x content padding-content">
            <article class="cell small-12 medium-6 xxlarge-3">
                <figure class="text-center">
                    <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse Lorem ipsum dolor
                        sit
                        amet, consectetur adipiscing elit. Suspendisse Lorem ipsum dolor sit amet, consectetur
                        adipiscing
                        elit. Suspendisse</h3>
                </a>
                <span class="category">Category Name</span>
            </article>
            <article class="cell small-12 medium-6 xxlarge-3">
                <figure class="text-center">
                    <img src="{{ asset(config('images.home.learn.home_learn_02' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
                <span class="category">Category Name</span>
            </article>
            <article class="cell small-12 medium-6 xxlarge-3">
                <figure class="text-center">
                    <img src="{{ asset(config('images.home.learn.home_learn_03' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
                <span class="category">Category Name</span>
            </article>
            <article class="cell small-12 medium-6 xxlarge-3">
                <figure class="text-center">
                    <img src="{{ asset(config('images.home.learn.home_learn_03' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
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
            <article class="cell small-12 medium-6 xxlarge-3">
                <figure class="cover">
                    <img src="{{ asset(config('images.home.events.home_events_01' )) }}">
                    <figcaption>
                        <time datetime="2019-04-29 12:00">18 May 2019 : 12.00 -16.00</time>
                    </figcaption>
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
                <div class="profile">
                    <figure class="display-profile">
                        <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                    </figure>
                    <span>By Host name or speaker name</span>
                </div>
            </article>
            <article class="cell small-12 medium-6 xxlarge-3">
                <figure class="cover">
                    <img src="{{ asset(config('images.home.learn.home_learn_02' )) }}">
                    <figcaption>
                        <time datetime="2019-04-29 12:00">18 May 2019 : 12.00 -16.00</time>
                    </figcaption>
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
                <div class="profile">
                    <figure class="display-profile">
                        <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                    </figure>
                    <span>By Host name or speaker name</span>
                </div>
            </article>
            <article class="cell small-12 medium-6 xxlarge-3">
                <figure class="cover">
                    <img src="{{ asset(config('images.home.events.home_events_03' )) }}">
                    <figcaption>
                        <time datetime="2019-04-29 12:00">18 May 2019 : 12.00 -16.00</time>
                    </figcaption>
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
                <div class="profile">
                    <figure class="display-profile">
                        <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                    </figure>
                    <span>By Host name or speaker name</span>
                </div>
            </article>
            <article class="cell small-12 medium-6 xxlarge-3">
                <figure class="cover">
                    <img src="{{ asset(config('images.home.events.home_events_03' )) }}">
                    <figcaption>
                        <time datetime="2019-04-29 12:00">18 May 2019 : 12.00 -16.00</time>
                    </figcaption>
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
                <div class="profile">
                    <figure class="display-profile">
                        <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
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
            <div class="cell small-12 medium-6 xlarge-8 xxxlarge-9">
                <h2 class="topic-dark">about us</h2>
                <p>
                    <strong>We are Givers Dedicated to the Idea that Through sharing ideas,learning, and working
                            together,
                            we can give better</strong>
                </p>
                <p>
                    The Givers Network is a collection of organizations and individuals that believe the best way to
                    increase the impact of our social giving is by combining our resources, knowledge, and giving to
                    create
                    greater impact than each of us alone can achieve.
                    Guided by this ideal, the founding sponsors have created The Givers Network platform so that all
                    Givers
                    can work together.
                </p>
            </div>
            <div class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                <figure>
                    <img src="{{ asset(config('images.home.about.home_about_01' )) }}">
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