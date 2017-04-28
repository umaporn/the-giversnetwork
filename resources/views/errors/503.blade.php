@extends('layouts.app')

@section('page-title', trans('error.503.page_title'))
@section('page-description', trans('error.503.page_description'))
@section('view-id', 'ERROR-503')

@section('content')
    <p class="alert">{{ trans('error.503.message')}}</p>
@endsection
