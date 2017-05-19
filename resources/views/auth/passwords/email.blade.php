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
        <div class="row">
            <div class="small-3 columns">
                <label for="email" class="text-right middle">@lang('user.email'):</label>
            </div>
            <div class="small-9 columns">
                <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus
                       class="{{ $errors->has('email') ? 'error' : '' }}"
                >
                <p id="email-help-text" class="alert help-text {{ $errors->has('email') ? '' : 'hide' }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="small-3 columns">
            </div>
            <div class="small-9 columns">
                <button type="submit" class="button">@lang('passwords.request_button')</button>
            </div>
        </div>
    </form>
@endsection