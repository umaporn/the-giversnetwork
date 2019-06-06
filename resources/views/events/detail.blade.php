@extends('layouts.app')

@section('page-title', __('events.page_title.detail', [
            'events_title' => $data['title'],
        ]))
@section('page-description', __('events.page_description.detail', [
            'events_title' => $data['title'],
        ]))

@section('og-title', __('events.page_title.detail', [
            'events_title' => $data['title'],
        ]))
@section('og-url', url()->current())
@section('og-description', $data['title'])
@section('og-image', $data['image_path'])

@section('content')

    <section class="events detail">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('events.page_link.index')</h2>
            </div>
        </div>
        <section class="grid-x padding-content">
            <div class="cell small-12">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href="#">@lang('home.page_link.index')</a></li>
                        <li><a href="#">@lang('events.page_link.index')</a></li>
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
                            <time datetime="{{ $data['event_date'] }}">
                                <i class="far fa-calendar-alt"></i>
                                {{$data['event_date']}}
                            </time>
                            <div class=location>
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $data['location'] }}
                            </div>
                            <div class="profile">
                                <figure class="display-profile">
                                    <img src="{{ $data['host_image'] }}" alt="">
                                </figure>
                                <span>By {{ $data['host'] }}</span>
                            </div>
                        </div>
                        <div class="cell small-12 text-center">
                            <figure>
                                <img src="{{ $data['image_path'] ? $data['image_path'] : config('images.placeholder.700x400') }}"
                                     alt="{{ $data['title'] }}">
                            </figure>
                        </div>
                        <div class="cell small-12">
                            {{ $data['description'] }}
                        </div>
                        <div class="cell small-12 medium-6 large-10 join-event">
                            <i class="fas fa-link"></i><span> Join event at :</span>
                            <a href="{{ $data['link'] }}" target="_blank">{{ $data['link'] }}</a>
                        </div>
                        <div class="social cell small-12 medium-6 large-2 text-right">
                            <label>Share To</label>
                            <ul class="no-bullet float-right">
                                <li>
                                    <a target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}','popup','width=600,height=500');">
                                        <i class="fab fa-facebook-square fa-2x"></i>
                                    </a>
                                </li>
                                <li>
                                    <a target="popup" onclick="window.open('https://twitter.com/share?text={{$data['title']}}','popup','width=600,height=500')">
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
                    <h2 class="cell auto topic-dark">@lang('events.other_events')</h2>
                </div>
                @foreach( $other as $other_item )
                    <article class="cell small-12 medium-4">
                        <a href="{{ route('events.detail', [ 'id' => $other_item['id'] ]) }}">
                            <figure class="cover">
                                <img src="{{ $other_item['image_path'] ? $other_item['image_path'] : config('images.placeholder.700x400') }}"
                                     alt="{{ $other_item['title'] }}">
                                <figcaption>
                                    <time datetime="{{ $other_item['event_date'] }}">{{ $other_item['event_date'] }}</time>
                                </figcaption>
                            </figure>
                        </a>
                        <a href="{{ route('events.detail', [ 'id' => $other_item['id'] ]) }}">
                            <h3>{{ $other_item['title'] }}</h3>
                        </a>
                        <div class="profile">
                            <figure class="display-profile">
                                <img src="{{ $other_item['host_image'] ? $other_item['host_image'] : asset(config('images.home.profile.user_profile' )) }}"
                                     alt="{{ $other_item['hostname'] }}">
                            </figure>
                            <span>By {{ $other_item['hostname'] }}</span>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </section>
@endsection