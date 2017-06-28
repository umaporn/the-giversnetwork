@extends('layouts.app')

@section('page-title', __('content.page_title.list'))
@section('page-description', __('content.page_description.list'))
@section('view-id', 'CONTENT-LIST-001')
@section('page-icon', 'fi-page')

@section('content')

    <div class="row">
        <div class="small-9 columns">
            MAIN
        </div>
        <div class="small-3 columns">
            SIDEBAR
        </div>
    </div>

@endsection