<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('page-description')">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <meta property="og:url" content="@yield('og-url')"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="@yield('og-title')"/>
    <meta property="og:description" content="@yield('og-description')"/>
    <meta property="og:image" content="@yield('og-image')"/>

    <title>@yield('page-title') - {{ config( 'app.name' ) }}</title>

    @if( url()->current() === route('events.registration') || url()->current() === route('events.registration.thankyou') || url()->current() === route('events.registration.thankyouFail') )
        <link rel="stylesheet" href="{{ mix('/css/app_registration.css') }}">
        @yield('facebook_pixel')
    @else
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @endif

    <script>
		window.Laravel = {!! json_encode([
            'csrfToken'       => csrf_token(),
            'languageCodes'   => config('app.language_codes'),
            'defaultLanguage' => Utility::getDefaultLanguageCode(),
            'currentLanguage' => App::getLocale(),
        ]) !!};
    </script>

    @include('google_tag_manager.script')

</head>
<body>

@include('google_tag_manager.noscript')

@if( url()->current() === route('events.registration') || url()->current() === route('events.registration.thankyou') || url()->current() === route('events.registration.thankyouFail') )
    @yield('header_events_registration')
    @yield('content_events_registration')
    @yield('footer_events_registration')
@else
    @include('layouts.header')
    @include('layouts.content')
    @include('layouts.footer')
@endif

@include('message_boxes.result')
@include('message_boxes.confirmation')

<script src="{{ mix('/js/app.js') }}"></script>
<script src="{{ mix('/js/all.js') }}"></script>

</body>
</html>
