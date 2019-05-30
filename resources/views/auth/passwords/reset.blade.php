@extends('layouts.app')
@section('page-title',__('passwords.page_title.reset_password'))
@section('content')
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-center padding-top-1">
            <div class="callout cell medium-6 xlarge-5 radius">
                <h3>@lang('passwords.password_reset_form.heading')</h3>
                <b>@lang('passwords.password_reset_form.sub_heading')</b>
                <form class="submission-form margin-top-2" method="POST" action="{{route('password.change')}}">

                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <label>
                        @lang('passwords.password_reset_form.email')
                        <input type="email" name="email" id="email" value="umaporn.don@gmail.com" required>
                    </label>
                    <p id="email-help-text" class="alert help-text"></p>

                    <label>
                        @lang('passwords.password_reset_form.new_password')
                        <input type="password" name="password" id="password" value="umaporn1234" required>
                    </label>
                    <p id="password-help-text" class="alert help-text"></p>

                    <label>
                        @lang('passwords.password_reset_form.new_password_confirmation')
                        <input type="password" name="password_confirmation" value="umaporn1234" required>
                    </label>

                    <p class="text-center margin-top-3">
                        <button type="submit" class="button hollow">@lang('passwords.password_reset_form.button')</button>
                    </p>

                </form>
            </div>
        </div>
    </div>

@endsection
