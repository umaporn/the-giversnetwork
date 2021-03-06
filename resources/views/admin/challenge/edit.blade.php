@extends('admin.layouts.app')

@section('page-title', __('challenge_admin.page_title.edit'))
@section('page-description', __('challenge_admin.page_description.edit'))

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('challenge_admin.page_title.index')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('admin.home.index') }}">@lang('admin.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('challenge_admin.page_title.index')
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
                                        <h2 class="cell shrink user-head">@lang('challenge_admin.edit_challenge')</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <form action="{{ route('admin.challenge.update', ['challenge' => $challenge->id ]) }}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                          class="tinyMCE-form"
                                    >
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('challenge_admin.title_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="title_thai" name="title_thai" class="form-fill" value="{{ $challenge->title_thai }}">
                                                <p id="title_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('challenge_admin.title_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="title_english" name="title_english" class="form-fill" value="{{ $challenge->title_english }}">
                                                <p id="title_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="des" class="form-label">@lang('challenge_admin.description_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="description-thai" name="description_thai" class="form-fill" rows="3">{{ $challenge->description_thai }}</textarea>
                                                <p id="description-thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="des" class="form-label">@lang('challenge_admin.description_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="description-english" name="description_english" class="form-fill" rows="3">{{ $challenge->description_english }}</textarea>
                                                <p id="description-english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="des" class="form-label">@lang('challenge_admin.content_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="content-tinymce-thai" name="content_thai" class="form-fill" rows="3">{{ $challenge->content_thai }}</textarea>
                                                <p id="content-tinymce-thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="des" class="form-label">@lang('challenge_admin.content_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="content-tinymce-english" name="content_english" class="form-fill" rows="3">{{ $challenge->content_english }}</textarea>
                                                <p id="content-tinymce-english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="imageProfile" class="form-label">@lang('challenge_admin.image')</label>
                                            </div>
                                            <div class="cell small-12 large-9 flex">
                                                @if($challenge->challengeImage)
                                                    <div class="grid-x">
                                                        @foreach( $challenge->challengeImage as $challengeImage )
                                                            <div class="cell small-4 padding-1">
                                                                <img src="{{ Storage::url( $challengeImage->original ) }}" width="200" alt="@lang('challenge_admin.image')">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div class="form-file-image">
                                                    <div class="form-file">
                                                        <input type="file" class="form-fileupload" id="image_path" name="image_path[]"
                                                               multiple data-maxfile="5,120"/>
                                                        <p id="original-help-text" class="alert help-text hide"></p>
                                                        <div class="form-file-style">
                                                            <div class="form-flex btn-blue">@lang('challenge_admin.browse')</div>
                                                            <p class="form-flex show-text">@lang('challenge_admin.image_condition')</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2 ">
                                                <label for="imageProfile" class="form-label">@lang('challenge_admin.file')</label>
                                            </div>
                                            <div class="cell small-12 large-9 flex">
                                                @if($challenge->file_path)
                                                    <div class="padding-bottom-1">
                                                        <a href="{{ Storage::url( $challenge->file_path ) }}" target="_blank">
                                                            {{$challenge->file_path}}
                                                        </a>
                                                    </div>
                                                @endif
                                                <label class="form-file">
                                                    <input type="file" class="form-fileupload" id="file_path" name="file_path[]" data-maxfile="5120"/>
                                                    <p id="file_path-help-text" class="alert help-text hide"></p>
                                                    <div class="form-file-style">
                                                        <div class="form-flex btn-blue">@lang('challenge_admin.browse')</div>
                                                        <p class="form-flex show-text">@lang('challenge_admin.file_condition')</p>
                                                    </div>
                                                    <p id="file_path-help-text" class="alert help-text help-text hide"></p>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <p class="form-label form-p">@lang('challenge_admin.publish')</p>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="status" type="checkbox" name="status" {{ $challenge->status === 'public' ? 'checked' : '' }}>
                                                <label for="status">@lang('challenge_admin.publish')</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="fk_user_id" value="{{ Auth::user()->id }}">
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-offset-2 large-9">
                                                <button class="btn-green btn-long">@lang('challenge_admin.edit')</button>
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