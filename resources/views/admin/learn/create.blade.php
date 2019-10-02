@extends('admin.layouts.app')

@section('page-title', __('learn_admin.page_title.add'))
@section('page-description', __('learn_admin.page_description.add'))

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
                                        <h2 class="cell shrink user-head">@lang('learn_admin.add_learn')</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <form action="{{ route('admin.learn.store') }}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                          class="tinyMCE-form"
                                    >
                                        {{ csrf_field() }}
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="title_thai" class="form-label">@lang('learn_admin.title_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text"
                                                       id="title_thai"
                                                       class="form-fill"
                                                       name="title_thai"
                                                >
                                                <p id="title_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="topic" class="form-label">@lang('learn_admin.title_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text"
                                                       id="title_english"
                                                       class="form-fill"
                                                       name="title_english"
                                                >
                                                <p id="title_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="description_thai" class="form-label">@lang('learn_admin.description_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="description_thai" class="form-fill" name="description_thai" rows="3"></textarea>
                                                <p id="description_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="description_english" class="form-label">@lang('learn_admin.description_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="description_english" class="form-fill" name="description_english" rows="3"></textarea>
                                                <p id="description_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="purpose_thai" class="form-label">@lang('learn_admin.purpose_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="purpose_thai" class="form-fill" name="purpose_thai" rows="3"></textarea>
                                                <p id="purpose_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="purpose_english" class="form-label">@lang('learn_admin.purpose_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="purpose_english" class="form-fill" name="purpose_english" rows="3"></textarea>
                                                <p id="purpose_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="key_learning_thai" class="form-label">@lang('learn_admin.key_learning_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="key_learning_thai" class="form-fill" name="key_learning_thai" rows="3"></textarea>
                                                <p id="key_learning_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="key_learning_english" class="form-label">@lang('learn_admin.key_learning_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="key_learning_english" class="form-fill" name="key_learning_english" rows="3"></textarea>
                                                <p id="key_learning_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="owner" class="form-label">@lang('learn_admin.owner_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="owner_thai" class="form-fill" value="" name="owner_thai">
                                                <p id="owner_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="owner_english" class="form-label">@lang('learn_admin.owner_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="owner_english" class="form-fill" value="" name="owner_english">
                                                <p id="owner_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="interested" class="form-label">SDG</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <a class="btn-blue" data-open="addInterested">
                                                    <i class="fas fa-plus"></i> / <i class="fas fa-minus"></i> SDG
                                                </a>
                                                <ul class="show-interested" id="interest-list">
                                                </ul>
                                                <p id="fk_interest_in_id-help-text" class="alert help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="reveal modal-style" id="addInterested" data-reveal>
                                            <h2 class="modal-topic">SDG</h2>
                                            <div class="modal-form">
                                                <ul class="modal-content">
                                                    @foreach( $interestList as $interestItem )
                                                        <li>
                                                            <div class="form-checkbox">
                                                                <input id="{{ $interestItem->id }}"
                                                                       data-value="{{ $interestItem->id }}"
                                                                       data-title="{{ $interestItem->title }}"
                                                                       type="checkbox" class="checkbox-inter">
                                                                <label for="{{ $interestItem->id }}">{{ $interestItem->title }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <button class="btn-green btn-long" data-close aria-label="Close reveal">Save</button>
                                            </div>
                                            <button class="close-button" data-close aria-label="Close reveal" type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="content_thai" class="form-label">@lang('learn_admin.content_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="content-tinymce-thai" class="form-fill" name="content_thai" rows="3"></textarea>
                                                <p id="content_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="content_english" class="form-label">@lang('learn_admin.content_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="content-tinymce-english" class="form-fill" name="content_english" rows="3"></textarea>
                                                <p id="content-tinymce-english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="imageProfile" class="form-label">@lang('learn_admin.file')</label>
                                            </div>
                                            <div class="cell small-12 large-9 flex">
                                                <div class="form-file-image">
                                                    <div class="form-file">
                                                        <input type="file" class="form-fileupload" id="file_path" name="file_path[]"
                                                               multiple data-maxfile="5,120"/>
                                                        <p id="original-help-text" class="alert help-text hide"></p>
                                                        <div class="form-file-style">
                                                            <div class="form-flex btn-blue">@lang('learn_admin.browse')</div>
                                                            <p class="form-flex show-text">@lang('learn_admin.file_condition')</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <label for="image" class="form-label">@lang('learn_admin.image')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <div class="form-file-image">
                                                    <div class="form-file">
                                                        <input type="file" class="form-fileupload" id="image_path" name="image_path[]"
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
                                            <div class="cell small-12 large-3">
                                                <p class="form-label form-p">@lang('learn_admin.publish')</p>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="status" type="checkbox" name="status">
                                                <label for="status">@lang('learn_admin.publish_post')</label>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-3">
                                                <p class="form-label form-p">@lang('learn_admin.highlight')</p>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="pinned" type="checkbox" name="highlight_status">
                                                <label for="pinned">@lang('learn_admin.pin_to_highlight')</label>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-offset-2 large-9">
                                                <button class="btn-green btn-long">@lang('learn_admin.add_learn')</button>
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