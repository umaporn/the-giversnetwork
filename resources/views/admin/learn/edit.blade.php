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
                                    <form action="{{ route('admin.learn.update', ['learn' => $learn->id ]) }}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                          class="submission-form"
                                    >
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="learn_id" class="form-label">@lang('learn_admin.learn_id')</label>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                {{ $learn->id }}
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="title_thai" class="form-label">@lang('learn_admin.title_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text"
                                                       id="title_thai"
                                                       class="form-fill"
                                                       name="title_thai"
                                                       value="{{ $learn->title_thai }}"
                                                >
                                                <p id="title_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('learn_admin.title_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text"
                                                       id="title_english"
                                                       class="form-fill"
                                                       name="title_english"
                                                       value="{{ $learn->title_english }}"
                                                >
                                                <p id="title_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="description_thai" class="form-label">@lang('learn_admin.description_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="description_thai" class="form-fill" name="description_thai" rows="3">
                                                    {{ $learn->description_thai }}
                                                </textarea>
                                                <p id="description_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="description_english" class="form-label">@lang('learn_admin.description_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="description_english" class="form-fill" name="description_english" rows="3">{{ $learn->description_english }}</textarea>
                                                <p id="description_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="content_thai" class="form-label">@lang('learn_admin.content_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="tinymce-content-thai" class="form-fill" name="content_thai" rows="3">{{ $learn->content_thai }}</textarea>
                                                <input type="hidden" name="current_content" value="{{ $learn->content_thai }}"/>
                                                <p id="content_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="content_english" class="form-label">@lang('learn_admin.content_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="tinymce-content-english" class="form-fill tinyMCE-form" name="content_english" rows="3">{{ $learn->content_english }}</textarea>
                                                <input type="hidden" name="current_content" value="{{ $learn->content_english }}"/>
                                                <p id="content_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="image" class="form-label">@lang('learn_admin.image')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                @if($learn->file_path)
                                                    <div class="padding-bottom-1">
                                                        <img src="{{ Storage::url($learn->file_path) }}" width="200" alt="@lang('learn_admin.image')">
                                                    </div>
                                                @endif
                                                <div class="form-file-image">
                                                    <div class="form-file">
                                                        <input type="file" class="form-fileupload" id="image_path" name="image_path"
                                                               data-maxfile="5,120"/>
                                                        <div class="form-file-style">
                                                            <div class="form-flex btn-blue">@lang('learn_admin.browse')</div>
                                                            <p class="form-flex show-text">@lang('learn_admin.image_condition')</p>
                                                        </div>
                                                        <p id="file_path-help-text" class="alert help-text help-text hide"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <p class="form-label form-p">@lang('learn_admin.publish')</p>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="status" type="checkbox" name="status" {{ $learn->status === 'public' ? 'checked' : '' }}>
                                                <label for="status">@lang('learn_admin.publish_post')</label>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <p class="form-label form-p">@lang('learn_admin.highlight')</p>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="pinned" type="checkbox" name="highlight_status" {{ $learn->highlight_status === 'pinned' ? 'checked' : '' }}>
                                                <label for="pinned">@lang('learn_admin.pin_to_highlight')</label>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-offset-2 large-9">
                                                <button class="btn-green btn-long">@lang('learn_admin.edit_learn')</button>
                                            </div>
                                        </div>
                                    </form>

                                    {{-- File upload form for TinyMCE Editor --}}
                                    <form id="tinymce-uploadform" action="{{ route('admin.image.upload') }}">
                                        {{ csrf_field() }}
                                        <input id="tinymce-uploadfile" type="file" name="image"/>
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