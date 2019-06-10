@extends('layouts.app')

@section('page-title', __('share-article.page_title.index'))
@section('page-description', __('share-articl.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

<section class="share detail">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <i class="fas fa-shapes"></i>
            <h2 class="topic-light">Share</h2>
        </div>
    </div>
    <section class="grid-x padding-content">
        <div class="cell small-12">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Share</a></li>
                    <li><a href="#">Challenge</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> ArticleXXX
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
                        <h2>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                        </h2>
                        <div class="grid-x">
                            <div class="cell small-12 grid-head">
                                <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i> 29 April 2019</time>
                                <div class="profile">
                                    <a href="{{ route('users.myProfile') }}" target="_blank">
                                        <figure class="display-profile">
                                            <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                        </figure>
                                        <span>username</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cell small-12 text-center slide-thumb">
                        <div class="gallery-top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <figure>
                                            <img src="{{ asset(config('images.home.news.home_news_01' )) }}">
                                        </figure>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <figure>
                                            <img src="{{ asset(config('images.home.news.home_news_01' )) }}">
                                        </figure>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <figure>
                                            <img src="{{ asset(config('images.home.news.home_news_01' )) }}">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"><i class="fas fa-chevron-right fa-2x"></i></div>
                            <div class="swiper-button-prev"><i class="fas fa-chevron-left fa-2x"></i></div>
                        </div>
                        <div class="gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <figure>
                                            <img src="{{ asset(config('images.home.news.home_news_01' )) }}">
                                        </figure>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <figure>
                                            <img src="{{ asset(config('images.home.news.home_news_01' )) }}">
                                        </figure>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-slide-container">
                                        <figure>
                                            <img src="{{ asset(config('images.home.news.home_news_01' )) }}">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cell small-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh arcu. Morbi
                            sollicitudin turpis id nisi fermentum mollis.
                            Praesent elementum vulputate nibh ac hendrerit. Integer a metus vitae mauris semper finibus
                            ac vel tortor. Ut id odio lobortis, lacinia purus pharetra,
                            cursus metus. Fusce ultricies fringilla mauris, sed condimentum massa feugiat non. Fusce
                            faucibus, magna at auctor cursus, ipsum velit sollicitudin magna,
                            a vulputate mauris lorem vitae nunc. Sed efficitur ultricies leo, sit amet venenatis orci
                            ultrices non. Nam viverra neque nec risus dignissim consequat.
                            Nunc placerat odio dui. Sed lacinia convallis neque ac suscipit. Sed vitae condimentum ante.
                            Aliquam fringilla iaculis placerat. Cras consectetur neque id
                        </p>
                        <p>rutrum condimentum. Pellentesque urna felis, congue ut eros et, sagittis consectetur eros.
                            Praesent sed pharetra magna. Vivamus maximus sed turpis non venenatis.
                            Suspendisse mollis elementum eros, in fermentum dolor luctus eget. Aliquam dignissim, tortor
                            interdum consectetur sollicitudin, felis metus sagittis ante,
                            iaculis egestas sapien nunc ac ipsum. Etiam venenatis est eu lacus placerat placerat. Nullam
                            tempor lectus ac eros mollis dapibus. Nunc non rutrum tellus.
                            Aenean molestie suscipit metus, sit amet luctus nisl euismod suscipit. Duis venenatis mi sed
                            eros suscipit mattis. Curabitur eu nisi massa. Nullam feugiat tellus massa.
                        </p>
                        <p> Nullam posuere dolor sed sapien lacinia feugiat. Aliquam commodo erat vel urna facilisis, ac
                            elementum purus mattis. Vestibulum a nisl non leo porttitor
                            hendrerit id sed ex. Aenean metus velit, tincidunt id luctus faucibus, ullamcorper vitae
                            erat. Phasellus sed fringilla odio, in sodales nulla. Sed sodales
                            tincidunt luctus. Suspendisse eget convallis nisi. Mauris sagittis tincidunt efficitur.
                            Donec quis ligula ipsum. Nam egestas vel sapien at semper.
                            Pellentesque quis turpis sit amet justo sollicitudin condimentum in eu orci. Mauris aliquet
                            congue est, eget pulvinar metus lobortis eu.
                        </p>
                    </div>
                    <div class="cell small-12">
                        <article class="share-action">
                            <div class="share-like">
                                <a class="share-like-click">
                                    <div><i class="far fa-thumbs-up"></i></div>
                                    <p>1.5k Likes this thread</p>
                                </a>
                            </div>
                            <div class="share-download">
                                <a href="#" class="btn-blue">Download</a>
                            </div>
                            <div class="share-share">
                                <label>Share To</label>
                                <ul class="no-bullet float-right">
                                    <li><a href="#"><i class="fab fa-facebook-square fa-2x"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter-square fa-2x"></i></a></li>
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
                <div class="cell shrink"><span class="outline-dot float-right"><span class="dot"></span></span></div>
            </div>
        </div>
    </section>
    <section class="padding-content padding-bottom-0">
        <div class="grid-x grid-margin-x">
            <h2 class="cell topic-dark">Write A Comment</h2>
        </div>
        <div class="grid-x grid-margin-x">
            <div class="cell small-12">
                <article class="cell small-12 comment-login comment-login-my">
                    <div class="before-login">
                        <p>What are you thoughts?</p>
                        <a href="#" class="btn-blue btn-long">Login</a>
                    </div>
                    <div class="comment-login-user">
                        <a href="{{ route('users.myProfile') }}" target="_blank">
                            <figure class="display-profile">
                                <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                            </figure>
                        </a>
                    </div>
                    <div class="comment-login-detail">
                        <div class="comment-login-grid">
                            <div class="comment-login-username">
                                <a href="{{ route('users.myProfile') }}" target="_blank">
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
                    <a href="{{ route('users.myProfile') }}" target="_blank">
                        <figure class="display-profile">
                            <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                        </figure>
                    </a>
                </div>
                <div class="comment-login-detail">
                    <div class="comment-login-grid">
                        <div class="comment-login-username">
                            <a href="{{ route('users.myProfile') }}" target="_blank">
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
                    <a href="{{ route('users.myProfile') }}" target="_blank">
                        <figure class="display-profile">
                            <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                        </figure>
                    </a>
                </div>
                <div class="comment-login-detail">
                    <div class="comment-login-grid">
                        <div class="comment-login-username">
                            <a href="{{ route('users.myProfile') }}" target="_blank">
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
                <a href="#" id="loadMore" class="load-more">View More <i class="fas fa-caret-down"></i></a>
            </div>
        </div>
    </section>
    <section class="most-popular padding-content">
        <div class="grid-x grid-margin-x">
            <div class="cell small-12">
                <div class="grid-x align-middle margin-bottom-1">
                    <h2 class="cell small-12 topic-dark">OTHER Challenge</h2>
                </div>
            </div>
        </div>
        <div class="grid-x grid-margin-x recent-share">
            <article class="cell grid-x medium-12 large-6">
                <div class="cell small-12 medium-5">
                    <figure>
                        <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                    </figure>
                </div>
                <div class="cell grid-x small-12 medium-7">
                    <a href="#">
                        <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Suspendisse eget nibh arcu.</h4>
                    </a>
                    <div class="cell grid-x align-self-bottom">
                        <div class="cell auto profile">
                            <a href="{{ route('users.myProfile') }}" target="_blank">
                                <figure class="display-profile">
                                    <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                </figure>
                                <span>username</span>
                            </a>
                        </div>
                        <div class="cell shrink like"><i class="far fa-thumbs-up"></i><span>415 likes</span>
                        </div>
                        <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                comments</span></div>
                    </div>
                </div>
            </article>
            <article class="cell grid-x medium-12 large-6">
                <div class="cell small-12 medium-5">
                    <figure>
                        <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                    </figure>
                </div>
                <div class="cell grid-x small-12 medium-7">
                    <a href="#">
                        <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Suspendisse eget nibh arcu.</h4>
                    </a>
                    <div class="cell grid-x align-self-bottom">
                        <div class="cell auto profile">
                            <a href="{{ route('users.myProfile') }}" target="_blank">
                                <figure class="display-profile">
                                    <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                </figure>
                                <span>username</span>
                            </a>
                        </div>
                        <div class="cell shrink like"><i class="far fa-thumbs-up"></i><span>415 likes</span>
                        </div>
                        <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                comments</span></div>
                    </div>
                </div>
            </article>
            <article class="cell grid-x medium-12 large-6">
                <div class="cell small-12 medium-5">
                    <figure>
                        <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                    </figure>
                </div>
                <div class="cell grid-x small-12 medium-7">
                    <a href="#">
                        <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Suspendisse eget nibh arcu.</h4>
                    </a>
                    <div class="cell grid-x align-self-bottom">
                        <div class="cell auto profile">
                            <a href="{{ route('users.myProfile') }}" target="_blank">
                                <figure class="display-profile">
                                    <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                </figure>
                                <span>username</span>
                            </a>
                        </div>
                        <div class="cell shrink like"><i class="far fa-thumbs-up"></i><span>415 likes</span>
                        </div>
                        <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                comments</span></div>
                    </div>
                </div>
            </article>
            <article class="cell grid-x medium-12 large-6">
                <div class="cell small-12 medium-5">
                    <figure>
                        <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                    </figure>
                </div>
                <div class="cell grid-x small-12 medium-7">
                    <a href="#">
                        <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Suspendisse eget nibh arcu.</h4>
                    </a>
                    <div class="cell grid-x align-self-bottom">
                        <div class="cell auto profile">
                            <a href="{{ route('users.myProfile') }}" target="_blank">
                                <figure class="display-profile">
                                    <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                </figure>
                                <span>username</span>
                            </a>
                        </div>
                        <div class="cell shrink like"><i class="far fa-thumbs-up"></i><span>415 likes</span>
                        </div>
                        <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                comments</span></div>
                    </div>
                </div>
            </article>
            <article class="cell grid-x medium-12 large-6">
                <div class="cell small-12 medium-5">
                    <figure>
                        <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                    </figure>
                </div>
                <div class="cell grid-x small-12 medium-7">
                    <a href="#">
                        <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Suspendisse eget nibh arcu.</h4>
                    </a>
                    <div class="cell grid-x align-self-bottom">
                        <div class="cell auto profile">
                            <a href="{{ route('users.myProfile') }}" target="_blank">
                                <figure class="display-profile">
                                    <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                </figure>
                                <span>username</span>
                            </a>
                        </div>
                        <div class="cell shrink like"><i class="far fa-thumbs-up"></i><span>415 likes</span>
                        </div>
                        <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                comments</span></div>
                    </div>
                </div>
            </article>
            <article class="cell grid-x medium-12 large-6">
                <div class="cell small-12 medium-5">
                    <figure>
                        <img src="{{ asset(config('images.home.share.home_share_01' )) }}">
                    </figure>
                </div>
                <div class="cell grid-x small-12 medium-7">
                    <a href="#">
                        <h4 class="cell">Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Suspendisse eget nibh arcu.</h4>
                    </a>
                    <div class="cell grid-x align-self-bottom">
                        <div class="cell auto profile">
                            <a href="{{ route('users.myProfile') }}" target="_blank">
                                <figure class="display-profile">
                                    <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                </figure>
                                <span>username</span>
                            </a>
                        </div>
                        <div class="cell shrink like"><i class="far fa-thumbs-up"></i><span>415 likes</span>
                        </div>
                        <div class="cell shrink comment"><i class="far fa-comments"></i><span>500
                                comments</span></div>
                    </div>
                </div>
            </article>
        </div>
    </section>

</section>


@endsection