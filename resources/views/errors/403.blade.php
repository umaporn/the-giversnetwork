@extends('layouts.app')

@section('page-title', __('error.403.page_title'))
@section('page-description', __('error.403.page_description'))

@section('content')
    <section class="padding-3">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h1 class="alert">@lang('error.403.page_title')</h1>
                <h2>@lang('error.403.message')</h2>
                <a href="{{ route('home.index') }}">@lang('home.return')</a>
            </div>
        </div>
    </section>
@endsection
