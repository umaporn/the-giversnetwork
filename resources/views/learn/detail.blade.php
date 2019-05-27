@extends('layouts.app')

@section('page-title', __('learn.page_title.detail', [
            'learn_title' => $data['title'],
        ])))
@section('page-description', __('learn.page_description.detail', [
            'learn_title' => $data['title'],
        ]))

@section('content')

    <section class="learn detail">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <i class="fas fa-book"></i>
                <h2 class="topic-light">@lang('learn.page_title.index')</h2>
            </div>
        </div>
        <section class="grid-x padding-content">
            <div class="cell small-12">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href="#">@lang('home.page_title.index')</a></li>
                        <li><a href="#">@lang('learn.page_title.index')</a></li>
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
                            <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i>{{ $data['public_date'] }}
                            </time>
                        </div>
                        <div class="cell small-12 text-center">
                            <figure>
                                <img src="{{ $data['image_path'] }}" alt="{{ $data['title'] }}">
                            </figure>
                        </div>
                        <div class="cell small-12">
                            {!! $data['content'] !!}
                        </div>
                        <div class="social cell small-12 text-right">
                            <label>Share To</label>
                            <ul class="no-bullet float-right">
                                <li><a href="#"><i class="fab fa-facebook-square fa-2x"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter-square fa-2x"></i></a></li>
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
                    <h2 class="cell auto topic-dark">@lang('learn.other_articles')</h2>
                </div>
                @foreach( $other as $other_item )
                    <article class="cell small-12 medium-4">
                        <figure>
                            <a href="{{ route('learn.detail', ['learn'=>$other_item['id']]) }}">
                                <img src="{{ $other_item['file_path'] }}" alt="{{ $other_item['title'] }}">
                            </a>
                        </figure>
                        <a href="{{ route('learn.detail', ['learn'=>$other_item['id']]) }}">
                            <h3>{{ $other_item['title'] }}</h3>
                        </a>
                        <span class="category">{{ $other_item['category_title'] }}</span>
                    </article>
                @endforeach
            </div>
        </section>
    </section>
@endsection