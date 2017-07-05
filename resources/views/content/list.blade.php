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
        <div class="medium-9 columns">
            <div class="content-list">
                <div class="row small-up-1 medium-up-2">
                    <div class="column">
                        <div class="card-label">
                            <span class="label"><a href="#">Corporate News</a></span>
                        </div>
                        <div class="card">
                            <a href="#">
                                <img src="{{ asset('/images/list-item.png') }}" alt="">
                                <div class="card-section">
                                    <div class="card-date">5th July</div>
                                    <article class="card-article">
                                        <h1 class="card-title">This is content title</h1>
                                        <p class="card-description">Lorem ipsum dolor sit amet, consectetur
                                                                    adipisicing elit. Recusandae facere, ipsam quae
                                                                    sit, eaque perferendis commodi!...
                                        </p>
                                    </article>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="medium-3 columns">
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