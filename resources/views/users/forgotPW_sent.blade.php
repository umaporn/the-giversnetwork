@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')
<section class="user">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <h2 class="topic-light">Forgot Password</h2>
        </div>
    </div>
    <nav class="grid-x padding-breadcrumbs">
        <div class="cell auto">
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> Forgot Password
                </li>
            </ul>
        </div>
    </nav>
    <div class="grid-x padding-content">
        <div class="cell small-12">
            <h2 class="topic-dark">Check your email</h2>
            <p class="content-text">
                We've sent an email. Please check the link in the email to reset your password. <br>
                If you don't see the email, please check other places it might be, like your junk, spam, social or other folders.
            </p>
        </div>
    </div>
</section>
@endsection