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
<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US;</script>
<script type="IN/Share" data-url="{{ url()->current() }}" data-counter="top"></script>
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
                                        <a href="{{ route('user.getUserProfile', ['id' => $data->users['id']]) }}" target="_blank">
                                            @if($data->users['image_path'])
                                                <figure class="display-profile">
                                                    <img src="{{ $data->users['image_path'] ? Storage::url($data->users['image_path'] ) : asset(config('images.home.profile.user_profile' )) }}"
                                                         alt="{{ $data['username'] }}">
                                                </figure>
                                            @endif
                                            <span>{{ $data['username'] }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($data->shareImage)
                            <div class="cell small-12 text-center slide-thumb">
                                <div class="gallery-top">
                                    <div class="swiper-wrapper">

                                        @foreach( $data->shareImage as $share_image )
                                            <div class="swiper-slide">
                                                <div class="swiper-slide-container">
                                                    <figure>
                                                        <img src="{{ $share_image['image_path'] }}" alt="{{ $share_image['alt'] }}">
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
                                        @forelse( $data->shareImage as $share_image )
                                            <div class="swiper-slide">
                                                <div class="swiper-slide-container">
                                                    <figure>
                                                        <img src="{{ $share_image['image_path'] }}" alt="{{ $share_image['alt'] }}">
                                                    </figure>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="swiper-slide">
                                                <div class="swiper-slide-container">
                                                    <figure>
                                                        <img src="{{ asset(config('images.placeholder.700x400')) }}" alt="">
                                                    </figure>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="cell small-12">
                            <p>{!! $data['content'] !!}</p>
                        </div>

                        <div class="cell small-12">
                            <div class="grid-x cell auto">
                                @foreach( $shareInterestInList as $shareInterestInItem )
                                    <div class="small-1 padding-right-1">
                                        <figure class="cards-image">
                                            <img src="{{ Storage::url($shareInterestInItem->interestIn['image_path']) }}"
                                                 alt=" {{$shareInterestInItem['interest_title']}}"
                                                 class="img-cover"
                                            >
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="cell small-12">
                            <article class="share-action">

                                @include('share.like')

                                <div class="share-download">
                                    @if($data['file_path'])
                                        <a href="{{ Storage::url( $data['file_path'] ) }}" class="btn-blue" target="_blank">@lang('button.download')</a>
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
                                        <li>
                                            <a target="popup"
                                               onclick="window.open('https://www.linkedin.com/sharing/share-offsite/?text={{$data['title']}}&url={{url()->current()}}', 'popup', 'width=600,height=500')">
                                                <i class="fab fa-linkedin fa-2x"></i>
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
                        @if( Auth::guest() )
                            <div class="before-login">
                                <p>@lang('share.what_are_you_thoughts')</p>
                                <a data-open="login" class="btn-blue btn-long">@lang('button.login')</a>
                            </div>
                            <div class="comment-login-user">
                                <a href="{{ route('user.getProfile') }}" target="_blank">
                                    <figure class="display-profile">
                                        <img src="{{ asset( config( 'images.home.profile.user_profile' ) ) }}"
                                             alt="Username">
                                    </figure>
                                </a>
                            </div>
                            <div class="comment-login-detail">
                                <div class="comment-login-grid">
                                    <div class="comment-login-username">
                                        <a href="#" target="_blank">
                                            <p class="comment-name">Username</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="comment-login-content">
                                    <form action="">
                                        <textarea class="form-fill margin-bottom-1" rows="3"></textarea>
                                        <button class="btn-blue btn-long margin-bottom-1">Post</button>
                                    </form>
                                </div>
                            </div>
                        @endif

                        @if( Auth::user() )
                            <div class="comment-login-user">
                                <a href="{{ route('user.getProfile') }}" target="_blank">
                                    <figure class="display-profile">
                                        <img src="{{ Auth::user()->image_path ? Storage::url( Auth::user()->image_path ) : asset( config( 'images.home.profile.user_profile' ) ) }}"
                                             alt="{{ Auth::user()->username }}">
                                    </figure>
                                </a>
                            </div>
                            <div class="comment-login-detail">
                                <div class="comment-login-grid">
                                    <div class="comment-login-username">
                                        <a href="{{ route('user.getProfile') }}" target="_blank">
                                            <p class="comment-name">{{ Auth::user()->username }}</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="comment-login-content">
                                    <form id="post-action" class="comment-form"
                                          action="{{ route('share.saveComment', [ 'share' => $data['id'] ]) }}"
                                          method="POST">
                                        {{ csrf_field() }}
                                        <textarea id="comment_text" name="comment_text" class="form-fill margin-bottom-1" rows="3"></textarea>
                                        <div id="comment_text-help-text" class="alert help-text help-text textarea  hide"></div>
                                        <button class="btn-blue btn-long margin-bottom-1">@lang('button.post')</button>
                                        <input type="hidden" name="fk_user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="fk_share_id" value="{{ $data['id'] }}">
                                        <input type="hidden" name="public_date" value="{{ date('Y-m-d') }}">
                                    </form>
                                </div>
                            </div>
                        @endif
                    </article>
                </div>
            </div>
        </section>
        <section class="padding-content padding-bottom-0 padding-top-0">
            @include('share.comment')
        </section>
        <section class="most-popular padding-content">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12">
                    <div class="grid-x align-middle margin-bottom-1">
                        <h2 class="cell auto topic-dark">@lang('share.other_threads')</h2>
                        @if( Auth::user() )
                            <div class="cell shrink view-all">
                                <a href="{{ route('share.showCreateThreadForm') }}" class="btn-blue">
                                    <i class="fas fa-plus"></i> @lang('button.create_thread')
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="grid-x grid-margin-x recent-share">
                @foreach( $other as $other_item )
                    <article class="cell grid-x medium-12 large-6">
                        <div class="cell small-12 medium-5">
                            <a href="{{  route('share.detail', ['share' => $other_item['id']]) }}">
                                <figure>
                                    <img src="{{ $other_item['image_path'] ? $other_item['image_path'] : asset(config('images.placeholder.700x400')) }}"
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
                                    <a href="{{ route('user.getUserProfile', ['id' => $other_item->users['id']]) }}" target="_blank">
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