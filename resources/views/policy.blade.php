@extends('layouts.app')

@section('page-title', __('policy.page_title.index'))
@section('page-description', __('policy.page_description.index'))

@section('content')
    <section class="share-page">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="pri-sub-head">@lang('policy.title')</h2>
            </div>
        </div>
        <div class="grid-container padding-top-2">
            <div class="cell auto">
                <ol start="1">
                    @foreach( __('policy.content') as $content )
                        <li class="padding-bottom-1">
                            <b>{!! $content['title'] !!}</b>
                            @if( isset($content['detail']) )
                                <p>{!! $content['detail'] !!}</p>
                            @endif
                            @if( isset($content['sub_content']) )
                                @foreach( $content['sub_content'] as $sub_content )
                                    <ol class="no-bullet">
                                        <li>
                                            {!! $sub_content['id'] . ' ' . $sub_content['detail'] !!}
                                        </li>
                                    </ol>
                                @endforeach
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>
@endsection