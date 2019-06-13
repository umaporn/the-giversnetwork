@extends('layouts.app')

@section('page-title', __('give.page_title.index'))
@section('page-description', __('give.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

<section class="give detail">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <i class="fas fa-gift"></i>
            <h2 class="topic-light">give</h2>
        </div>
    </div>
    <section class="grid-x padding-content">
        <div class="cell small-12">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Give - Food non-perishable</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> Ramen Noodles
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <section class="grid-x padding-content align-center padding-top-0">
        <div class="cell small-12 large-8 search">
            <input type="text" class="search-text" placeholder="Search">
            <button type="submit" class="search-button">
                <i class="fa fa-search"></i>
            </button>
        </div>
        <div class="cell small-12">
            <div class="grid-x align-justify">
                <div class="cell small-12 xlarge-3">
                    <form class="give-cat">
                        <div class="grid-x">
                            <div class="cell shrink">
                                <label for="category">CATEGORY</label>
                            </div>
                            <div class="cell auto">
                                <select id="category">
                                    <option value="food-non-perishable">Food non-perishable</option>
                                    <option value="xxx">xxx</option>
                                    <option value="xxx">xxx</option>
                                    <option value="xxx">xxx</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="cell small-12 xlarge-3 text-right">
                    <div class="give-cat-btn">
                        <a href="#" class="btn-blue">
                            <i class="fas fa-plus"></i> Give Item
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cell small-12 box-content">
            <article class="grid-x grid-margin-x align-top article padding-content">
                <div class="cell small-12 medium-12 large-6 text-center slide-thumb-give">
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
                <div class="cell small-12 medium-12 large-6">
                    <div class="grid-x">
                        <div class="cell small-12">
                            <div class="profile">
                                <figure class="display-profile">
                                    <img src="http://tgn.local/images/home/user-profile.jpg">
                                </figure>
                                <span>Username</span>
                            </div>
                            <h2>Ramen Noodles</h2>
                            <p class="amount">100 items</p>
                            <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i>18 May 2019 </time>
                            <div class="location"><i class="fas fa-map-marker-alt"></i>Whizdom club,101 the third place
                                : near BTS punnawithi</div>
                            <p>Detail : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget nibh
                                arcu. Morbi sollicitudin turpis id nisi fermentum mollis. Nunc ullamcorper mollis
                                efficitur. Praesent eget condimentum urna.
                            </p>
                        </div>



                        <article class="cell small-12 comment-login comment-login-my">
                            <div class="before-login">
                                <p>Do you need this items?</p>
                                <a href="#" class="btn-white btn-long">Login</a>
                            </div>
                            <div class="comment-login-detail">
                                <div class="comment-login-content">
                                    <form action="">
                                        <button class="btn-blue btn-long">I need contact with</button>
                                    </form>
                                </div>
                            </div>
                        </article>

                    </div>

                </div>
            </article>
            <div class="grid-x align-middle">
                <div class="cell auto">
                    <h2 class="topic-dark">Other uesr's items</h2>
                </div>
            </div>
            <section class="grid-x grid-margin-x margin-top-1">
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Ramen Noodles</h2>
                            <p class="cards-amount">100 items</p>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">ปลากระป๋อง เนื้อปลาแมคเคอเรลและซอสชั้นดี ตรา สามแม่ครัว ขนาด
                                200 กรัม</h2>
                            <p class="cards-amount">100 items</p>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.share.home_share_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Ramen Noodles</h2>
                            <p class="cards-amount">100 items</p>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Ramen Noodles</h2>
                            <p class="cards-amount">100 items</p>
                        </div>
                    </div>
                </article>
            </section>
            <div class="give-load">
                <a href="#" id="loadMore" class="load-more">View More <i class="fas fa-caret-down"></i></a>
            </div>
            <div class="grid-x align-middle">
                <div class="cell auto">
                    <h2 class="topic-dark">Other items</h2>
                </div>
                <div class="cell shrink view-all">
                    <a href="#">
                        <span>View All</span>
                        <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                    </a>
                </div>
            </div>
            <section class="grid-x grid-margin-x margin-top-1">
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Ramen Noodles</h2>
                            <p class="cards-amount">100 items</p>
                            <a href="#" class="btn-blue">Contact giver</a>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">ปลากระป๋อง เนื้อปลาแมคเคอเรลและซอสชั้นดี ตรา สามแม่ครัว ขนาด
                                200 กรัม</h2>
                            <p class="cards-amount">100 items</p>
                            <a href="#" class="btn-blue">Contact giver</a>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.share.home_share_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Ramen Noodles</h2>
                            <p class="cards-amount">100 items</p>
                            <a href="#" class="btn-blue">Contact giver</a>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Ramen Noodles</h2>
                            <p class="cards-amount">100 items</p>
                            <a href="#" class="btn-blue">Contact giver</a>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Ramen Noodles</h2>
                            <p class="cards-amount">100 items</p>
                            <a href="#" class="btn-blue">Contact giver</a>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Ramen Noodles</h2>
                            <p class="cards-amount">100 items</p>
                            <a href="#" class="btn-blue">Contact giver</a>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Ramen Noodles</h2>
                            <p class="cards-amount">100 items</p>
                            <a href="#" class="btn-blue">Contact giver</a>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Ramen Noodles</h2>
                            <p class="cards-amount">100 items</p>
                            <a href="#" class="btn-blue">Contact giver</a>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </section>
</section>
@endsection