@extends('admin.layouts.app')

@section('page-title', __('events_admin.page_title.add'))
@section('page-description', __('events_admin.page_description.add'))

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('events_admin.page_title.index')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('admin.home.index') }}">@lang('admin.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('events_admin.page_title.index')
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
                                        <h2 class="cell shrink user-head">@lang('events_admin.page_title.add')</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <form action="{{ route('admin.events.store') }}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                          class="tinyMCE-form"
                                    >
                                        {{ csrf_field() }}
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('events_admin.title_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="title_thai" name="title_thai" class="form-fill">
                                                <p id="title_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('events_admin.title_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="title_english" name="title_english" class="form-fill">
                                                <p id="title_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="des" class="form-label">@lang('events_admin.description_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="content-tinymce-thai" name="description_thai" class="form-fill" rows="3"></textarea>
                                                <p id="content-tinymce-thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="des" class="form-label">@lang('events_admin.description_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="content-tinymce-english" name="description_english" class="form-fill" rows="3"></textarea>
                                                <p id="content-tinymce-english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="location" class="form-label">@lang('events_admin.location_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="location_thai" name="location_thai" class="form-fill">
                                                <p id="location_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="location" class="form-label">@lang('events_admin.location_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="location_english" name="location_english" class="form-fill">
                                                <p id="location_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="host" class="form-label">@lang('events_admin.host_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="host_english" name="host_english" class="form-fill">
                                                <p id="host_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="host" class="form-label">@lang('events_admin.host_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="host_thai" name="host_thai" class="form-fill">
                                                <p id="host_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="link" class="form-label">@lang('events_admin.link')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="link" name="link" class="form-fill">
                                                <p id="link-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label class="form-label">@lang('events_admin.date_time')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <div class="form-date">
                                                    <label for="date-start">@lang('events_admin.from')</label>
                                                    <input type="datetime-local" id="start_date" name="start_date" class="form-fill">
                                                    <p id="start_date-help-text" class="alert help-text help-text hide"></p>
                                                    <label for="date-end">@lang('events_admin.to')</label>
                                                    <input type="datetime-local" id="end_date" name="end_date" class="form-fill" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="imageProfile" class="form-label">@lang('events_admin.image')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <div class="form-file-image">
                                                    <div class="form-file">
                                                        <input type="file" class="form-fileupload" id="file-image"
                                                               multiple data-maxfile="5,120" />
                                                        <div class="form-file-style">
                                                            <div class="form-flex btn-blue">@lang('events_admin.browse')</div>
                                                            <p class="form-flex show-text">@lang('events_admin.image_condition')</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label class="form-label">@lang('events_admin.publish')</label>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="approve" type="checkbox">
                                                <label for="approve">@lang('events_admin.publish_events')</label>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-offset-2 large-9">
                                                <button class="btn-green btn-long">@lang('events_admin.add_events')</button>
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