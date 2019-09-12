<section class="content-all">
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
                        <img src="{{ asset('images/registration/hero-banner/banner-th-4.jpg') }}" />
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-mobile-4.jpg') }}">
                    </div>
                </div>
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-5.jpg') }}" />
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="{{ asset('images/registration/hero-banner/banner-th-mobile-5.jpg') }}">
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
                <h2 class="concept-head fade"><img src="{{ asset('images/logo-2x.png') }}" /></h2>
                <p class="concept-detail fade">
                    @lang('event_registration.concept_detail')
                </p>
            </article>
        </div>
    </section>
    <section class="agenda" id="agenda" data-magellan-target="agenda">
        <div class="grid-container">
            <article class="padding-content text-center">
                <img src="{{ asset('images/registration/icons/icon-agenda.svg') }}" class="icon-agenda animate-icon" />
                <h2 class="head-topic fade">@lang('event_registration.agenda')</h2>
                <div class="agenda-date fade">
                    <div class="line"></div>
                    <p>
                        MONDAY 3<sup>rd</sup> JUNE 2019
                    </p>
                </div>
                <div class="grid-x align-center">
                    <table class="unstriped text-left cell small-12 medium-10">
                        <tr>
                            <th>1 : 45 PM - 2 : 30 PM <i class="fas fa-clock"></i></th>
                            <td>
                                <strong>ลงทะเบียน</strong>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>9 : 00 AM – 11:30 AM <i class="fas fa-clock"></i></th>
                            <td>
                                <strong>แบ่งปันประสบการณ์ของผู้ให้โดยวิทยากร ณ ห้องแมกโนเลีย บอลรูม ชั้น 10</strong>
                                <p>
                                    มร.บิลล์ โซเมอร์วิลล์ เจ้าของสูตรสำเร็จ “การให้” ง่ายๆที่สร้างผลลัพธ์ที่ยิ่งใหญ่
                                </p>
                                <p>
                                    ด.ญ.ระริน สถิตธนาสาร (น้องลิลลี่) นักสิ่งแวดล้อมรุ่นจิ๋ว กับภารกิจกอบกู้โลก
                                </p>
                                <p>
                                    คุณมีชัย วีระไวทยะ ผู้นำการเปลี่ยนแปลง ไม่ว่าจะมีบทบาทไหนในสังคม
                                </p>
                                <p>
                                    นพ.วรวิทย์ ตันติวัฒนทรัพย์ หมอชนบทที่คุณค่าของทุกชีวิต คือความหมายของ 27
                                    ปีแห่งความเสียสละ
                                </p>
                                <p>
                                    ด.ญ.ไหน แซ่เติ๋น เด็กหญิงธรรมดาที่ต้นทุนในชีวิตไม่ใช่ข้อจำกัดของการให้
                                </p>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>11:30 AM – 13:00 PM <i class="fas fa-clock"></i></th>
                            <td>
                                <strong>รับประทานอาหารกลางวัน</strong>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </div>

            </article>
        </div>
    </section>
    <section class="gallery" id="gallery" data-magellan-target="gallery">
        <div class="grid-container">
            <article class="gallery-tabs padding-content text-center">
                <img src="{{ asset('images/registration/icons/icon-gallery.svg') }}" class="icon-gallery animate-icon" />
                <h2 class="head-topic fade">@lang('event_registration.previous_event')</h2>
                <article class="gallery-show">
                    <div class="grid-x">
                        <div class="cell small-4">
                            <a href="{{ asset('images/registration/previous-event/event-01.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-01.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="cell small-4">
                            <a href="{{ asset('images/registration/previous-event/event-02.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-02.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="cell small-4">
                            <a href="{{ asset('images/registration/previous-event/event-03.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-03.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="grid-x">
                        <div class="cell small-12 xlarge-4">
                            <a href="{{ asset('images/registration/previous-event/event-04.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-04.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="cell small-12 xlarge-8">
                            <a href="{{ asset('images/registration/previous-event/event-06.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-06.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="grid-x">
                        <div class="cell small-4">
                            <a href="{{ asset('images/registration/previous-event/event-09.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-09.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="cell small-4">
                            <a href="{{ asset('images/registration/previous-event/event-07.jpg') }}" class="gallery-pic"
                               data-fancybox="previous-event" data-caption="">
                                <img src="{{ asset('images/registration/previous-event/event-thumbs-07.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="cell small-4">
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
                <img src="{{ asset('images/registration/icons/icon-map.svg') }}" class="icon-map animate-icon" />
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