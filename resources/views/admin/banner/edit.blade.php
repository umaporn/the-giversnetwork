@extends('admin.layouts.app')

@section('page-title', __('banner_admin.page_title.edit'))
@section('page-description', __('banner_admin.page_description.edit'))

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('banner_admin.page_title.index')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('admin.home.index') }}">@lang('admin.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('banner_admin.page_title.index')
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
                                        <h2 class="cell shrink user-head">@lang('banner_admin.edit_banner')</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <form action="{{ route('admin.banner.update', ['banner' => $banner->id ]) }}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                          class="submission-form"
                                    >
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="banner_id" class="form-label">@lang('banner_admin.banner_id')</label>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                {{ $banner->id }}
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="title_thai" class="form-label">@lang('banner_admin.title_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text"
                                                       id="title_thai"
                                                       class="form-fill"
                                                       name="title_thai"
                                                       value="{{ $banner->title_thai }}"
                                                >
                                                <p id="title_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('banner_admin.title_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text"
                                                       id="title_english"
                                                       class="form-fill"
                                                       name="title_english"
                                                       value="{{ $banner->title_english }}"
                                                >
                                                <p id="title_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="image" class="form-label">@lang('banner_admin.image_path_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                @if($banner->image_path_thai)
                                                    <div class="padding-bottom-1">
                                                        <img src="{{ Storage::url($banner->image_path_thai) }}" width="200" alt="@lang('banner_admin.image')">
                                                    </div>
                                                @endif
                                                <div class="form-file-image">
                                                    <div class="form-file">
                                                        <input type="file" class="form-fileupload" id="image_path_thai" name="image_path_thai[]"
                                                               data-maxfile="5,120"/>
                                                        <div class="form-file-style">
                                                            <div class="form-flex btn-blue">@lang('banner_admin.browse')</div>
                                                            <p class="form-flex show-text">@lang('banner_admin.image_condition')</p>
                                                        </div>
                                                        <p id="image_path_thai-help-text" class="alert help-text help-text hide"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="image" class="form-label">@lang('banner_admin.image_path_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                @if($banner->image_path_english)
                                                    <div class="padding-bottom-1">
                                                        <img src="{{ Storage::url($banner->image_path_english) }}" width="200" alt="@lang('banner_admin.image')">
                                                    </div>
                                                @endif
                                                <div class="form-file-image">
                                                    <div class="form-file">
                                                        <input type="file" class="form-fileupload" id="image_path_english" name="image_path_english[]"
                                                               data-maxfile="5,120"/>
                                                        <div class="form-file-style">
                                                            <div class="form-flex btn-blue">@lang('banner_admin.browse')</div>
                                                            <p class="form-flex show-text">@lang('banner_admin.image_condition')</p>
                                                        </div>
                                                        <p id="image_path_english-help-text" class="alert help-text help-text hide"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="link" class="form-label">@lang('banner_admin.link')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="link" class="form-fill" name="link"
                                                       value="{{ $banner->link }}"
                                                >
                                                <p id="link-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label class="form-label">@lang('banner_admin.start_date')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <div class="form-date">
                                                    <input type="date" id="start_date" class="form-fill" name="start_date" value="{{ $banner->start_date }}">
                                                    <p id="start_date-help-text" class="alert help-text help-text hide"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label class="form-label">@lang('banner_admin.end_date')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <div class="form-date">
                                                    <input type="date" id="end_date" class="form-fill" name="end_date" value="{{ $banner->end_date }}">
                                                    <p class="form-flex show-text">@lang('banner_admin.end_date_condition')</p>
                                                    <p id="end_date-help-text" class="alert help-text help-text hide"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <p class="form-label form-p">@lang('banner_admin.publish')</p>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="status" type="checkbox" name="status" {{ $banner->status === 'public' ? 'checked' : '' }}>
                                                <label for="status">@lang('banner_admin.publish_post')</label>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-offset-2 large-9">
                                                <button class="btn-green btn-long">@lang('banner_admin.edit_banner')</button>
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