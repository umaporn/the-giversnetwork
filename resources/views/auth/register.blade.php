@extends('layouts.app')

@section('page-title', __('register.page_title.index'))
@section('page-description', __('register.page_description.index'))
@section('view-id', 'REGISTER-001')

@section('content')
    <form class="submission-form" method="POST" action="{{ route('submitRegister') }}">
        {{ csrf_field() }}

        <label for="email">@lang('user.email'):</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus
               class="{{ $errors->has('email') ? 'error' : '' }}"
        >
        <p id="email-help-text" class="alert help-text {{ $errors->has('email') ? '' : 'hide' }}">
            {{ $errors->has('email') ? $errors->first('email') : '' }}
        </p>

        <label for="password">@lang('user.password'):</label>
        <input type="password" id="password" name="password" required
               class="{{ $errors->has('password') ? 'error' : '' }}"
        >
        <p id="password-help-text" class="alert help-text {{ $errors->has('password') ? '' : 'hide' }}">
            {{ $errors->has('password') ? $errors->first('password') : '' }}
        </p>

        <label for="password-confirm">
            @lang('user.password_confirmation'):
        </label>
        <input type="password" id="password-confirm" name="password_confirmation" required
               class="{{ $errors->has('password_confirmation') ? 'error' : '' }}"
        >
        <button type="submit" class="button">@lang('register.register_button')</button>
    </form>
@endsection