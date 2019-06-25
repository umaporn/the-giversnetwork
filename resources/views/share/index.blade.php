@extends('layouts.app')

@section('page-title', __('share.page_title.index'))
@section('page-description', __('share.page_description.index'))

@section('content')

    <section class="share-page">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <i class="fas fa-shapes"></i>
                <h2 class="topic-light">@lang('share.page_title.index')</h2>
            </div>
        </div>
        <section class="grid-x padding-content">
            <div class="cell small-12">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href="#">@lang('home.page_title.index')</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> @lang('share.page_title.index')
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <section class="padding-tb-0 padding-content">
            <div class="grid-x grid-margin-x grid-margin-y">
                <div class="cell small-12">
                    <div class="grid-x align-middle">
                        <h2 class="cell auto topic-dark">@lang('share.challenge')</h2>
                        <div class="cell shrink view-all">
                            <a href="{{ route('challenge.index') }}">
                                <span>@lang('button.view_all') @lang('share.challenge')</span>
                            </a>
                        </div>
                    </div>
                </div>
                @foreach( $data['challenge'] as $challenge_item )
                    <article class="cell small-12 medium-4">
                        <figure>
                            <a href="{{ route('challenge.detail', ['share' => $challenge_item['id']]) }}">
                                <img src="{{ $challenge_item['file_path'] ? $challenge_item['file_path'] : config('images.placeholder.700x400') }}" alt="{{ $challenge_item['title'] }}">
                            </a>
                        </figure>
                        <a href="{{ route('share.detail', ['share' => $challenge_item['id']]) }}">
                            <h3>{{ $challenge_item['title'] }}</h3>
                        </a>
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
                        <h2 class="cell auto topic-dark">@lang('share.threads')</h2>
                        @if( Auth::user() )
                            <div class="cell shrink view-all">
                                <a href="{{ route('share.showCreateThreadForm') }}" class="btn-blue">
                                    <i class="fas fa-plus"></i> @lang('button.create_thread')
                                </a>
                            </div>
                        @endif
                    </div>

                    @include('share.list')

                </section>
            </div>
            <div class="cell small-12 medium-12 large-4">
                @include('sidebar.news')
            </div>
        </div>
    </section>
@endsection
