@extends('layouts.app')

@section('page-title', __('content.page_title.list'))
@section('page-description', __('content.page_description.list'))
@section('view-id', 'CONTENT-LIST-001')
@section('page-icon', 'fi-page')

@section('content')

    <div class="row column">
        <label>Choose category
            <select>
                <option value=""></option>
            </select>
        </label>
    </div>

    <div class="row">
        <div class="small-9 columns">
            <div class="content-list">
                <div class="row small-up-1 medium-up-2 large-up-3">
                    <div class="column">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('/images/list-item.png') }}" alt="">
                            </div>
                            <div class="card-divider">
                                This is a title
                            </div>
                            <div class="card-section">
                                <div>Jan, 19th 2017 - Category</div>
                                <p><strong>This is a short description about the post.</strong></p>
                                <a href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-3 columns">
            <div class="sidebar">
                <div class="widget">
                    <a href="#">Archive</a>
                    <hr>
                    <div>Jan, 19th 2017 - Category</div>
                    <p><strong>This is an event post title and needs some
                               level of truncation, say about 30 char.</strong>
                    </p>
                    <a href="#">Read more</a>
                    <hr>
                </div>
            </div>
        </div>
    </div>

@endsection