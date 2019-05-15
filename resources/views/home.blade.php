@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')
    <div class="swiper-container">
      <div class="swiper-wrapper">
            @foreach(config('images.home_banner') as $home_banner)
                    <div class="swiper-slide"><img src="{{ asset($home_banner) }}"/></div>
            @endforeach
         </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next">
            <i class="fas fa-chevron-right fa-3x"></i>
      </div>
      <div class="swiper-button-prev">
            <i class="fas fa-chevron-left fa-3x"></i>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
   </div>
   <section class="news padding-content">
        <div class="grid-x align-middle">
            <h2 class="cell auto topic-dark">News</h2>
            <div class="cell shrink view-all">
                <a href="#">
                    <span>View All</span>
                    <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
                </a>
            </div>
        </div>
        <div class="grid-x grid-margin-x ">
                <article class="cell small-12 medium-4">
                    <figure>
                        <img src="{{ asset(config('images.home.news.home_news_01' )) }}" class="gallery_img">
                    </figure>
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                    <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i>29 April 2019</time>
                </article>
                <article class="cell small-12 medium-4">
                    <figure>
                        <img src="{{ asset(config('images.home.news.home_news_01' )) }}" class="gallery_img">
                    </figure>
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                    <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i>29 April 2019</time>
                </article>
                <article class="cell small-12 medium-4">
                    <figure>
                        <img src="{{ asset(config('images.home.news.home_news_01' )) }}" class="gallery_img">
                    </figure>
                    <h3>Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse</h3>
                    <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i>29 April 2019</time>
                </article>
        </div>
   </section>
@endsection
