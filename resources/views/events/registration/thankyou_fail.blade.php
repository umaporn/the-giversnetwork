@extends('layouts.app')

@section('page-title', __('event_registration.page_title.index'))
@section('page-description', __('event_registration.page_description.index'))

@section('facebook_pixel')
    @include('events.registration.facebook_pixel')
@endsection

<div class="grid-container">
    <div class="grid-x">
        <div class="cell small-12 large-8 large-offset-2 ty-box">
            <section class="ty-head">
                <img src="{{ asset('images/registration/thankyou/head-thankyou.png') }}" alt="">
            </section>
            <article class="ty-message">
                <h3 class="ty-text">
                Fail
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
