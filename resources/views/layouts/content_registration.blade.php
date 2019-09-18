<section class="content-all" id="gotop">
    <section class="reg fade-index" id="register" data-magellan-target="register">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="../images/registration/hero-banner/banner-en-1.jpg" />
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="../images/registration/hero-banner/banner-en-mobile-1.jpg">
                    </div>
                </div>
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="../images/registration/hero-banner/banner-th-2.jpg" />
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="../images/registration/hero-banner/banner-th-mobile-2.jpg">
                    </div>
                </div>
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="../images/registration/hero-banner/banner-th-3.jpg" />
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="../images/registration/hero-banner/banner-th-mobile-3.jpg">
                    </div>
                </div>
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="../images/registration/hero-banner/banner-th-4.jpg" />
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="../images/registration/hero-banner/banner-th-mobile-4.jpg">
                    </div>
                </div>
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="../images/registration/hero-banner/banner-th-5.jpg" />
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="../images/registration/hero-banner/banner-th-mobile-5.jpg">
                    </div>
                </div>
                <div class="swiper-slide grid-x align-right grid-padding-x swiper-slide-active">
                    <div class="cell small-12 show-for-medium">
                        <img src="../images/registration/hero-banner/banner-th-6.jpg" />
                    </div>
                    <div class="cell small-12 show-for-small-only">
                        <img src="../images/registration/hero-banner/banner-th-mobile-6.jpg">
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
    <form class="form-reg" name="register" method="post" action="register.php">
        <a class="reg-min"><i class="fas fa-angle-down"></i></a>
        <h3 class="form-head">@lang('event_registration.form_heading')</h3>
        <div class="form-group">
            <input type="text" id="name" name="first_name" class="form-control" placeholder="NAME">
            <label for="name" class="form-control-place">@lang('event_registration.form_first_name')</label>
            <div class="error-text hide" id="first_name_error">
                @lang('event_registration.first_name_error')
            </div>
        </div>
        <div class="form-group">
            <input type="text" id="surname" name="last_name" class="form-control"
                placeholder="@lang('event_registration.form_last_name')">
            <label for="surname" class="form-control-place">@lang('event_registration.form_last_name')</label>
            <div class="error-text hide" id="last_name_error">
                @lang('event_registration.last_name_error')
            </div>
        </div>
        <div class="form-group">
            <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
            <label for="phone" class="form-control-place">@lang('event_registration.form_phone')</label>
            <div class="error-text hide" id="phone_error">
                @lang('event_registration.phone_error')
            </div>
        </div>
        <div class="form-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            <label for="email" class="form-control-place">@lang('event_registration.form_email')</label>
            <div class="error-text hide" id="email_error">
                @lang('event_registration.email_error')
            </div>
            <div class="error-text hide" id="email_error_format">
                @lang('event_registration.email_error_format')
            </div>
        </div>
        <div class="form-group">
            <select name="gender" id="gender" class="form-control-select">
                <option value="">@lang('event_registration.form_gender')</option>
                @foreach( __('event_registration.gender') as $gender )
                <option value="">{ $gender }></option>
                @endforeach
            </select>
            <div class="error-text hide" id="gender_error" style="margin-top: 1px">
                @lang('event_registration.gender_error')
            </div>
        </div>
        <div class="form-group">
            <select name="country" id="country" class="form-control-select">
                <option value="">@lang('event_registration.form_country')</option>
                @foreach( __('event_registration.country') as $country )
                <option value="">{ $country }></option>
                @endforeach
            </select>
           <div class="error-text hide" id="country_error" style="margin-top: 1px">
                @lang('event_registration.country_error')
            </div>
        </div>
        <div class="form-group">
            <select id="profession" class="form-control-select">
                <option value="">@lang('event_registration.form_profession')</option>
                @foreach( __('event_registration.profession') as $profession )
                <option value="">{ $profession }></option>
                @endforeach
            </select>
            <div class="error-text hide" id="profession_error" style="margin-top: 1px">
                @lang('event_registration.profession_error')
            </div>
        </div>
        <button type="button" class="button-reg" id="register-btn">@lang('event_registration.register_button')</button>
        <div class="reveal" id="result-box" data-reveal style="border-radius: 5px;">
            <button class="close-button" data-close aria-label="Close modal" type="button"
                onclick="window.location.reload();">
                <span>&times;</span>
            </button>
        </div>
    </form>
    <section class="concept" id="concept" data-magellan-target="concept">
        <div class="grid-container concept-box">
            <article class="padding-content">
                <h2 class="concept-head fade"><img src="../images/logo-2x.png" /></h2>
                <p class="concept-detail fade">
                    @lang('event_registration.concept_detail')
                </p>
                <h2 class="head-topic fade">@lang('event_registration.vision')</h2>
                <p class="concept-detail fade">
                    @lang('event_registration.vision_detail')
                </p>
                <h2 class="head-topic fade">@lang('event_registration.mission')</h2>
                <p class="concept-detail fade">
                    @lang('event_registration.mission_detail')
                </p>
            </article>
        </div>
        <article class="concept-video">
			<div class="video-js">
				<div class="video-cover">
				</div>
				<div class="play"><i class="fas fa-play"></i></div>
			    <iframe style="display: none;" width="560" height="315" src="https://www.youtube.com/embed/2xs4dAXzw40?autoplay=1&amp;rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe></div>
        </article>
    </section>
    <section class="agenda" id="agenda" data-magellan-target="agenda">
        <div class="grid-container">
            <article class="padding-content text-center">
                <img src="../images/registration/icons/icon-agenda.svg" class="icon-agenda animate-icon" />
                <h2 class="head-topic fade">@lang('event_registration.agenda')</h2>
                <div class="agenda-date fade">
                    <div class="line"></div>
                    <p>
                        SAT 5<sup>th</sup> OCTOBER 2019
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
    
    <section class="speakers" id="speakers" data-magellan-target="speakers">
        <div class="grid-container">
            <article class="padding-content text-center">
                <img src="../images/registration/icons/icon-speaker.svg" class="icon-speaker animate-icon" />
                <h2 class="head-topic fade">@lang('event_registration.speakers.title')</h2>
                <article class="speakers-show fade">
                    <div class="grid-x">
                        <div class="grid-x cell small-12 medium-6 large-3">
                            <img src="../images/registration/speakers/speaker-01.jpg" />
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
                        <div class="grid-x cell small-12 medium-6 large-3">
                            <img src="../images/registration/speakers/speaker-02.jpg" />
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
                        <div class="grid-x cell small-12 medium-6 large-3 align-center">
                            <img src="../images/registration/speakers/speaker-03.jpg" />
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
                        <div class="grid-x cell small-12 medium-6 large-3">
                            <img src="../images/registration/speakers/speaker-04.jpg" />
                        </div>
                        <div class="grid-x cell small-12 medium-6 large-3">
                            <img src="../images/registration/speakers/speaker-05.jpg" />
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
                        <div class="grid-x cell small-12 medium-6 large-3">
                            <img src="../images/registration/speakers/speaker-06.jpg" />
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
                <img src="../images/registration/icons/icon-gallery.svg" class="icon-gallery animate-icon" />
                <h2 class="head-topic fade">@lang('event_registration.previous_event')</h2>
                <article class="gallery-show">
                    <div class="grid-x">
                        <div class="cell small-4">
                            <a href="../images/registration/previous-event/event-01.jpg" class="gallery-pic"
                                data-fancybox="previous-event" data-caption="">
                                <img src="../images/registration/previous-event/event-thumbs-01.jpg" alt="">
                            </a>
                        </div>
                        <div class="cell small-4">
                            <a href="../images/registration/previous-event/event-02.jpg" class="gallery-pic"
                                data-fancybox="previous-event" data-caption="">
                                <img src="../images/registration/previous-event/event-thumbs-02.jpg" alt="">
                            </a>
                        </div>
                        <div class="cell small-4">
                            <a href="../images/registration/previous-event/event-03.jpg" class="gallery-pic"
                                data-fancybox="previous-event" data-caption="">
                                <img src="../images/registration/previous-event/event-thumbs-03.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="grid-x">
                        <div class="cell small-12 xlarge-4">
                            <a href="../images/registration/previous-event/event-04.jpg" class="gallery-pic"
                                data-fancybox="previous-event" data-caption="">
                                <img src="../images/registration/previous-event/event-thumbs-04.jpg" alt="">
                            </a>
                        </div>
                        <div class="cell small-12 xlarge-8">
                            <a href="../images/registration/previous-event/event-06.jpg" class="gallery-pic"
                                data-fancybox="previous-event" data-caption="">
                                <img src="../images/registration/previous-event/event-thumbs-06.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="grid-x">
                        <div class="cell small-4">
                            <a href="../images/registration/previous-event/event-09.jpg" class="gallery-pic"
                                data-fancybox="previous-event" data-caption="">
                                <img src="../images/registration/previous-event/event-thumbs-09.jpg" alt="">
                            </a>
                        </div>
                        <div class="cell small-4">
                            <a href="../images/registration/previous-event/event-07.jpg" class="gallery-pic"
                                data-fancybox="previous-event" data-caption="">
                                <img src="../images/registration/previous-event/event-thumbs-07.jpg" alt="">
                            </a>
                        </div>
                        <div class="cell small-4">
                            <a href="../images/registration/previous-event/event-08.jpg" class="gallery-pic"
                                data-fancybox="previous-event" data-caption="">
                                <img src="../images/registration/previous-event/event-thumbs-08.jpg" alt="">
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
                <img src="../images/registration/icons/icon-map.svg" class="icon-map animate-icon" />
                <h2 class="head-topic fade">@lang('event_registration.map')</h2>
                <ul class="tabs tabs-info fade" data-tabs id="tabs-map">
                    <li class="tabs-title is-active"><a href="#map-google">@lang('event_registration.google_map')</a>
                    </li>
                </ul>
                <div class="tabs-content tabs-info-con" data-tabs-content="tabs-map">
                    <div class="tabs-panel is-active tabs-googlemap" id="map-google">
                        <div class="responsive-embed">
                            <iframe src="https://snazzymaps.com/embed/183918" width="100%" height="600px"
                                style="border:none;"></iframe>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</section>