<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('page-description')">

    <title>@yield('page-title') - {{ config( 'app.name' ) }}</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken'       => csrf_token(),
            'languageCodes'   => config('app.language_codes'),
            'defaultLanguage' => Utility::getDefaultLanguageCode(),
            'currentLanguage' => App::getLocale(),
        ]) !!};
    </script>
</head>
<body>

@include('layouts.header')
@include('layouts.content')
@include('layouts.footer')

@include('message_boxes.result')
@include('message_boxes.confirmation')

<script src="{{ mix('/js/app.js') }}"></script>
<script src="{{ mix('/js/all.js') }}"></script>

</body>
</html>
