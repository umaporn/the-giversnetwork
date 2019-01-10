@extends('layouts.app')

@section('page-title', __('error.400.page_title'))
@section('page-description', __('error.400.page_description'))

@section('content')
    <p class="alert">{{ $exception->getMessage() }}</p>
@endsection
