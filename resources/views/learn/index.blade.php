@extends('layouts.app')

@section('page-title', __('learn.page_title.index'))
@section('page-description', __('learn.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

<section class="learn all">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <i class="fas fa-book"></i>
            <h2 class="topic-light">Learn</h2>
        </div>
    </div>
    <section class="grid-x padding-content">
        <div class="cell small-12">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> Learn
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
            @include('sidebar')
        </div>

    </div>

</section>


@endsection