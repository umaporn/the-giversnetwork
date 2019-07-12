@extends('layouts.app')

@section('page-title', __('give.page_title.detail', [
            'give_title' => $data['title'],
        ]))
@section('page-description', __('give.page_description.detail', [
            'give_title' => $data['title'],
        ]))

@section('og-title', __('give.page_title.detail', [
            'give_title' => $data['title'],
        ]))
@section('og-url', url()->current())
@section('og-description', $data['title'])
@section('og-image', $data['image_path'])

@section('content')

    <section class="give detail">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <i class="fas fa-gift"></i>
                <h2 class="topic-light">@lang('give.page_title.index')</h2>
            </div>
        </div>
        <section class="grid-x padding-content">
            <div class="cell small-12">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                        <li>
                            <a href="{{ route('give.index',  [ 'category_id' => $data['fk_category_id'] ]) }}">
                                @lang('give.page_title.index') - {{ $data['category_title'] }}
                            </a>
                        </li>
                        <li>
                            <span class="show-for-sr">Current: </span> {{ $data['title'] }}
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <section class="grid-x padding-content align-center padding-top-0">
            <div class="cell small-12 large-8 search">
                <form id="search-form-detail" class="cell search" method="GET" action="{{ route('give.index') }}">
                    {{ csrf_field() }}
                    <input name="search" type="search" class="search-text" placeholder="Search">
                    <button type="submit" class="search-button">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="cell small-12">
                <div class="grid-x align-justify">
                    <div class="cell small-12 xlarge-3">
                        <form class="give-cat">
                            <div class="grid-x">
                                <div class="cell shrink text-uppercase">
                                    <label for="category">@lang('give.category')</label>
                                </div>
                                <div class="cell auto">
                                    <select id="category" class="give-filter">
                                        <option value="{{ route('give.index',  [ 'category_id' => '' ]) }}">@lang('give.give_category_selection')</option>
                                        @foreach( $data['giveCategory'] as $category )
                                            <option value="{{ route('give.index',  [ 'category_id' => $category['id'] ]) }}"
                                                    @if( $category_id == $category['id'] ) selected @endif
                                            >{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if( Auth::user() )
                        <div class="cell small-12 xlarge-3 text-right">
                            <div class="give-cat-btn">
                                <a href="{{ route('give.showCreateItemForm') }}" class="btn-blue">
                                    <i class="fas fa-plus"></i> @lang('give.give_item')
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="cell small-12 box-content">
                <article class="grid-x grid-margin-x align-top article padding-content">
                    <div class="cell small-12 medium-12 large-6 text-center slide-thumb-give">
                        <div class="gallery-top">
                            <div class="swiper-wrapper">
                                @forelse( $data->giveImage as $give_image )
                                    <div class="swiper-slide">
                                        <div class="swiper-slide-container">
                                            <figure>
                                                <img src="{{ $give_image['image_path'] ? $give_image['image_path'] : asset( config('images.placeholder.700x400') ) }}"
                                                     alt="{{ $give_image['alt'] }}">
                                            </figure>
                                        </div>
                                    </div>
                                @empty
                                    <div class="swiper-slide">
                                        <div class="swiper-slide-container">
                                            <figure>
                                                <img src="{{ asset( config('images.placeholder.700x400') ) }}" alt="">
                                            </figure>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"><i class="fas fa-chevron-right fa-2x"></i></div>
                            <div class="swiper-button-prev"><i class="fas fa-chevron-left fa-2x"></i></div>
                        </div>
                        <div class="gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach( $data->giveImage as $give_image )
                                    <div class="swiper-slide">
                                        <div class="swiper-slide-container">
                                            <figure>
                                                <img src="{{ $give_image['image_path'] ? $give_image['image_path'] : asset( config('images.placeholder.700x400') ) }}"
                                                     alt="{{ $give_image['alt'] }}">
                                            </figure>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="cell small-12 medium-12 large-6">
                        <div class="grid-x">
                            <div class="cell small-12">
                                <div class="profile">
                                    <figure class="display-profile">
                                        <img src="{{ $data->users['image_path'] ? Storage::url($data->users['image_path'] ) : asset(config('images.home.profile.user_profile' )) }}"
                                             alt="{{ $data->users['username'] }}">
                                    </figure>
                                    <span>{{ $data->users['username'] }}</span>
                                </div>
                                <h2>{{ $data['title'] }}</h2>
                                <p class="amount">{{ $data['amount'] }} items</p>
                                <time datetime="2019-04-29">
                                    <i class="far fa-calendar-alt"></i>{{ $data['expired_date'] }}</time>
                                <div class="location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $data['address'] }}
                                </div>
                                <p>
                                    {!! $data['description'] !!}
                                </p>
                            </div>

                            <article class="cell small-12 comment-login comment-login-my">
                                @if( Auth::guest() )
                                    <div class="before-login">
                                        <p>@lang('give.do_you_need')</p>
                                        <a data-open="login" class="btn-white btn-long">@lang('button.login')</a>
                                    </div>
                                @endif
                                <div class="comment-login-detail">
                                    <div class="comment-login-content">
                                        <a href="{{ route('give.detail', [ 'give' => $data['id'] ]) }}">
                                            <button class="btn-blue btn-long">@lang('give.i_need_contact') {{ $data->users['username'] }}</button>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </article>
                <div class="grid-x align-middle">
                    <div class="cell auto">
                        <h2 class="topic-dark">@lang('give.other_user_item')</h2>
                    </div>
                </div>

                @include('give.other_user_list')

                <div class="grid-x align-middle">
                    <div class="cell auto">
                        <h2 class="topic-dark">@lang('give.other_item')</h2>
                    </div>
                    <div class="cell shrink view-all">
                        <a href="{{ route('give.index') }}">
                            <span>@lang('button.view_all')</span>
                            <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                        </a>
                    </div>
                </div>
                <section class="grid-x grid-margin-x margin-top-1">
                    @foreach($data['allList']  as $give_item)
                        <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                            <div class="cards-style">
                                <figure class="cards-image">
                                    <a href="{{ route('give.detail', [ 'give' => $give_item['id'] ]) }}">
                                        <img src="{{ $give_item['image_path'] ? $give_item['image_path'] : asset(config('images.placeholder.130x130')) }}"
                                             alt="{{ $give_item['title'] }}"
                                             class="img-cover"
                                        >
                                    </a>
                                </figure>
                                <div class="cards-detail">
                                    <a href="{{ route('give.detail', [ 'give' => $give_item['id'] ]) }}">
                                        <h2 class="cards-topic">{{ $give_item['title'] }}</h2>
                                    </a>
                                    <p class="cards-amount">{{ $give_item['amount'] }} items</p>
                                    <a href="{{ route('give.detail', [ 'give' => $give_item['id'] ]) }}"
                                       class="btn-blue"
                                    >
                                        @lang('give.contact_giver')
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </section>
            </div>
        </section>
    </section>
@endsection