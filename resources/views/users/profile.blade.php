@extends('layouts.app')

@section('page-title', __('user.page_title.profile'))
@section('page-description', __('user.page_description.profile'))
@section('page-icon', 'edit-user-icon')

@section('content')

    @if( $user['isLocalUser'] )
        <div class="grid-x align-right">
            <form class="submission-form" method="GET" action="{{ route('user.resetPassword') }}">
                <button class="button" type="submit">@lang('passwords.request_button')</button>
            </form>
        </div>
    @endif

    <form class="submission-form" method="POST" action="{{ route('user.updateProfile') }}">

        <label>
            @lang('user.avatar'):
            <img src="{{ $user['avatar'] }}">
            <input type="file" name="avatar" id="avatar">
        </label>
        <p id="avatar-help-text" class="alert help-text {{ $errors->has('avatar') ? '' : 'hide' }}">
            {{ $errors->has('avatar') ? $errors->first('avatar') : '' }}
        </p>

        <label>
            @lang('user.firstName'):
            <input type="text" name="firstName" id="firstName" value="{{ $user['firstName'] }}">
        </label>
        <p id="firstName-help-text" class="alert help-text {{ $errors->has('firstName') ? '' : 'hide' }}">
            {{ $errors->has('firstName') ? $errors->first('firstName') : '' }}
        </p>

        <label>
            @lang('user.lastName'):
            <input type="text" name="lastName" id="lastName" value="{{ $user['lastName'] }}">
        </label>
        <p id="lastName-help-text" class="alert help-text {{ $errors->has('lastName') ? '' : 'hide' }}">
            {{ $errors->has('lastName') ? $errors->first('lastName') : '' }}
        </p>

        <label>
            @lang('user.middleName'):
            <input type="text" name="middleName" id="middleName" value="{{ $user['middleName'] }}">
        </label>
        <p id="middleName-help-text" class="alert help-text {{ $errors->has('middleName') ? '' : 'hide' }}">
            {{ $errors->has('middleName') ? $errors->first('middleName') : '' }}
        </p>

        <label>
            @lang('user.mobile'):
            <input type="text" name="mobile" id="mobile" value="{{ $user['mobile'] }}">
        </label>
        <p id="mobile-help-text" class="alert help-text {{ $errors->has('mobile') ? '' : 'hide' }}">
            {{ $errors->has('mobile') ? $errors->first('mobile') : '' }}
        </p>

        <button type="submit" class="button">@lang('button.update')</button>
        <button type="reset" class="button">@lang('button.reset')</button>

    </form>

@endsection
