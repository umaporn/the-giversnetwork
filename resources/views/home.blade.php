@extends('layouts.app')

@section('page-title', trans('home.page_title.index'))
@section('page-description', trans('home.page_description.index'))
@section('view-id', 'HOME-001')

@section('content')
    {{ trans('home.welcome') }}
@endsection