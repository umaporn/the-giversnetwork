@extends('layouts.app')

@section('page-title', __('user.page_title.profile'))
@section('page-description', __('user.page_description.profile'))
@section('page-icon', 'edit-user-icon')

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('user.page_title.profile')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                    <li><a href="{{ route('user.getProfile') }}">@lang('user.page_title.profile')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('user.page_title.edit')
                    </li>
                </ul>
            </div>
        </nav>
        <div class="grid-x padding-content">
            <div class="cell auto">
                <div class="grid-x">
                    <div class="cell small-12 large-4 xxlarge-3 show-for-large">
                        @include('users.menu_user')
                    </div>
                    <div class="cell small-12 large-8 xxlarge-9">
                        @include('users.form_edit')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
