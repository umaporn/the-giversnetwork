@extends('layouts.app')

@section('page-title', trans('register.page_title.index'))
@section('page-description', trans('register.page_description.index'))
@section('view-id', 'REGISTER-001')

@section('content')
    <form method="POST" action="{{ route('submitRegister') }}">
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
                <label for="password" class="text-right middle">{{ trans('user.password') }}:</label>
            </div>
            <div class="small-9 columns">
                <input type="password" id="password" name="password" required
                       class="{{ $errors->has('password') ? 'error' : '' }}"
                       aria-describedly="password-help-text"
                >
                <p id="password-help-text" class="alert help-text {{ $errors->has('password') ? '' : 'hide' }}">
                    {{ $errors->has('password') ? $errors->first('password') : '' }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="small-3 columns">
                <label for="password-confirm" class="text-right middle">
                    {{ trans('user.password_confirmation') }}:
                </label>
            </div>
            <div class="small-9 columns">
                <input type="password" id="password-confirm" name="password_confirmation" required
                       class="{{ $errors->has('password_confirmation') ? 'error' : '' }}"
                       aria-describedly="password-confirm-help-text"
                >
            </div>
        </div>
        <div class="row">
            <div class="small-3 columns">
            </div>
            <div class="small-9 columns">
                <button type="submit" class="button">{{ trans('register.register_button') }}</button>
            </div>
        </div>
    </form>
@endsection