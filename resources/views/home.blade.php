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
@endsection
