@extends('layouts.app')

@section('page-title', __('passwords.page_title.email'))
@section('page-description', __('passwords.page_description.email'))

@section('content')

    <form class="recaptcha-form" method="POST" action="{{ route('password.email') }}">

        {{ csrf_field() }}

        <label>@lang('user.email'):
            <input type="email" id="email" name="email" required autofocus>
        </label>
        <p id="email-help-text" class="alert help-text hide"></p>

        @captcha('{{ App::getLocale() }}')

        <button type="submit" class="button">@lang('passwords.request_button')</button>

    </form>

@endsection