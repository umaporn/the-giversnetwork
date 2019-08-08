@extends('admin.layouts.app')

@section('page-title', __('events_admin.page_title.edit'))
@section('page-description', __('events_admin.page_description.edit'))

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
                                        <h2 class="cell shrink user-head">@lang('events_admin.page_title.edit')</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <form action="{{ route('admin.events.update', [ 'event' => $event->id ]) }}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                          class="tinyMCE-form"
                                    >
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('events_admin.title_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="title_thai" name="title_thai" class="form-fill"
                                                       value="{{ $event->title_thai }}">
                                                <p id="title_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('events_admin.title_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="title_english" name="title_english" class="form-fill"
                                                       value="{{ $event->title_english }}">
                                                <p id="title_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="des" class="form-label">@lang('events_admin.description_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="content-tinymce-thai" name="description_thai" class="form-fill" rows="3">
                                                    {{ $event->description_thai }}
                                                </textarea>
                                                <p id="content-tinymce-thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="des" class="form-label">@lang('events_admin.description_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="content-tinymce-english" name="description_english" class="form-fill" rows="3">
                                                    {{ $event->description_english }}
                                                </textarea>
                                                <p id="content-tinymce-english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="location" class="form-label">@lang('events_admin.location_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="location_thai" name="location_thai" class="form-fill"
                                                       value="{{ $event->location_thai }}"
                                                >
                                                <p id="location_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="location" class="form-label">@lang('events_admin.location_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="location_english" name="location_english" class="form-fill"
                                                       value="{{ $event->location_english }}">
                                                <p id="location_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="host" class="form-label">@lang('events_admin.host_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="host_thai" name="host_thai" class="form-fill"
                                                       value="{{ $event->host_thai }}">
                                                <p id="host_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="host" class="form-label">@lang('events_admin.host_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="host_english" name="host_english" class="form-fill"
                                                        value="{{ $event->host_english }}">
                                                <p id="host_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="link" class="form-label">@lang('events_admin.link')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="link" name="link" class="form-fill"
                                                       value="{{ $event->link }}">
                                                <p id="link-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label class="form-label">@lang('events_admin.date_time')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <div class="form-date">
                                                    <input type="text" id="event_date" name="event_date" class="form-fill"
                                                            value="{{ $event->event_date }}">
                                                    <p class="form-flex show-text">@lang('events_admin.event_date_condition')</p>
                                                    <p id="start_date-help-text" class="alert help-text help-text hide"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label class="form-label">@lang('events_admin.start_date')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <div class="form-date">
                                                    <input type="date" id="start_date" class="form-fill" name="start_date" value="{{ $event->start_date }}">
                                                    <p id="start_date-help-text" class="alert help-text help-text hide"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label class="form-label">@lang('events_admin.end_date')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <div class="form-date">
                                                    <input type="date" id="end_date" class="form-fill" name="end_date" value="{{ $event->end_date }}">
                                                    <p class="form-flex show-text">@lang('events_admin.end_date_condition')</p>
                                                    <p id="end_date-help-text" class="alert help-text help-text hide"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="imageProfile" class="form-label">@lang('events_admin.image')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                @if($event->image_path)
                                                    <div class="padding-bottom-1">
                                                        <img src="{{ Storage::url($event->image_path) }}" width="200" alt="@lang('events_admin.image')">
                                                    </div>
                                                @endif
                                                <div class="form-file-image">
                                                    <div class="form-file">
                                                        <input type="file" class="form-fileupload" id="image_path" name="image_path[]"
                                                               data-maxfile="5,120"/>
                                                        <div class="form-file-style">
                                                            <div class="form-flex btn-blue">@lang('events_admin.browse')</div>
                                                            <p class="form-flex show-text">@lang('events_admin.image_condition')</p>
                                                        </div>
                                                        <p id="image_path-help-text" class="alert help-text help-text hide"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label class="form-label">@lang('events_admin.publish')</label>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="status" type="checkbox" name="status" {{ $event->status === 'public' ? 'checked' : '' }}>
                                                <label for="approve">@lang('events_admin.publish_events')</label>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-offset-2 large-9">
                                                <input type="hidden" name="fk_user_id" value="{{ Auth::user()->id }}">
                                                <button class="btn-green btn-long">@lang('events_admin.edit_events')</button>
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