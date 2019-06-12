@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')
<section class="organization profile">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell small-12 org-profile">
            <figure class="org-profile-image">
                <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
            </figure>
            <h2 class="topic-light">Organization Name</h2>
        </div>
    </div>
    <div class="grid-x padding-content">
        <div class="cell auto">
            <div class="grid-x">
                <div class="cell small-12 large-4 xxlarge-3 show-for-large">
                    <ul class="org-menu">
                        <li><a href="#" class="is-active">Organization Profile</a></li>
                    </ul>
                </div>
                <div class="cell small-12 large-8 xxlarge-9 org-content">
                    <div class="grid-x org-form-space">
                        <div class="cell small-12">
                            <article class="org-detail">
                                <h3 class="org-topic">Category</h3>
                                <p>Category name</p>
                            </article>
                        </div>
                    </div>
                    <div class="grid-x org-form-space">
                        <h2 class="cell shrink org-head">Contact</h2>
                        <div class="cell auto grid-x align-middle">
                            <div class="cell line auto"></div>
                            <div class="cell shrink">
                                <span class="outline-dot float-right"><span class="dot"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="grid-x org-form-space">
                        <div class="cell small-12">
                            <article class="org-detail">
                                <h3 class="org-topic">Address</h3>
                                <p>695 Sukhumvit 50, Prakanong Klongtoey, Bangkok 10260 Thailand</p>
                            </article>
                        </div>
                        <div class="cell small-12">
                            <article class="org-detail">
                                <h3 class="org-topic">Phone</h3>
                                <p><a href="tel:+6627429141">742-9141</a></p>
                            </article>
                        </div>
                        <div class="cell small-12">
                            <article class="org-detail">
                                <h3 class="org-topic">Email</h3>
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