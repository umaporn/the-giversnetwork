@extends('admin.layouts.app')

@section('page-title', __('login_admin.page_title.index'))
@section('page-description', __('login_admin.page_description.index'))

@section('content')
    <form class="submission-form" method="POST" action="{{ route('admin.submitLogin') }}">
        {{ csrf_field() }}

        <label for="email">@lang('user.email'):</label>
        <input type="text" id="email" name="email" required autofocus value="admin@gmail.com">
        <p id="email-help-text" class="alert help-text hide"></p>

        <label for="password">@lang('user.password'):</label>
        <input type="password" id="password" name="password" required value="umaporn01">
        <p id="password-help-text" class="alert help-text hide"></p>

        {{--@captcha('{{ App::getLocale() }}')--}}

        <div class="button-group">
            <button type="submit" class="button">@lang('login_admin.login_button')</button>
            <a class="hollow button" href="{{ route('password.request') }}">@lang('login_admin.forgot_password')</a>
        </div>
    </form>
@endsection
