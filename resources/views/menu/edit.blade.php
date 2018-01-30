@extends('layouts.app')

@section('page-title', __('menu.page_title.edit'))
@section('page-description', __('menu.page_description.edit'))
@section('view-id', 'EDIT-MENU-001')

@section('content')
    <div class="content-box">
        <form class="submission-form" method="POST" action="{{ route('menu.update') }}" enctype="">
            {{ csrf_field() }}
            <div class="grid-x">
                <div class="small-2">
                    <label for="key" class="text-left middle">@lang('menu.key'):</label>
                </div>
                <div class="small-10">
                    <input type="text" id="key" name="key" value="{{ $keyInput }}" disabled>
                </div>
            </div>

            <div class="grid-x">
                <div class="small-2">
                    <label for="value" class="text-left middle">@lang('menu.value'):</label>
                </div>
                <div class="small-10">
                    <input type="text" id="value" name="value" value="{{ $value }}">
                </div>
            </div>

            <div class="blank"></div>

            <div class="grid-x">
                <div class="cell">
                    <button type="submit" class="button">@lang('button.update')</button>
                    <a href="{{ url()->previous() }}" class="button">@lang('button.back')</a>
                    <input type="hidden" id="key" name="key" value="{{ $keyInput }}">
                    <input type="hidden" id="language" name="language" value="{{App::getLocale()}}">
                    <input type="hidden" id="key" name="key" value="{{ $keyInput }}">
                </div>
            </div>
        </form>
    </div>
@endsection
