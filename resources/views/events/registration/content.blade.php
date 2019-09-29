<section class="content-all" id="gotop">
    <section class="reg fade-index" id="register" data-magellan-target="register">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="{{ asset('images/registration/hero-banner/banner-en-1.jpg') }}"/>
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="{{ asset('images/registration/hero-banner/banner-en-mobile-1.jpg') }}">
                    </div>
                </div>
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-2.jpg') }}"/>
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-mobile-2.jpg') }}"/>
                    </div>
                </div>
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-3.jpg') }}"/>
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-mobile-3.jpg') }}">
                    </div>
                </div>
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-4.jpg') }}"/>
                    </div>
                    <div class="cell smalagendal-12 show-for-small-only">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-mobile-4.jpg') }}">
                    </div>
                </div>
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-5.jpg') }}"/>
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-mobile-5.jpg') }}">
                    </div>
                </div>
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-6.jpg') }}"/>
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-mobile-6.jpg') }}">
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-prev swiper-button-white"></div>
            <div class="swiper-button-next swiper-button-white"></div>
        </div>
    </section>

    @include('events.registration.form')

    <section class="concept" id="concept" data-magellan-target="concept">
        <div class="grid-container concept-box">
            <article class="padding-content">
                <h2 class="concept-head fade"><img src="{{ asset('images/logo-2x.png') }}"/></h2>
                <p class="concept-detail fade">
                    @lang('event_registration.agenda_description')
                </p>
            </article>
        </div>
    </section>

    <article class="concept-video">
        <div class="video-js" data-youtube="{{ __('event_registration.youtube') }}">
            <div class="video-cover">
            </div>
            <div class="play"><i class="fas fa-play"></i></div>
        </div>
    </article>
    <section class="agenda" id="agenda" data-magellan-target="agenda">
        <div class="grid-container">
            <article class="padding-content text-center">
                <img src="{{ asset('images/registration/icons/icon-agenda.svg') }}" class="icon-agenda animate-icon"/>
                <h2 class="head-topic fade">@lang('event_registration.agenda')</h2>
                <div class="agenda-date fade">
                    <div class="line"></div>
                    <p>
                        @lang('event_registration.agenda_date')
                    </p>
                </div>
                <div class="grid-x align-center">
                    <table class="unstriped text-left cell small-12 medium-10">
                        {!! __('event_registration.agenda_content') !!}
                    </table>
                </div>
            </article>
        </div>
    </section>

    <section class="speakers" id="speakers" data-magellan-target="speakers">
        <div class="grid-container">
            <article class="padding-content text-center">
                <img src="{{ asset('images/registration/icons/icon-speaker.svg') }}" class="icon-speaker animate-icon"/>
                <h2 class="head-topic fade">@lang('event_registration.speakers.title')</h2>
                <article class="speakers-show fade">
                    <div class="grid-x">
                        <div class="cell small-12 medium-6 large-3">
                            <img src="{{ asset('images/registration/speakers/speaker-01.jpg') }}"/>
                        </div>
                        <div class="grid-x cell small-12 medium-6 large-3 align-center">
                            <div class="align-self-middle">
                                <a data-fancybox data-src="#speaker-1" href="javascript:;">
                                    <h3>
                                        @lang('event_registration.speakers.speaker_1.name')
                                    </h3>
                                    <p>
                                        @lang('event_registration.speakers.speaker_1.short_description')
                                    </p>
                                    <p><i class="fas fa-comment"></i></p>

                                </a>
                                <div style="display: none; max-width:600px;" id="speaker-1">
                                    <p>@lang('event_registration.speakers.speaker_1.description')</p>
                                </div>
                            </div>
                        </div>
                        <div class="cell small-12 medium-6 large-3">
                            <img src="{{ asset('images/registration/speakers/speaker-02.jpg') }}"/>
                        </div>
                        <div class="grid-x cell small-12 medium-6 large-3 align-center">
                            <div class="align-self-middle">
                                <a data-fancybox data-src="#speaker-2" href="javascript:;">
                                    <h3> @lang('event_registration.speakers.speaker_2.name')</h3>
                                    <p>
                                        @lang('event_registration.speakers.speaker_2.short_description')
                                    </p>
                                    <p><i class="fas fa-comment"></i></p>
                                </a>
                                <div style="display: none; max-width:600px;" id="speaker-2">
                                    <p>@lang('event_registration.speakers.speaker_2.description')</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid-x cell small-12 medium-6 large-3 align-center">
                            <div class="align-self-middle">
                                <a data-fancybox data-src="#speaker-3" href="javascript:;">
                                    <h3> @lang('event_registration.speakers.speaker_3.name')</h3>
                                    <p>
                                        @lang('event_registration.speakers.speaker_3.short_description')
                                    </p>
                                    <p><i class="fas fa-comment"></i></p>
                                </a>
                                <div style="display: none; max-width:600px;" id="speaker-3">
                                    <p>@lang('event_registration.speakers.speaker_3.description')</p>
                                </div>
                            </div>
                        </div>
                        <div class="cell small-12 medium-6 large-3 align-center">
                            <img src="{{ asset('images/registration/speakers/speaker-03.jpg') }}"/>
                        </div>
                        <div class="grid-x cell small-12 medium-6 large-3">
                            <div class="align-self-middle">
                                <a data-fancybox data-src="#speaker-4" href="javascript:;">
                                    <h3> @lang('event_registration.speakers.speaker_4.name')</h3>
                                    <p>
                                        @lang('event_registration.speakers.speaker_4.short_description')
                                    </p>
                                    <p><i class="fas fa-comment"></i></p>
                                </a>
                                <div style="display: none; max-width:600px;" id="speaker-4">
                                    <p>@lang('event_registration.speakers.speaker_4.description')</p>
                                </div>
                            </div>
                        </div>
                        <div class="cell small-12 medium-6 large-3">
                            <img src="{{ asset('images/registration/speakers/speaker-04.jpg') }}"/>
                        </div>
                        <div class="cell small-12 medium-6 large-3">
                            <img src="{{ asset('images/registration/speakers/speaker-05.jpg') }}"/>
                        </div>
                        <div class="grid-x cell small-12 medium-6 large-3 align-center">
                            <div class="align-self-middle">
                                <a data-fancybox data-src="#speaker-5" href="javascript:;">
                                    <h3>
                                        @lang('event_registration.speakers.speaker_5.name')
                                    </h3>
                                    <p>
                                        @lang('event_registration.speakers.speaker_5.short_description')
                                    </p>
                                    <p><i class="fas fa-comment"></i></p>
                                </a>
                                <div style="display: none; max-width:600px;" id="speaker-5">
                                    <p>@lang('event_registration.speakers.speaker_5.description')</p>
                                </div>
                            </div>
                        </div>
                        <div class="cell small-12 medium-6 large-3">
                            <img src="{{ asset('images/registration/speakers/speaker-06.jpg') }}"/>
                        </div>
                        <div class="grid-x cell small-12 medium-6 large-3 align-center">
                            <div class="align-self-middle">
                                <a data-fancybox data-src="#speaker-6" href="javascript:;">
                                    <h3> @lang('event_registration.speakers.speaker_6.name')</h3>
                                    <p>
                                        @lang('event_registration.speakers.speaker_6.short_description')
                                    </p>
                                    <p><i class="fas fa-comment"></i></p>
                                </a>
                                <div style="display: none; max-width:600px;" id="speaker-6">
                                    <p>@lang('event_registration.speakers.speaker_6.description')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </article>
        </div>
    </section>
    <section class="gallery" id="gallery" data-magellan-target="gallery">
        <div class="grid-container">
            <article class="gallery-tabs padding-content text-center">
                <img src="{{ asset('images/registration/icons/icon-gallery.svg') }}" class="icon-gallery animate-icon"/>
                <h2 class="head-topic fade">@lang('event_registration.previous_event')</h2>
                <article class="gallery-show">
                    <div class="grid-x">
                        <div class="cell small-6 medium-4 small-order-1 medium-order-1">
                            <a href="{{ asset('images/registration/previous-event/event-01.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-01.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="cell small-6 medium-4 small-order-2 medium-order-2">
                            <a href="{{ asset('images/registration/previous-event/event-02.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-02.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="cell small-6 medium-4 small-order-3 medium-order-3">
                            <a href="{{ asset('images/registration/previous-event/event-03.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-03.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="cell small-12 medium-4 xlarge-4 small-order-5 medium-order-4">
                            <a href="{{ asset('images/registration/previous-event/event-04.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-04.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="cell small-12 medium-8 xlarge-8 small-order-6 medium-order-5">
                            <a href="{{ asset('images/registration/previous-event/event-06.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-06.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="cell small-6 medium-4 small-order-7 medium-order-6">
                            <a href="{{ asset('images/registration/previous-event/event-09.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-09.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="cell small-6 medium-4 small-order-8 medium-order-7">
                            <a href="{{ asset('images/registration/previous-event/event-07.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-07.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="cell small-6 medium-4 small-order-4 medium-order-8">
                            <a href="{{ asset('images/registration/previous-event/event-08.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-08.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </article>
            </article>
        </div>
    </section>
    <section class="map" id="map" data-magellan-target="map">
        <div class="grid-container">
            <article class="padding-content text-center">
                <img src="{{ asset('images/registration/icons/icon-map.svg') }}" class="icon-map animate-icon"/>
                <h2 class="head-topic fade">@lang('event_registration.map')</h2>
                <ul class="tabs tabs-info fade" data-tabs id="tabs-map">
                    <li class="tabs-title is-active"><a href="#map-google">@lang('event_registration.google_map')</a>
                    </li>
                </ul>
                <div class="tabs-content tabs-info-con" data-tabs-content="tabs-map">
                    <div class="tabs-panel is-active tabs-googlemap" id="map-google">
                        <div class="responsive-embed">
                            <iframe src="https://snazzymaps.com/embed/183918" width="100%" height="600px" style="border:none;"></iframe>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</section>