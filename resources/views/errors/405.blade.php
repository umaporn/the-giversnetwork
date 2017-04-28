@extends('layouts.app')

@section('page-title', trans('error.405.page_title'))
@section('page-description', trans('error.405.page_description'))
@section('view-id', 'ERROR-405')

@section('content')
    <p class="alert">{{ trans('error.405.message')}}</p>
@endsection
