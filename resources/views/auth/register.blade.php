@extends('layouts.app')

@section('page-title', __('register.page_title.index'))
@section('page-description', __('register.page_description.index'))
@section('view-id', 'REGISTER-001')

@section('content')
    <div class="success callout {{ session('status') ? '' : 'hide' }}">
        {{ session('status') ? session('status') : '' }}
    </div>
    <form class="submission-form" method="POST" action="{{ route('submitRegister') }}">

        {{ csrf_field() }}

        <label>@lang('user.email'):
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                   class="{{ $errors->has('email') ? 'error' : '' }}"
            >
        </label>
        <p id="email-help-text" class="alert help-text {{ $errors->has('email') ? '' : 'hide' }}">
            {{ $errors->has('email') ? $errors->first('email') : '' }}
        </p>

        <label>@lang('user.password'):
            <input type="password" id="password" name="password" required
                   class="{{ $errors->has('password') ? 'error' : '' }}"
            >
        </label>
        <p id="password-help-text" class="alert help-text {{ $errors->has('password') ? '' : 'hide' }}">
            {{ $errors->has('password') ? $errors->first('password') : '' }}
        </p>

        <label>
            @lang('user.password_confirmation'):
            <input type="password" name="password_confirmation" required
                   class="{{ $errors->has('password_confirmation') ? 'error' : '' }}"
            >
        </label>

        <button type="submit" class="button">@lang('register.register_button')</button>

    </form>
@endsection