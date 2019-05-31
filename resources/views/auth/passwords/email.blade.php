@extends('layouts.app')

@section('page-title', __('passwords.page_title.email'))
@section('page-description', __('passwords.page_description.email'))

@section('content')

    <section class="user">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('passwords.page_title.email')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('passwords.page_title.email')
                    </li>
                </ul>
            </div>
        </nav>
        <div class="grid-x padding-content">
            <div class="cell small-12">
                <h2 class="topic-dark">@lang('passwords.topic')</h2>
                <form class="submission-form form-onerow" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="email" class="form-label">@lang('user.email')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <input type="email" id="email" name="email" required autofocus class="form-fill" value="">
                            <p id="email-help-text" class="alert help-text hide"></p>
                        </div>
                    </div>

{{--                    @captcha('{{ App::getLocale() }}')--}}

                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-offset-2 large-9">
                            <button type="submit" class="btn-green btn-long">@lang('button.ok')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection