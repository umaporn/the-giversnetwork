@extends('layouts.app')

@section('page-title', __('passwords.page_title.email'))
@section('page-description', __('passwords.page_description.email'))

@section('content')

    <div class="success callout {{ session('status') ? '' : 'hide' }}">
        {{ session('status') ? session('status') : '' }}
    </div>

    <form class="submission-form" method="POST" action="{{ route('password.email') }}">

        {{ csrf_field() }}

        <label>@lang('user.email'):
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                   class="{{ $errors->has('email') ? 'error' : '' }}"
            >
        </label>
        <p id="email-help-text" class="alert help-text {{ $errors->has('email') ? '' : 'hide' }}">
            {{ $errors->has('email') ? $errors->first('email') : '' }}
        </p>

        <button type="submit" class="button">@lang('passwords.request_button')</button>

    </form>

@endsection