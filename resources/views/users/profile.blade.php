@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell small-12 user-profile">
                <figure class="user-profile-image">
                    @if($user[0]->image_path)
                        <img src="{{ Storage::url($user[0]->image_path) }}" width="200" alt="@lang('avatar')">
                    @else
                        <img src="{{ asset(config('images.home.profile.user_profile' )) }}" alt="">
                    @endif
                </figure>
                <h2 class="topic-light">{{ $user[0]->username }}</h2>
            </div>
        </div>
        <div class="grid-x padding-content">
            <div class="cell auto">
                <div class="grid-x">
                    <div class="cell small-12 large-4 xxlarge-3 show-for-large">
                        <ul class="user-menu">
                            <li><a href="#" class="is-active">@lang('user.page_title.profile')</a></li>
                        </ul>
                    </div>
                    <div class="cell small-12 large-8 xxlarge-9 user-content">
                        <div class="grid-x user-form-space">
                            <h2 class="cell shrink user-head">@lang('user.profile')</h2>
                            <div class="cell auto grid-x align-middle">
                                <div class="cell line auto"></div>
                                <div class="cell shrink">
                                    <span class="outline-dot float-right"><span class="dot"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="grid-x user-form-space">
                            <div class="cell small-12">
                                <article class="user-detail">
                                    <h3 class="user-topic">@lang('user.organization')</h3>
                                    <p><a href="#">{{ $user[0]->organization_name }}</a></p>
                                </article>
                            </div>
                            <div class="cell small-12">
                                <article class="user-detail">
                                    <h3 class="user-topic">@lang('user.interest_in')</h3>
                                    <ul class="user-interested">
                                        @foreach( $userInterestInList as $userInterestInItem )
                                            <li>
                                                <div class="btn-blue">{{$userInterestInItem['interest_title']}}</div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </article>
                            </div>
                        </div>
                        <div class="grid-x user-form-space">
                            <h2 class="cell shrink user-head">@lang('user.contact')</h2>
                            <div class="cell auto grid-x align-middle">
                                <div class="cell line auto"></div>
                                <div class="cell shrink">
                                    <span class="outline-dot float-right"><span class="dot"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="grid-x user-form-space">
                            <div class="cell small-12">
                                <article class="user-detail">
                                    <h3 class="user-topic">@lang('user.address')</h3>
                                    <p>{{ $user[0]->address }}</p>
                                </article>
                            </div>
                            <div class="cell small-12">
                                <article class="user-detail">
                                    <h3 class="user-topic">@lang('user.phone_number')</h3>
                                    <p>
                                        <a href="tel:{{ $user[0]->phone_number }}">
                                            {{ $user[0]->phone_number }}
                                        </a>
                                    </p>
                                </article>
                            </div>
                            <div class="cell small-12">
                                <article class="user-detail">
                                    <h3 class="user-topic">@lang('user.email')</h3>
                                    <p><a href="mailto:{{ $user[0]->email }}">{{ $user[0]->email }}</a></p>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection