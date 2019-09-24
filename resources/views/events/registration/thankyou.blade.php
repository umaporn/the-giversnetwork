@extends('layouts.app')

@section('page-title', __('event_registration.page_title.index'))
@section('page-description', __('event_registration.page_description.index'))

<div class="grid-container">
    <div class="grid-x">
        <div class="cell small-12 large-8 large-offset-2 ty-box">
            <section class="ty-head">
                <img src="{{ asset('images/registration/thankyou/head-thankyou.png') }}" alt="">
            </section>
            <article class="ty-message">
                <h3 class="ty-text">
                    Thank you for registering for WATS Forum Bangkok 2019. See you on 3 June at 13.00–17.00 at Bangkok Convention Centre, 22nd Floor, Centara Grand at CentralWorld.

                    ขอขอบคุณที่ให้ความสนใจงาน WATS Forum Bangkok 2019 การลงทะเบียนของท่านเสร็จสมบูรณ์ พบกันวันที่ 3 มิ.ย.นี้ เวลา 13.00 – 17.00 น. ณ ห้องบางกอกคอนเวนชั่นเซ็นเตอร์ ชั้น 22 โรงแรมเซ็นทารา แกรนด์ แอท เซ็นทรัลเวิลด์
                </h3>
                <span class="ty-line">
                    <img src="{{ asset('images/registration/thankyou/line-thankyou.svg') }}">
                </span>
                <div class="grid-x footer-logo padding-content align-center">
                    <div class="cell small-10 medium-12 align-self-top">
                        <ul class="no-bullet">
                            <li>
                                <img src="{{ asset('images/registration/partners/apc.png') }}" class="icon-mqdc" alt="">
                            </li>
                            <li>
                                <img src="{{ asset('images/registration/partners/typn.png') }}" class="icon-risc" alt="">
                            </li>
                            <li>
                                <img src="{{ asset('images/registration/partners/dhanin.png') }}" class="icon-risc" alt="">
                            </li>
                        </ul>
                    </div>
                </div>


            </article>
        </div>
    </div>
</div>

<script type="text/javascript">
	function goto(){
		window.location = 'https://www.mqdc.com';
	}
</script>
