@extends('layouts.app')

@section('page-title', trans('error.403.page_title'))
@section('page-description', trans('error.403.page_description'))
@section('view-id', 'ERROR-403')

@section('content')
    <p class="alert">{{ trans('error.403.message')}}</p>
@endsection
