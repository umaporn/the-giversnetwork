@extends('layouts.app')

@section('page-title', __('share.page_title.detail', [
            'share_title' => $data['title'],
        ]))
@section('page-description', __('share.page_description.detail', [
            'share_title' => $data['title'],
        ]))

@section('og-title', __('share.page_title.detail', [
            'share_title' => $data['title'],
        ]))
@section('og-url', url()->current())
@section('og-description', $data['title'])
@section('og-image', $data['image_path'])

@section('content')
    <section class="share detail">
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
                        <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                        <li><a href="{{ route('share.index') }}">@lang('share.page_title.index')</a></li>
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
                            <div class="grid-x">
                                <div class="cell small-12 grid-head">
                                    <time datetime="2019-04-29">
                                        <i class="far fa-calendar-alt"></i> {{ $data['public_date'] }}</time>
                                    <div class="profile">
                                        <a href="{{ route('user.getProfile') }}" target="_blank">
                                            <figure class="display-profile">
                                                <img src="{{ $data->users['image_path'] ? Storage::url($data['user']->image_path ) : asset(config('images.home.profile.user_profile' )) }}"
                                                     alt="{{ $data['username'] }}">
                                            </figure>
                                            <span>{{ $data['username'] }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cell small-12 text-center slide-thumb">
                            <div class="gallery-top">
                                <div class="swiper-wrapper">
                                    @foreach( $data->shareImage as $share_image )
                                        <div class="swiper-slide">
                                            <div class="swiper-slide-container">
                                                <figure>
                                                    <img src="{{ $share_image['original'] }}" alt="{{ $share_image['alt'] }}">
                                                </figure>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"><i class="fas fa-chevron-right fa-2x"></i></div>
                                <div class="swiper-button-prev"><i class="fas fa-chevron-left fa-2x"></i></div>
                            </div>
                            <div class="gallery-thumbs">
                                <div class="swiper-wrapper">
                                    @foreach( $data->shareImage as $share_image )
                                        <div class="swiper-slide">
                                            <div class="swiper-slide-container">
                                                <figure>
                                                    <img src="{{ $share_image['original'] }}" alt="{{ $share_image['alt'] }}">
                                                </figure>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="cell small-12">
                            <p>{{ $data['content'] }}</p>
                        </div>
                        <div class="cell small-12">
                            <article class="share-action">
                                <div class="share-like">
                                    <a class="share-like-click">
                                        <div><i class="far fa-thumbs-up"></i></div>
                                        <p>{{ count($data->shareLike) }} @lang('share.likes_this_thread')</p>
                                    </a>
                                </div>
                                <div class="share-download">
                                    @if($data['file_path'])
                                        <a href="{{ $data['file_path'] }}" class="btn-blue" target="_blank">@lang('button.download')</a>
                                    @endif
                                </div>
                                <div class="share-share">
                                    <label>Share To</label>
                                    <ul class="no-bullet float-right">
                                        <li>
                                            <a target="popup"
                                               onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}','popup','width=600,height=500');">
                                                <i class="fab fa-facebook-square fa-2x"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="popup"
                                               onclick="window.open('https://twitter.com/share?text={{$data['title']}}','popup','width=600,height=500')">
                                                <i class="fab fa-twitter-square fa-2x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                    </div>
                </article>
            </div>
            <div class="grid-x align-middle">
                <div class="cell auto grid-x align-middle">
                    <div class="cell line auto"></div>
                    <div class="cell shrink">
                        <span class="outline-dot float-right"><span class="dot"></span></span>
                    </div>
                </div>
            </div>
        </section>
        <section class="padding-content padding-bottom-0">
            <div class="grid-x grid-margin-x">
                <h2 class="cell topic-dark">@lang('share.write_comment')</h2>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell small-12">
                    <article class="cell small-12 comment-login comment-login-my">
                        <div class="before-login">
                            <p>@lang('share.what_are_you_thoughts')</p>
                            <a href="#" class="btn-blue btn-long">@lang('button.login')</a>
                        </div>
                        <div class="comment-login-user">
                            <a href="{{ route('user.getProfile') }}" target="_blank">
                                <figure class="display-profile">
                                    <img src="{{ asset(config('images.home.profile.user_profile' )) }}" alt="">
                                </figure>
                            </a>
                        </div>
                        <div class="comment-login-detail">
                            <div class="comment-login-grid">
                                <div class="comment-login-username">
                                    <a href="{{ route('user.getProfile') }}" target="_blank">
                                        <p class="comment-name">Username</p>
                                    </a>
                                </div>
                            </div>
                            <div class="comment-login-content">
                                <form action="">
                                    <textarea id="address" class="form-fill margin-bottom-1" rows="3"></textarea>
                                    <button class="btn-blue btn-long margin-bottom-1">Post</button>
                                </form>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section class="padding-content padding-bottom-0 padding-top-0">
            <div class="grid-x grid-margin-x">
                <h2 class="cell topic-dark">20 Comments</h2>
            </div>
            <div class="grid-x grid-margin-x">
                <article class="cell small-12 comment-login">
                    <div class="comment-login-user">
                        <a href="{{ route('user.getProfile') }}" target="_blank">
                            <figure class="display-profile">
                                <img src="{{ asset(config('images.home.profile.user_profile' )) }}" alt="">
                            </figure>
                        </a>
                    </div>
                    <div class="comment-login-detail">
                        <div class="comment-login-grid">
                            <div class="comment-login-username">
                                <a href="{{ route('user.getProfile') }}" target="_blank">
                                    <p class="comment-name">Username</p>
                                </a>
                            </div>
                            <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i> 29 April 2019</time>
                        </div>
                        <div class="comment-login-content">
                            Nullam posuere dolor sed sapien lacinia feugiat. Aliquam commodo erat vel urna facilisis
                        </div>
                    </div>
                </article>
                <article class="cell small-12 comment-login">
                    <div class="comment-login-user">
                        <a href="{{ route('user.getProfile') }}" target="_blank">
                            <figure class="display-profile">
                                <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                            </figure>
                        </a>
                    </div>
                    <div class="comment-login-detail">
                        <div class="comment-login-grid">
                            <div class="comment-login-username">
                                <a href="{{ route('user.getProfile') }}" target="_blank">
                                    <p class="comment-name">Username</p>
                                </a>
                            </div>
                            <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i> 29 April 2019</time>
                        </div>
                        <div class="comment-login-content">
                            Nullam posuere dolor sed sapien lacinia feugiat. Aliquam commodo erat vel urna facilisis
                        </div>
                    </div>
                </article>
                <div class="cell small-12">
                    <a href="#" id="loadMore" class="load-more">@lang('button.view_more')
                        <i class="fas fa-caret-down"></i></a>
                </div>
            </div>
        </section>
        <section class="most-popular padding-content">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12">
                    <div class="grid-x align-middle margin-bottom-1">
                        <h2 class="cell auto topic-dark">@lang('share.other_threads')</h2>
                        <div class="cell shrink view-all">
                            <a href="#" class="btn-blue">
                                <i class="fas fa-plus"></i> @lang('button.create_thread')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-x grid-margin-x recent-share">
                @foreach( $other as $other_item )
                    <article class="cell grid-x medium-12 large-6">
                        <div class="cell small-12 medium-5">
                            <a href="{{  route('share.detail', ['share' => $other_item['id']]) }}">
                                <figure>
                                    <img src="{{ $other_item['image_path'] ? $other_item['image_path'] : asset(config('images.placeholder.700x400' )) }}"
                                         alt="{{ $other_item['title'] }}">
                                </figure>
                            </a>
                        </div>
                        <div class="cell grid-x small-12 medium-7">
                            <a href="{{  route('share.detail', ['share' => $other_item['id']]) }}">
                                <h4 class="cell">{{ $other_item['title'] }}</h4>
                            </a>
                            <div class="cell grid-x align-self-bottom">
                                <div class="cell auto profile">
                                    <a href="{{ route('user.getProfile') }}" target="_blank">
                                        <figure class="display-profile">
                                            <img src="{{ $other_item->users['image_path'] ? Storage::url($other_item->users['image_path'] ) : asset(config('images.home.profile.user_profile' )) }}"
                                                 alt="{{ $other_item->users['username'] }}">
                                        </figure>
                                        <span>{{ $other_item->users['username'] }}</span>
                                    </a>
                                </div>
                                <div class="cell shrink like">
                                    <i class="far fa-thumbs-up"></i>
                                    <span>{{ count( $other_item->shareLike ) }} likes</span>
                                </div>
                                <div class="cell shrink comment">
                                    <i class="far fa-comments"></i>
                                    <span>{{ count( $other_item->shareComment ) }} comments</span></div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

    </section>


@endsection