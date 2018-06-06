@extends('layouts.app')

@section('page-title', __('login.page_title.index'))
@section('page-description', __('login.page_description.index'))

@section('content')
    <form class="submission-form" method="POST" action="{{ route('submitLogin') }}">
        {{ csrf_field() }}

        <label for="email">@lang('user.email'):</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus>
        <p id="email-help-text" class="alert help-text {{ $errors->has('email') ? '' : 'hide' }}">
            {{ $errors->has('email') ? $errors->first('email') : '' }}
        </p>

        <label for="password">@lang('user.password'):</label>
        <input type="password" id="password" name="password" required>
        <p id="password-help-text" class="alert help-text {{ $errors->has('password') ? '' : 'hide' }}">
            {{ $errors->has('password') ? $errors->first('password') : '' }}
        </p>

        <div class="button-group">
            <button type="submit" class="button">@lang('login.login_button')</button>
            <a class="hollow button" href="{{ route('password.request') }}">@lang('login.forgot_password')</a>
        </div>
    </form>
@endsection
