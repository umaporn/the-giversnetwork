@extends('layouts.app')

@section('page-title', __('news.page_title.index'))
@section('page-description', __('news.page_description.index'))

@section('content')

    <section class="news all">
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
                        <li>
                            <span class="show-for-sr">Current: </span> @lang('news.page_title.index')
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <div class="grid-x grid-margin-x padding-content padding-top-0">
            <div class="cell small-12 medium-12 large-8">
                <section class="articles">
                    <div class="grid-x align-middle">
                        <h2 class="cell auto topic-dark">@lang('news.all_news')</h2>
                    </div>
                    @include('news.list')
                </section>
            </div>
            <div class="cell small-12 medium-12 large-4">
                @include('sidebar.events')
            </div>
        </div>
    </section>

@endsection
