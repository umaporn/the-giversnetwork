@extends('layouts.app')

@section('page-title', __('user.page_title.profile'))
@section('page-description', __('user.page_description.profile'))
@section('view-id', 'USER-PROFILE-001')
@section('page-icon', 'edit-user-icon')

@section('content')

    <div class="grid-x grid-padding-x">
        <div class="auto cell">
            <p>@lang('user.email'):</p>
            <p>{{ $user->email }}</p>
        </div>
    </div>
    <div class="grid-x grid-padding-x">
        <div class="auto cell">
            <p>@lang('user.password'):</p>
            <p>********</p>
        </div>
        <div class="medium-auto cell">
            <a class="medium button" data-open="change-password">@lang('user.profile.change_password')</a>
        </div>
    </div>

    <div id="change-password" class="card reveal" data-reveal data-close-on-click="false">
        <div class="card-divider title">
            @lang('user.profile.change_password_title')
        </div>
        <div class="card-section">
            @include('users.change_password')
        </div>
        <button class="close-button" data-close aria-label="@lang('user.profile.close_button')" type="button">
            <span aria-hidden="true" title="@lang('user.profile.close_button')">&times;</span>
        </button>
    </div>
@endsection