@extends('layouts.app')

@section('page-title', __('menu.page_title.edit'))
@section('page-description', __('menu.page_description.edit'))
@section('view-id', 'EDIT-MENU-001')

@section('content')
    <div class="row columns">
        <div class="content-box">
            <div class="expanded row">
                <div class="small-12 columns">
                    <form id="update-form" method="POST" action="{{ route('menu.update') }}" enctype="">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="small-3 columns">
                                <label for="key" class="text-right middle">@lang('menu.key'):</label>
                            </div>
                            <div class="small-9 columns">
                                <input type="text" id="key" name="key" value="{{ $keyInput }}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="small-3 columns">
                                <label for="value" class="text-right middle">@lang('menu.value'):</label>
                            </div>
                            <div class="small-9 columns">
                                <input type="text" id="value" name="value" value="{{ $value }}">
                            </div>
                        </div>

                        <div class="blank"></div>

                        <div class="row small-8">
                            <div class="small-3 columns">
                            </div>
                            <div class="small-9 columns">
                                <button type="submit" class="button">@lang('button.update')</button>
                                <a href="{{ url()->previous() }}" class="button">@lang('button.back')</a>
                                <input type="hidden" id="key" name="key" value="{{ $keyInput }}">
                                <input type="hidden" id="language" name="language" value="{{App::getLocale()}}">
                                <input type="hidden" id="key" name="key" value="{{ $keyInput }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
