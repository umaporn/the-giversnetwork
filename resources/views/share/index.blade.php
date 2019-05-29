@extends('layouts.app')

@section('page-title', __('share.page_title.index'))
@section('page-description', __('share.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

<section class="share-page all">
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
    <section class="padding-tb-0 padding-content">
        <div class="grid-x grid-margin-x grid-margin-y">
            <div class="cell small-12">
                <div class="grid-x align-middle">
                    <h2 class="cell auto topic-dark">Challenge</h2>
                    <div class="cell shrink view-all">
                        <a href="#">
                            <span>View All</span>
                            <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
            </article>
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ asset(config('images.home.learn.home_learn_02' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
            </article>
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ asset(config('images.home.learn.home_learn_03' )) }}">
                </figure>
                <a href="#">
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                </a>
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
                    <h2 class="cell auto topic-dark">Threads</h2>
                    <div class="cell shrink view-all">
                        <a href="#" class="btn-blue">
                            <i class="fas fa-plus"></i> Create Thread
                        </a>
                    </div>
                </div>
                <div class="grid-x">
                    <article class="cell grid-x small-12">
                        <div class="cell small-3 medium-2">
                            <figure class="share-image">
                                <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                            </figure>
                        </div>
                        <div class="cell grid-x small-9 medium-10">
                            <a href="#">
                                <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Suspendisse eget nibh arcu.</h4>
                            </a>
                            <div class="cell grid-x align-self-bottom">
                                <div class="cell auto profile">
                                    <figure class="display-profile">
                                        <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                    </figure>
                                    <span>username</span>
                                </div>
                                <div class="cell shrink like"><i class="far fa-thumbs-up"></i><span>415 likes</span>
                                </div>
                                <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                        comments</span></div>
                            </div>
                        </div>
                    </article>
                </div>
                <a href="#" id="loadMore" class="load-more">View More <i class="fas fa-caret-down"></i></a>
            </section>
        </div>
        <div class="cell small-12 medium-12 large-4">
            @include('sidebar')
        </div>
    </div>
</section>
@endsection