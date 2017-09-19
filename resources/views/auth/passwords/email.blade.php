@extends('layouts.app')

@section('page-title', __('passwords.page_title.email'))
@section('page-description', __('passwords.page_description.email'))
@section('view-id', 'PASSWORD-RESET-001')

@section('content')
    <div class="success callout {{ session('status') ? '' : 'hide' }}">
        {{ session('status') ? session('status') : '' }}
    </div>
    <form id="password-reset-request-form" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <label for="email">@lang('user.email'):</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus
               class="{{ $errors->has('email') ? 'error' : '' }}"
        >
        <p id="email-help-text" class="alert help-text {{ $errors->has('email') ? '' : 'hide' }}">
            {{ $errors->has('email') ? $errors->first('email') : '' }}
        </p>

        <button type="submit" class="button">@lang('passwords.request_button')</button>
    </form>
@endsection