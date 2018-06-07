@extends('layouts.app')

@section('page-title', __('error.404.page_title'))
@section('page-description', __('error.404.page_description'))

@section('content')
    <p class="alert">@lang('error.404.message')</p>
    <a href="{{ route('home.index') }}">@lang('home.return')</a>
@endsection