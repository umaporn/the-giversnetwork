@extends('layouts.app')

@section('page-title', __('learn.page_title.index'))
@section('page-description', __('learn.page_description.index'))

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
                        <li><a href="{{ route('home.index') }}">@lang('home.page_link.index')</a></li>
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
                                <img src="{{ $most_popular_item['image_path'] ? $most_popular_item['image_path'] : config('images.placeholder.700x400') }}" alt="{{ $most_popular_item['title'] }}">
                            </a>
                        </figure>
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
                @include('sidebar.events')
                @include('sidebar.news')
            </div>
        </div>
    </section>
@endsection
