@extends('layouts.app')

@section('page-title', __('error.503.page_title'))
@section('page-description', __('error.503.page_description'))
@section('view-id', 'ERROR-503')

@section('content')
    <p class="alert">@lang('error.503.message')</p>
    @if( $exception->getMessage() )
        <p><strong>@lang('error.503.reason'):</strong> {{ $exception->getMessage() }}</p>
    @endif
    @if( $exception->willBeAvailableAt )
        <p class="alert">@lang('error.503.retry_after', [ 'beginTime' => $exception->willBeAvailableAt ])</p>
    @endif
@endsection
