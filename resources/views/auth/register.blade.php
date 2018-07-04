@extends('layouts.app')

@section('page-title', __('register.page_title.index'))
@section('page-description', __('register.page_description.index'))

@section('content')

    <form class="recaptcha-form" method="POST" action="{{ route('submitRegister') }}">

        {{ csrf_field() }}

        <label>@lang('user.email'):
            <input type="email" id="email" name="email" required autofocus>
        </label>
        <p id="email-help-text" class="alert help-text hide"></p>

        <label>@lang('user.password'):
            <input type="password" id="password" name="password" required>
        </label>
        <p id="password-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.password_confirmation'):
            <input type="password" name="password_confirmation" required>
        </label>

        @captcha('{{ App::getLocale() }}')

        <button type="submit" class="button">@lang('register.register_button')</button>

    </form>
@endsection