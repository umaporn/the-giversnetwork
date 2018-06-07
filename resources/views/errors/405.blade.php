@extends('layouts.app')

@section('page-title', __('error.405.page_title'))
@section('page-description', __('error.405.page_description'))

@section('content')
    <p class="alert">@lang('error.405.message')</p>
@endsection
