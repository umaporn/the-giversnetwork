@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('view-id', 'HOME-001')
@section('page-icon', 'fi-home')

@section('content')
    @lang('home.welcome')
@endsection

