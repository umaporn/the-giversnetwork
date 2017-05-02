@extends('layouts.app')

@section('page-title', __('error.403.page_title'))
@section('page-description', __('error.403.page_description'))
@section('view-id', 'ERROR-403')

@section('content')
    <p class="alert">@lang('error.403.message')</p>
@endsection
