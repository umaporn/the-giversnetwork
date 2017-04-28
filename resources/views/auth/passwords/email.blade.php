@extends('layouts.app')

@section('page-title', trans('passwords.page_title.email'))
@section('page-description', trans('passwords.page_description.email'))
@section('view-id', 'PASSWORD-RESET-001')

@section('content')
    <div id="status-help-text" class="success callout {{ session('status') ? '' : 'hide' }}">
        {{ session('status') ? session('status') : '' }}
    </div>
    <form id="password-reset-email-form" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="small-3 columns">
                <label for="email" class="text-right middle">{{ trans('user.email') }}:</label>
            </div>
            <div class="small-9 columns">
                <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus
                       class="{{ $errors->has('email') ? 'error' : '' }}"
                       aria-describedly="email-help-text"
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
                <button type="submit" class="button">{{ trans('passwords.request_button') }}</button>
            </div>
        </div>
    </form>
@endsection