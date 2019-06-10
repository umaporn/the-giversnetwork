@extends('layouts.app')

@section('page-title', __('challenge.page_title.index'))
@section('page-description', __('challenge.page_description.index'))=

@section('content')

    <section class="share-page">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <i class="fas fa-shapes"></i>
                <h2 class="topic-light">@lang('challenge.page_title.index')</h2>
            </div>
        </div>
        <section class="grid-x padding-content">
            <div class="cell small-12">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                        <li><a href="{{ route('share.index') }}">@lang('share.page_title.index')</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> @lang('challenge.page_title.index')
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <div class="grid-x grid-margin-x padding-content padding-top-0 space-article">
            <div class="cell small-12 medium-12 large-8">
                <section class="articles">
                    <div class="grid-x align-middle">
                        <h2 class="cell auto topic-dark"> @lang('challenge.page_title.index')</h2>
                    </div>

                    @include('challenge.list')

                </section>
            </div>
            <div class="cell small-12 medium-12 large-4">
                @include('sidebar.events')
                @include('sidebar.news')
            </div>

        </div>
    </section>
@endsection