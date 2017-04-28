@extends('layouts.app')

@section('page-title', trans('login.page_title.index'))
@section('page-description', trans('login.page_description.index'))
@section('view-id', 'LOGIN-001')

@section('content')
    <form method="POST" action="{{ route('submitLogin') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="small-3 columns">
                <label for="email" class="text-right middle">{{ trans('user.email') }}:</label>
            </div>
            <div class="small-9 columns">
                <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus>
                <p id="email-help-text" class="alert help-text {{ $errors->has('email') ? '' : 'hide' }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="small-3 columns">
                <label for="password" class="text-right middle">{{ trans('user.password') }}:</label>
            </div>
            <div class="small-9 columns">
                <input type="password" id="password" name="password" required>
                <p id="password-help-text" class="alert help-text {{ $errors->has('password') ? '' : 'hide' }}">
                    {{ $errors->has('password') ? $errors->first('password') : '' }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="small-3 columns">
            </div>
            <div class="small-9 columns">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label>{{ trans('login.remember_me') }}</label>
            </div>
        </div>
        <div class="row">
            <div class="small-3 columns">
            </div>
            <div class="small-9 columns">
                <div class="button-group">
                    <button type="submit" class="button">{{ trans('login.login_button') }}</button>
                    <a class="hollow button" href="{{ route('password.request') }}">{{ trans('login.forgot_password') }}</a>
                </div>
            </div>
        </div>
    </form>
@endsection
