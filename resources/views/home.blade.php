@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

    <p>@lang('home.welcome') {{ $user['firstName'] }} {{ $user['middleName'] }} {{ $user['lastName'] }}.</p>

    @if( $user['avatar'] )
        <div><img src="{{ $user['avatar'] }}"></div>
    @endif

@endsection
