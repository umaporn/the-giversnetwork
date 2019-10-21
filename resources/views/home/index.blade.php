@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))

@section('content')
    @include('home.event_popup')
    @include('home.banner')
    @include('home.news')
    @include('home.share')
    @include('home.give')
    @include('home.learn')
    @include('home.events')

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
                <h2 class="topic-dark">@lang('home.about_us.title')</h2>
                @foreach(__('home.about_us.content') as $contents )
                    <p>{!! $contents !!}</p>
                @endforeach
            </div>
            <div class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                <figure>
                    <img src="{{ asset(config('images.home.about.founder' )) }}" alt="">
                </figure>
            </div>
        </article>
        <div class="grid-x align-middle">
            <div class="cell auto grid-x align-middle">
                <div class="cell line auto"></div>
                <div class="cell shrink"><span class="outline-dot float-right"><span class="dot"></span></span></div>
            </div>
            <div class="cell shrink view-all">
                <a href="{{ route('about.index') }}">
                    <span>@lang('button.see_more')</span>
                    <i class="fas fa-caret-right"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
