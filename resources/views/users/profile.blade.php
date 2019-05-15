@extends('layouts.app')

@section('page-title', __('user.page_title.profile'))
@section('page-description', __('user.page_description.profile'))
@section('page-icon', 'edit-user-icon')

@section('content')

    <form class="submission-form" method="POST" action="{{ route('user.updateProfile') }}">

        <label>
            @lang('user.avatar'):
            @if($user[0]->image_path)
                <img src="{{ $user[0]->image_path }}" width="200" alt="@lang('avatar')">
            @endif
            <input type="file" name="avatar" id="avatar">
        </label>
        <p id="avatar-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.firstName'):
            <input type="text" name="firstName" id="firstName" value="{{ $user[0]->firstname }}">
        </label>
        <p id="firstName-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.lastName'):
            <input type="text" name="lastName" id="lastName" value="{{ $user[0]->lastname }}">
        </label>
        <p id="lastName-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.mobile'):
            <input type="text" name="mobile" id="mobile" value="{{ $user[0]->phone_number }}">
        </label>
        <p id="mobile-help-text" class="alert help-text hide"></p>

        <button type="submit" class="button">@lang('button.update')</button>
        <button type="reset" class="button">@lang('button.reset')</button>

    </form>

@endsection
