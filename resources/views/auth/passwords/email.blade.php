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
        <div class="grid-x grid-padding-x">
            <div class="small-3 cell">
                <label for="email" class="text-right middle">@lang('user.email'):</label>
            </div>
            <div class="small-9 cell">
                <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus
                       class="{{ $errors->has('email') ? 'error' : '' }}"
                >
                <p id="email-help-text" class="alert help-text {{ $errors->has('email') ? '' : 'hide' }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                </p>
            </div>
        </div>
        <div class="grid-x grid-padding-x">
            <div class="small-3 cell">
            </div>
            <div class="small-9 cell">
                <button type="submit" class="button">@lang('passwords.request_button')</button>
            </div>
        </div>
    </form>
@endsection