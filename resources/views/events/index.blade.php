@extends('layouts.app')

@section('page-title', __('events.page_title.index'))
@section('page-description', __('events.page_description.index'))

@section('content')

    <section class="events all">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <i class="fas fa-calendar"></i>
                <h2 class="topic-light">@lang('events.page_title.index')</h2>
            </div>
        </div>
        <section class="grid-x padding-content">
            <div class="cell small-12">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> @lang('events.page_title.index')
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <section class="most-popular padding-content">
            <div class="grid-x grid-margin-x grid-margin-y">
                <div class="cell small-12">
                    <h2 class="cell auto topic-dark">@lang('events.up_coming')</h2>
                </div>
                @foreach( $data['upComing'] as $events_item )
                    <article class="cell small-12 medium-4">
                        <a href="{{ route('events.detail', ['events' => $events_item['id']]) }}">
                            <figure class="cover">
                                <img src="{{ $events_item['image_path'] ? $events_item['image_path'] : config('images.placeholder.700x400') }}" alt="{{ $events_item['title'] }}">
                                <figcaption>
                                    <time datetime="{{ $events_item['event_date'] }}">{{ $events_item['event_date'] }}</time>
                                </figcaption>
                            </figure>
                        </a>
                        <a href="{{ route('events.detail', ['events' => $events_item['id']]) }}">
                            <h3>{{ $events_item['title'] }}</h3>
                        </a>
                        <div class="profile">
                            {{--<figure class="display-profile">
                                <img src="{{ $events_item['host_image'] }}" alt="{{ $events_item['hostname'] }}">
                            </figure>
                            <span>Host By {{ $events_item['hostname'] }}</span>--}}
                            @if($events_item['hostname'])
                                <span>Host by {{ $events_item['hostname'] }}</span>
                            @endif
                        </div>
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
                        <h2 class="cell auto topic-dark">@lang('events.all_events')</h2>
                    </div>
                    @include('events.list')
                </section>
            </div>
            <div class="cell small-12 medium-12 large-4">
                @include('sidebar.news')
            </div>
        </div>
    </section>
@endsection

