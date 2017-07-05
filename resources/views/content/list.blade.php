@extends('layouts.app')

@section('page-title', __('content.page_title.list'))
@section('page-description', __('content.page_description.list'))
@section('view-id', 'CONTENT-LIST-001')
@section('page-icon', 'fi-page')

@section('content')

    <div class="row columns">
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
                                <img src="http://placehold.it/460x200/fcc066/fff">
                                <div class="card-section">
                                    <div class="card-date">5th July, 2017</div>
                                    <article class="card-article">
                                        <h1 class="card-title">This is an example of a content title for a post</h1>
                                        <p class="card-description">Lorem ipsum dolor sit amet, consectetur
                                                                    adipisicing elit. Recusandae facere, ipsam quae
                                                                    sit, eaque perferendis commodi!...
                                        </p>
                                    </article>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card-label">
                            <span class="label"><a href="#">Corporate News</a></span>
                        </div>
                        <div class="card">
                            <a href="#">
                                <img src="http://placehold.it/460x200/fcc066/fff">
                                <div class="card-section">
                                    <div class="card-date">5th July, 2017</div>
                                    <article class="card-article">
                                        <h1 class="card-title">This is an example of a content title for a post</h1>
                                        <p class="card-description">Lorem ipsum dolor sit amet, consectetur
                                                                    adipisicing elit. Recusandae facere, ipsam quae
                                                                    sit, eaque perferendis commodi!...
                                        </p>
                                    </article>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card-label">
                            <span class="label"><a href="#">Corporate News</a></span>
                        </div>
                        <div class="card">
                            <a href="#">
                                <img src="http://placehold.it/460x200/fcc066/fff">
                                <div class="card-section">
                                    <div class="card-date">5th July, 2017</div>
                                    <article class="card-article">
                                        <h1 class="card-title">This is an example of a content title for a post</h1>
                                        <p class="card-description">Lorem ipsum dolor sit amet, consectetur
                                                                    adipisicing elit. Recusandae facere, ipsam quae
                                                                    sit, eaque perferendis commodi!...
                                        </p>
                                    </article>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card-label">
                            <span class="label"><a href="#">Corporate News</a></span>
                        </div>
                        <div class="card">
                            <a href="#">
                                <img src="http://placehold.it/460x200/fcc066/fff">
                                <div class="card-section">
                                    <div class="card-date">5th July, 2017</div>
                                    <article class="card-article">
                                        <h1 class="card-title">This is an example of a content title for a post</h1>
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
            @include('content.sidebar')
        </div>
    </div>

@endsection