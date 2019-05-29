@extends('layouts.app')

@section('page-title', __('learn.page_title.index'))
@section('page-description', __('learn.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

    <section class="learn all">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <i class="fas fa-book"></i>
                <h2 class="topic-light">@lang('learn.page_link.index')</h2>
            </div>
        </div>
        <section class="grid-x padding-content">
            <div class="cell small-12">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href="#">@lang('home.page_link.index')</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> @lang('learn.page_link.index')
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <section class="most-popular padding-content">
            <div class="grid-x grid-margin-x grid-margin-y">
                <div class="cell small-12">
                    <h2 class="cell auto topic-dark">@lang('learn.most_popular')</h2>
                </div>
                @foreach( $data['mostPopular'] as $most_popular_item)
                    <article class="cell small-12 medium-4">
                        <figure>
                            <a href="{{ route('learn.detail', ['id' => $most_popular_item['id']]) }}">
                                <img src="{{ $most_popular_item['file_path'] ? $most_popular_item['file_path'] : config('images.placeholder.700x400') }}" alt="{{ $most_popular_item['title'] }}">
                            </a>
                        </figure>
<<<<<<< HEAD
                        <a href="{{ route('learn.detail', ['id' => $most_popular_item['id']]) }}">
                            <h3>{{ $most_popular_item['title'] }}</h3>
                        </a>
                        <span class="category">{{ $most_popular_item['category_title'] }}</span>
                    </article>
                @endforeach
            </div>
            <div class="grid-x align-middle grid-margin-y">
                <div class="cell auto grid-x align-middle">
                    <div class="cell line auto"></div>
                    <div class="cell shrink"><span class="outline-dot float-right"><span class="dot"></span></span>
                    </div>
                </div>
            </div>

        </section>
        <div class="grid-x grid-margin-x padding-content">
            <div class="cell small-12 medium-12 large-8">
                <section class="articles">
                    <div class="grid-x align-middle">
                        <h2 class="cell auto topic-dark">@lang('learn.articles')</h2>
                    </div>

                    @include('learn.list')
                </section>
            </div>
            <div class="cell small-12 medium-12 large-4">
                <section class="events">
                    <div class="grid-x align-middle">
                        <h2 class="cell auto topic-dark">@lang('events.page_link.index')</h2>
                        <div class="cell shrink view-all">
                            <a href="{{ route('events.index') }}">
                                <span>@lang('button.view_all')</span>
                                <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="grid-x grid-margin-x">
                        @foreach( $data['events'] as $events_item )
                            <article class="cell">
                                <div class="grid-x grid-margin-x large-margin-collapse">
                                    <div class="cell small-12 medium-6 large-12">
                                        <a href="{{ route('events.detail', ['events' => $events_item['id']]) }}">
                                            <figure class="cover">
                                                <img src="{{ $events_item['image_path'] }}" alt="{{ $events_item['title'] }}">
                                                <figcaption>
                                                    <time datetime="{{ $events_item['event_date'] }}">{{ $events_item['event_date'] }}</time>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="cell small-12 medium-6 large-12">
                                        <a href="{{ route('events.detail', ['events' => $events_item['id']]) }}">
                                            <h3>{{ $events_item['title'] }}</h3>
                                        </a>
                                        <div class="profile">
                                            <figure class="display-profile">
                                                <img src="{{ $events_item['host_image'] }}" alt="{{$events_item['hostname']}}">
                                            </figure>
                                            <span>By {{ $events_item['hostname'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="news">
                    <div class="grid-x align-middle">
                        <h2 class="cell auto topic-dark">@lang('news.page_link.index')</h2>
                        <div class="cell shrink view-all">
                            <a href="{{ route('news.index') }}">
                                <span>@lang('button.view_all')</span>
                                <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="grid-x grid-margin-x grid-margin-y">
                        @foreach( $data['news'] as $news_items )
                            <article class="cell">
                                <div class="grid-x grid-margin-x large-margin-collapse">
                                    <div class="cell small-12 medium-6 large-12">
                                        <figure>
                                            <a href="{{ route('news.detail', [ 'news' => $news_items['id'] ]) }}">
                                                <img src="{{ $news_items['image_path'] }}" alt="{{ $news_items['title'] }}">
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="cell small-12 medium-6 large-12">
                                        <a href="{{ route('news.detail', [ 'news' => $news_items['id'] ]) }}">
                                            <h3>
                                                {{ $news_items['title'] }}
                                            </h3>
                                        </a>
                                        <time datetime="2019-04-29">
                                            <i class="far fa-calendar-alt"></i>{{ $news_items['public_date'] }}</time>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            </div>
=======
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
>>>>>>> a7e3f02e83945d9d7a236e184b7698d0f254a201
        </div>
    </section>
@endsection
