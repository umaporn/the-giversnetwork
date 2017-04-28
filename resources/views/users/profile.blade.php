@extends('layouts.app')

@section('page-title', trans('user.page_title.profile'))
@section('page-description', trans('user.page_description.profile'))
@section('view-id', 'USER-PROFILE-001')

@section('page-icon')
    <i class="edit-user-icon page-icon"></i>
@endsection

@section('content')

    <div class="row">
        <div class="small-3 columns">
            <p class="text-right">{{ trans('user.email') }}:</p>
        </div>
        <div class="small-9 columns">
            <p>{{ $user->email }}</p>
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <p class="text-right">{{ trans('user.password') }}:</p>
        </div>
        <div class="small-6 columns">
            <p>********</p>
        </div>
        <div class="small-3 columns">
            <a class="medium button" data-open="change-password">{{ trans('user.profile.change_password') }}</a>
        </div>
    </div>

    <div id="change-password" class="card tiny reveal" data-reveal data-close-on-click="false">
        <div class="card-divider">
            {{ trans('user.profile.change_password_title') }}
        </div>
        <div class="card-section">
            @include('users.change_password')
        </div>
        <button class="close-button" data-close aria-label="{{ trans('user.profile.close_button') }}" type="button">
            <span aria-hidden="true" title="{{ trans('user.profile.close_button') }}">&times;</span>
        </button>
    </div>
@endsection