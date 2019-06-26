@extends('layouts.app')

@section('page-title', __('share.page_title.index'))
@section('page-description', __('share.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

<section class="share-page">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <i> <img src="{{ asset(config('images.share_icon' )) }}"></i>
            <h2 class="topic-light">share</h2>
        </div>
    </div>
    <section class="grid-x padding-content">
        <div class="cell small-12">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">share</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> Challenges
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <div class="grid-x grid-padding-x padding-content padding-top-0 space-article">
        <div class="cell small-12 medium-12 large-8">
            <section class="articles">
                <div class="grid-x align-middle">
                    <h2 class="cell auto topic-dark">Challenges</h2>
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
            @include('sidebar')
        </div>

    </div>
</section>
@endsection