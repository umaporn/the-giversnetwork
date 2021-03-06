@extends('layouts.app')

@section('page-title', __('organization.page_title.detail', [
            'organization_title' => $data['name'],
        ]))
@section('page-description', __('organization.page_description.detail', [
            'organization_title' => $data['name'],
        ]))

@section('og-title', __('organization.page_title.detail', [
            'organization_title' => $data['name'],
        ]))
@section('og-url', url()->current())
@section('og-description', $data['title'])
@section('og-image', $data['image_path'])

@section('content')
    <section class="organization profile">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell small-12 org-profile">
                <figure class="org-profile-image">
                    <img src="{{ $data['image_path'] ? $data['image_path'] : asset( config('images.home.profile.user_profile') ) }}"
                         alt="{{ $data['name'] }}">
                </figure>
                <h2 class="topic-light">{{ $data['name'] }}</h2>
            </div>
        </div>
        <div class="grid-x padding-content">
            <div class="cell auto">
                <div class="grid-x">
                    <div class="cell small-12 large-4 xxlarge-3 show-for-large">
                        <ul class="org-menu">
                            <li><a href="#" class="is-active">@lang('organization.organization_profile')</a></li>
                        </ul>
                    </div>
                    <div class="cell small-12 large-8 xxlarge-9 org-content">
                        <div class="grid-x org-form-space">
                            <div class="cell small-12">
                                <article class="org-detail">
                                    <h3 class="org-topic">@lang('organization.category')</h3>
                                    <p>{{ $data['category_title'] }}</p>
                                </article>
                            </div>
                        </div>
                        <div class="grid-x org-form-space">
                            <h2 class="cell shrink org-head">@lang('organization.contact')</h2>
                            <div class="cell auto grid-x align-middle">
                                <div class="cell line auto"></div>
                                <div class="cell shrink">
                                    <span class="outline-dot float-right"><span class="dot"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="grid-x org-form-space">
                            @if($data['address'])
                                <div class="cell small-12">
                                    <article class="org-detail">
                                        <h3 class="org-topic">@lang('organization.address')</h3>
                                        <p>{!! $data['address'] !!}</p>
                                    </article>
                                </div>
                            @endif
                            @if($data['google_map_embed'])
                                <div class="cell small-12">
                                    <article class="org-detail">
                                        <h3 class="org-topic">@lang('organization.google_map_embed')</h3>
                                    </article>
                                    <div>
                                        <iframe src="{{ $data['google_map_embed'] }}" width="500" height="350" frameborder="0" class="border-none" allowfullscreen></iframe>
                                    </div>
                                </div>
                            @endif
                            @if($data['phone_number'])
                                <div class="cell small-12">
                                    <article class="org-detail">
                                        <h3 class="org-topic">@lang('organization.phone')</h3>
                                        <p><a href="tel:{{ $data['phone_number'] }}">{{ $data['phone_number'] }}</a></p>
                                    </article>
                                </div>
                            @endif
                            @if($data['email'])
                                <div class="cell small-12">
                                    <article class="org-detail">
                                        <h3 class="org-topic">@lang('organization.email')</h3>
                                        <p><a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></p>
                                    </article>
                                </div>
                            @endif
                            @if($data['website'])
                                <div class="cell small-12">
                                    <article class="org-detail">
                                        <h3 class="org-topic">@lang('organization.website')</h3>
                                        <p>
                                            <a href="{{ $data['website'] }}" target="_blank">
                                                {{ $data['website'] }}
                                            </a>
                                        </p>
                                    </article>
                                </div>
                            @endif
                            <div class="no-bullet float-right">
                                <article class="org-detail">
                                    <h3 class="org-topic">@lang('organization.social_media')</h3>
                                </article>
                                @if($data['facebook'])
                                    <a href="{{ $data['facebook'] }}" target="_blank">
                                        <i class="fab fa-facebook-square fa-2x"></i>
                                    </a>
                                @endif
                                @if($data['twitter'])
                                    <a href="{{ $data['twitter'] }}" target="_blank">
                                        <i class="fab fa-twitter-square fa-2x"></i>
                                    </a>
                                @endif
                                @if($data['youtube'])
                                    <a href="{{ $data['youtube'] }}" target="_blank">
                                        <i class="fab fa-youtube-square fa-2x"></i>
                                    </a>
                                @endif
                                @if($data['instagram'])
                                    <a href="{{ $data['instagram'] }}" target="_blank">
                                        <i class="fab fa-instagram fa-2x"></i>
                                    </a>
                                @endif
                                @if($data['linked_in'])
                                    <a href="{{ $data['linked_in'] }}" target="_blank">
                                        <i class="fab fa-linkedin fa-2x"></i>
                                    </a>
                                @endif
                            </div>
                            @if($data['content'])
                                <div class="cell small-12 padding-top-1">
                                    <article class="org-detail">
                                        <h3 class="org-topic">@lang('organization.about') {{ $data['name'] }}</h3>
                                    </article>
                                    <div class="detail-text">
                                        {!! $data['content'] !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection