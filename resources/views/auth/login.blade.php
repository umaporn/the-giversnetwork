@extends('layouts.app')

@section('page-title', __('login.page_title.index'))
@section('page-description', __('login.page_description.index'))
@section('view-id', 'LOGIN-001')

@section('content')
    <form id="login-form" method="POST" action="{{ route('submitLogin') }}">
        {{ csrf_field() }}
        <div class="grid-x grid-padding-x">
            <div class="auto cell">
                <label for="email">@lang('user.email'):</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus>
                <p id="email-help-text" class="alert help-text {{ $errors->has('email') ? '' : 'hide' }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                </p>
            </div>
        </div>
        <div class="grid-x grid-padding-x">
            <div class="auto cell">
                <label for="password">@lang('user.password'):</label>
                <input type="password" id="password" name="password" required>
                <p id="password-help-text" class="alert help-text {{ $errors->has('password') ? '' : 'hide' }}">
                    {{ $errors->has('password') ? $errors->first('password') : '' }}
                </p>
            </div>
        </div>
        <div class="grid-x grid-padding-x">
            <div class="auto cell">
                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">@lang('login.remember_me')</label>
            </div>
        </div>
        <div class="grid-x grid-padding-x">
            <div class="auto cell">
                <div class="button-group">
                    <button type="submit" class="button">@lang('login.login_button')</button>
                    <a class="hollow button" href="{{ route('password.request') }}">@lang('login.forgot_password')</a>
                </div>
            </div>
        </div>
    </form>
@endsection
