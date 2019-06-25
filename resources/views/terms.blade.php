@extends('layouts.app')

@section('page-title', __('terms.page_title.index'))
@section('page-description', __('terms.page_description.index'))

@section('content')
    <section class="share-page">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="pri-sub-head">@lang('terms.title')</h2>
            </div>
        </div>
        <div class="grid-container padding-top-2">
            <div class="cell auto">
                <p>{!! __('terms.description') !!}</p>
                <h3>{!!  __('terms.content_agreement.title') !!}</h3>
                <ol start="1">
                    @foreach( __('terms.content_agreement.sub_content') as $content )
                        <li class="padding-bottom-1">{!! $content !!}</li>
                    @endforeach
                </ol>
                <h3>{!! __('terms.content_condition.title') !!}</h3>
                <p>{!! __('terms.content_condition.description') !!}</p>
                <ol start="1">
                    @foreach( __('terms.content_condition.sub_content') as $content )
                        <li class="padding-bottom-1">{!! $content !!}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>
@endsection