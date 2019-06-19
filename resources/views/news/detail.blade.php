@extends('layouts.app')

@section('page-title', __('news.page_title.detail', [
            'news_title' => $data['title'],
        ]))
@section('page-description', __('news.page_description.detail', [
            'news_title' => $data['title'],
        ]))

@section('og-title', __('news.page_title.detail', [
            'news_title' => $data['title'],
        ]))
@section('og-url', url()->current())
@section('og-description', $data['title'])
@section('og-image', $data['image_path'])

@section('content')

    <section class="news detail">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('news.page_title.index')</h2>
            </div>
        </div>
        <section class="grid-x padding-content">
            <div class="cell small-12">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                        <li><a href="{{ route('news.index') }}">>@lang('news.page_title.index')</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> {{ $data['title'] }}
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <section class="article padding-content">
            <div class="grid-x grid-margin-x">
                <article class="cell">
                    <div class="grid-x grid-margin-x grid-margin-y large-margin-collapse">
                        <div class="cell small-12">
                            <h2>{{ $data['title'] }}</h2>
                            <time datetime="2019-04-29 12:00">
                                <i class="far fa-calendar-alt"></i>{{ $data['public_date'] }}
                            </time>
                        </div>
                        <div class="cell small-12 text-center slide-thumb">
                            <div class="gallery-top">
                                <div class="swiper-wrapper">
                                    @foreach( $data->newsImage as $news_image )
                                        <div class="swiper-slide">
                                            <div class="swiper-slide-container">
                                                <figure>
                                                    <img src="{{ $news_image['image_path'] }}" alt="{{ $news_image['alt'] }}">
                                                </figure>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"><i class="fas fa-chevron-right fa-2x"></i></div>
                                <div class="swiper-button-prev"><i class="fas fa-chevron-left fa-2x"></i></div>
                            </div>
                            <div class="gallery-thumbs">
                                <div class="swiper-wrapper">
                                    @foreach( $data->newsImage as $news_image )
                                        <div class="swiper-slide">
                                            <div class="swiper-slide-container">
                                                <figure>
                                                    <img src="{{ $news_image['image_path'] }}" alt="{{ $news_image['alt'] }}">
                                                </figure>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="cell small-12">
                            <p>{!! $data['content'] !!}</p>
                        </div>
                        <div class="social cell small-12 text-right">
                            <label>Share To</label>
                            <ul class="no-bullet float-right">
                                <li>
                                    <a target="popup"
                                       onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}','popup','width=600,height=500');">
                                        <i class="fab fa-facebook-square fa-2x"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="popup"
                                       onclick="window.open('https://twitter.com/share?text={{$data['title']}}','popup','width=600,height=500')">
                                        <i class="fab fa-twitter-square fa-2x"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>
            </div>
            <div class="grid-x align-middle">
                <div class="cell auto grid-x align-middle">
                    <div class="cell line auto"></div>
                    <div class="cell shrink"><span class="outline-dot float-right"><span class="dot"></span></span>
                    </div>
                </div>
            </div>
        </section>
        <section class="most-popular padding-content">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12">
                    <div class="grid-x align-middle margin-bottom-1">
                        <h2 class="cell auto topic-dark">@lang('news.other_news')</h2>
                        <div class="cell shrink view-all">
                            <a href="{{ route('news.index') }}">
                                <span>@lang('button.view_all')</span>
                                <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="cell small-12">
                    <div class="grid-x grid-margin-x">
                        @foreach( $other as $other_item )
                            <article class="cell small-12 medium-4">
                                <figure>
                                    <a href="{{ route('news.detail', [ 'news' => $other_item['id'] ]) }}">
                                        <img src="{{ $other_item['image_path'] ? $other_item['image_path'] : asset(config('images.placeholder.700x400')) }}"
                                             alt="{{ $other_item['title'] }}"
                                        >
                                    </a>
                                </figure>
                                <a href="{{ route('news.detail', [ 'news' => $other_item['id'] ]) }}">
                                    <h3>{{ $other_item['title'] }}</h3>
                                </a>
                                <time datetime="2019-04-29 12:00">
                                    <i class="far fa-calendar-alt"></i>{{ $other_item['public_date'] }}</time>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>

        </section>

    </section>


@endsection