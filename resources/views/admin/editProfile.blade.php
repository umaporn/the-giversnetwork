@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')
<section class="admin">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <h2 class="topic-light">Admin</h2>
        </div>
    </div>
    <nav class="grid-x padding-breadcrumbs">
        <div class="cell auto">
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> Admin
                </li>
            </ul>
        </div>
    </nav>
    <div class="grid-x padding-content">
        <div class="cell auto">
            <div class="grid-x">
                <div class="cell small-12 large-4 xxlarge-3 show-for-large">
                    @include('admin.menu_admin')
                </div>
                <div class="cell small-12 large-8 xxlarge-9">
                    @include('users.form_edit')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection