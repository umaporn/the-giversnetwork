@extends('admin.layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')
    <h1>Admin Page</h1>
    <p>@lang('home.welcome')</p>
@endsection
