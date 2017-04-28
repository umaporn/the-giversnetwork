@extends('layouts.app')

@section('page-title', trans('error.404.page_title'))
@section('page-description', trans('error.404.page_description'))
@section('view-id', 'ERROR-404')

@section('content')
    <p class="alert">{{ trans('error.404.message')}}</p>
    <a href="{{ route('home.index') }}">{{ trans('home.return') }}</a>
@endsection