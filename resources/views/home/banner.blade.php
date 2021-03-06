@if($data['banner']->total() !== 1)
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach( $data['banner'] as $home_banner )
                <div class="swiper-slide">
                    <a href="{{ $home_banner['link'] }}" target="_blank">
                        <img src="{{ $home_banner['image_path'] ? $home_banner['image_path'] : config('images.placeholder.1900x500') }}" alt="{{$home_banner['title']}}">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next">
            <i class="fas fa-chevron-right fa-3x"></i>
        </div>
        <div class="swiper-button-prev">
            <i class="fas fa-chevron-left fa-3x"></i>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    @else
    <div class="swiper-wrapper">
        @foreach( $data['banner'] as $home_banner )
            <div class="swiper-slide">
                <a href="{{ $home_banner['link'] }}" target="_blank">
                    <img src="{{ $home_banner['image_path'] ? $home_banner['image_path'] : config('images.placeholder.1900x500') }}" alt="{{$home_banner['title']}}">
                </a>
            </div>
        @endforeach
    </div>
@endif