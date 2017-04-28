@extends('layouts.app')

@section('page-title', trans('error.500.page_title'))
@section('page-description', trans('error.500.page_description'))
@section('view-id', 'ERROR-500')

@section('content')
    <p class="alert">{{ $exception->getMessage() }}</p>
@endsection
