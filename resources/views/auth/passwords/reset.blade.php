@extends('layouts.app')

@section('page-title', __('passwords.page_title.reset'))
@section('page-description', __('passwords.page_description.reset'))
@section('view-id', 'PASSWORD-RESET-002')

@section('content')
    <form method="POST" action="{{ route( 'password.change' ) }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="row">
            <div class="small-3 columns">
                <label for="email" class="text-right middle">@lang('user.email'):</label>
            </div>
            <div class="small-9 columns">
                <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus
                       class="{{ $errors->has('email') ? 'error' : '' }}"
                       aria-describedly="email-help-text"
                >
                <p id="email-help-text" class="alert help-text {{ $errors->has('email') ? '' : 'hide' }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="small-3 columns">
                <label for="password" class="text-right middle">@lang('user.password'):</label>
            </div>
            <div class="small-9 columns">
                <input type="password" id="password" name="password" required
                       class="{{ $errors->has('password') ? 'error' : '' }}"
                       aria-describedly="password-help-text"
                >
                <p id="password-help-text" class="alert help-text {{ $errors->has('password') ? '' : 'hide' }}">
                    {{ $errors->has('password') ? $errors->first('password') : '' }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="small-3 columns">
                <label for="password-confirm" class="text-right middle">@lang('user.password_confirmation'):</label>
            </div>
            <div class="small-9 columns">
                <input type="password" id="password-confirm" name="password_confirmation" required
                       class="{{ $errors->has('password_confirmation') ? 'error' : '' }}"
                       aria-describedly="password-confirm-help-text"
                >
            </div>
        </div>
        <div class="row">
            <div class="small-3 columns">
            </div>
            <div class="small-9 columns">
                <button type="submit" class="button">@lang('passwords.reset_button')</button>
            </div>
        </div>
    </form>
@endsection