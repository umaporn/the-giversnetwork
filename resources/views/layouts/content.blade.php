<div class="grid-container full">
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
</div>