@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))

@section('content')
    <section class="share create">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('share.create_thread')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                    <li><a href="{{ route('share.index') }}">@lang('share.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('share.create_thread')
                    </li>
                </ul>
            </div>
        </nav>
        <div class="grid-x padding-content">
            <div class="cell small-12">
                <h2 class="topic-dark">@lang('share.create_thread_form.new_thread')</h2>

                <form action="{{ route('share.createThread') }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="recaptcha-form form-onerow"
                >
                    {{ csrf_field() }}

                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="topic" class="form-label">@lang('share.create_thread_form.topic')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <input type="text" id="title_english" name="title_english" class="form-fill" required>
                            <p id="title_english-help-text" class="alert help-text help-text  hide"></p>
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="description" class="form-label">@lang('share.create_thread_form.description')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <textarea required id="content_english" name="content_english" class="form-fill" rows="3"></textarea>
                            <p id="content_english-help-text" class="alert help-text help-text  hide"></p>
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="imageProfile" class="form-label">@lang('share.create_thread_form.image')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <div class="form-file-image">
                                <div class="form-file">
                                    <input type="file" class="form-fileupload" id="image_path" name="image_path[]" multiple
                                           data-maxfile="5,120"/>
                                    <p id="original-help-text" class="alert help-text hide"></p>
                                    <div class="form-file-style">
                                        <div class="form-flex btn-blue">@lang('share.create_thread_form.browse')</div>
                                        <p class="form-flex show-text">@lang('share.create_thread_form.image_condition')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="imageProfile" class="form-label">@lang('share.create_thread_form.file')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <div class="form-file">
                                <input type="file" class="form-fileupload" id="file_path" name="file_path[]" data-maxfile="5120"/>
                                <p id="file_path-help-text" class="alert help-text hide"></p>
                                <div class="form-file-style">
                                    <div class="form-flex btn-blue">@lang('share.create_thread_form.browse')</div>
                                    <p class="form-flex show-text">@lang('share.create_thread_form.file_condition')</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @captcha

                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-offset-2 large-9">
                            <button class="btn-green btn-long">@lang('button.create_thread')</button>
                        </div>
                    </div>
                    <input type="hidden" name="fk_user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="status" value="draft">
                </form>
            </div>
        </div>
    </section>
@endsection