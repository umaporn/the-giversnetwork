@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')
<section class="admin">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell small-12 user-profile">
            <figure class="user-profile-image">
                <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
            </figure>
            <h2 class="topic-light">Jacob Kim</h2>
        </div>
    </div>
    <div class="grid-x padding-content">
        <div class="cell auto">
            <div class="grid-x">
                <div class="cell small-12 large-4 xxlarge-3 show-for-large">
                    <ul class="user-menu">
                        <li><a href="#" class="is-active"> My Profile</a></li>
                    </ul>
                </div>
                <div class="cell small-12 large-8 xxlarge-9 user-content">
                    <div class="grid-x user-form-space">
                        <h2 class="cell shrink user-head">Profile</h2>
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
                                <h3 class="user-topic">Organization Name</h3>
                                <p><a href="#">TGN Company</a></p>
                            </article>
                        </div>
                        <div class="cell small-12">
                            <article class="user-detail">
                                <h3 class="user-topic">Interested</h3>
                                <ul class="user-interested">
                                    <li>
                                        <div class="btn-blue">Children</div>
                                    </li>
                                    <li>
                                        <div class="btn-blue">Foods</div>
                                    </li>
                                </ul>
                            </article>
                        </div>
                    </div>
                    <div class="grid-x user-form-space">
                        <h2 class="cell shrink user-head">Contact</h2>
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
                                <h3 class="user-topic">Address</h3>
                                <p>695 Sukhumvit 50, Prakanong Klongtoey, Bangkok 10260 Thailand</p>
                            </article>
                        </div>
                        <div class="cell small-12">
                            <article class="user-detail">
                                <h3 class="user-topic">Phone</h3>
                                <p><a href="tel:+6627429141">742-9141</a></p>
                            </article>
                        </div>
                        <div class="cell small-12">
                            <article class="user-detail">
                                <h3 class="user-topic">Email</h3>
                                <p><a href="mailto:pr@dtgo.com">pr@dtgo.com</a></p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection