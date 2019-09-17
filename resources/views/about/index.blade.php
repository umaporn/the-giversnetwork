@extends('layouts.app')

@section('page-title', __('about.page_title.index'))
@section('page-description', __('about.page_description.index'))

@section('content')

    <section class="about detail">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('about.page_title.index')</h2>
            </div>
        </div>
        <section class="grid-x padding-content">
            <div class="cell small-12">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> @lang('about.about_us')
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <section class="article padding-content">
            <div class="grid-x grid-margin-x">
                <article class="cell margin-top-0">
                    <div class="grid-x grid-margin-x grid-margin-y large-margin-collapse">
                        <div class="cell small-12 text-center">
                            <h2>@lang('app.app_name')</h2>
                        </div>
                        <div class="cell small-12">
                            <figure class="text-center margin-bottom-1">
                                <img src="{{ asset(config('images.about.about_01' )) }}" alt="">
                            </figure>
                        </div>
                        <div class="cell small-12">

                            @foreach(__('home.about_us.content') as $contents )
                                <p>{!! $contents !!}</p>
                            @endforeach

                            <h2>@lang('home.vision.title')</h2>
                            <p>@lang('home.vision.content')</p>
                            <div class="about-mission">
                                <p class="about-mission-text">
                                    <strong>@lang('home.what_we_do.our_mission')</strong>
                                </p>
                                @foreach( __('home.what_we_do.content') as $what_we_do_content )
                                    <p>
                                        <strong class="about-number">{{ $what_we_do_content['number'] }}</strong>
                                        {!! $what_we_do_content['text'] !!}
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    <!-- <div class="grid-x cell small-12 margin-bottom-2 grid-margin-x grid-margin-y">
                        <div class="cell small-12 medium-6">
                            <figure>
                                <img src="{{ asset(config('images.about.about_02' )) }}" style="width: 100%;">
                            </figure>
                        </div>
                        <div class="cell small-12 medium-6">
                            <figure class="margin-bottom-2 ">
                                <img src="{{ asset(config('images.about.about_02' )) }}" style="width: 60%;">
                            </figure>
                            <figure>
                                <img src="{{ asset(config('images.about.about_02' )) }}" style="width: 100%;">
                            </figure>
                        </div>
                    </div> -->
                    </div>
                </article>
            </div>
        </section>

    </section>


@endsection