@extends('admin.layouts.app')

@section('page-title', __('learn_admin.page_title.edit'))
@section('page-description', __('learn_admin.page_description.edit'))

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('learn_admin.page_title.index')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('admin.home.index') }}">@lang('admin.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('learn_admin.page_title.index')
                    </li>
                </ul>
            </div>
        </nav>
        <div class="grid-x padding-content">
            <div class="cell auto">
                <div class="grid-x">
                    <div class="cell small-12 large-3 xxlarge-2 show-for-large">
                        @include('admin.layouts.side_menu')
                    </div>
                    <div class="cell small-12 large-9 xxlarge-10">
                        <article class="user-content">
                            <div class="grid-x">
                                <div class="cell small-12">
                                    <div class="grid-x user-form-space">
                                        <h2 class="cell shrink user-head">@lang('learn_admin.edit_learn')</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <form action="">
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="username" class="form-label">@lang('learn_admin.learn_id')</label>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                {{ $learn->id }}
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('learn_admin.title_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="topic" class="form-fill" value=" {{ $learn->title_thai }}">
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('learn_admin.title_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="topic" class="form-fill" value=" {{ $learn->title_english }}">
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="des" class="form-label">@lang('learn_admin.description_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="des" class="form-fill" rows="3">{{ $learn->description_thai }}</textarea>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="des" class="form-label">@lang('learn_admin.description_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="des" class="form-fill" rows="3">{{ $learn->description_english }}</textarea>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="image" class="form-label">@lang('learn_admin.image')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <div class="form-file">
                                                    <input type="file" class="form-fileupload" id="file-image"
                                                           data-maxfile="1024"/>
                                                    <div class="form-file-style">
                                                        <div class="form-flex btn-blue">@lang('learn_admin.browse')</div>
                                                        <p class="form-flex show-text">@lang('learn_admin.image_condition')</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <p class="form-label form-p">@lang('learn_admin.publish')</p>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="publish" type="checkbox">
                                                <label for="publish">@lang('learn_admin.publish_post')</label>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <p class="form-label form-p">@lang('learn_admin.highlight')</p>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="pinned" type="checkbox">
                                                <label for="pinned">@lang('learn_admin.pin_to_highlight')</label>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-offset-2 large-9">
                                                <button class="btn-green btn-long">@lang('learn_admin.edit_learn')</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection