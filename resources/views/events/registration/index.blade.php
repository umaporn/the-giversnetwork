@extends('layouts.app')

@section('page-title', __('event_registration.page_title.index'))
@section('page-description', __('event_registration.page_description.index'))

@section('facebook_pixel')
    @include('events.registration.facebook_pixel')
@endsection

@section('header_events_registration')
    @include('events.registration.header')
@endsection

@section('content_events_registration')
    @include('events.registration.content')
@endsection

@section('footer_events_registration')
    @include('events.registration.footer')
@endsection