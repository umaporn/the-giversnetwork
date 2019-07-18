@extends('admin.layouts.app')

@section('page-title', __('share_admin.page_title.edit'))
@section('page-description', __('share_admin.page_description.edit'))

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('share_admin.page_title.index')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('admin.home.index') }}">@lang('admin.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('share_admin.page_title.index')
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
                                        <h2 class="cell shrink user-head">@lang('share_admin.edit_share')</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <form action="{{ route('admin.share.update', ['share' => $share->id ]) }}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                          class="submission-form"
                                    >
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="share_id" class="form-label">@lang('share_admin.share_id')</label>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                {{ $share->id }}
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="product" class="form-label">@lang('share_admin.choose')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <select class="form-select white" name="type" id="type">
                                                    <option value="">@lang('share.share_type_selection')</option>
                                                    <option value="share" {{ $share->type === 'share' ? 'selected' : '' }}>@lang('share.create_item_form.share_item')</option>
                                                    <option value="receive" {{ $share->type === 'receive' ? 'selected' : '' }}>@lang('share.create_item_form.receive')</option>
                                                </select>
                                                <p id="type-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="choose" class="form-label">@lang('share.create_item_form.category')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <select class="form-select white" name="fk_category_id" id="fk_category_id">
                                                    <option value="">@lang('share.share_category_selection')</option>
                                                    @foreach( $data['shareCategory'] as $category )
                                                        <option value="{{ $category['id'] }}"
                                                                {{ $category['id'] === $share->fk_category_id ? 'selected' : '' }}
                                                        >
                                                            {{ $category['title'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p id="fk_category_id-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="title_thai" class="form-label">@lang('share_admin.title_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text"
                                                       id="title_thai"
                                                       class="form-fill"
                                                       name="title_thai"
                                                       value="{{ $share->title_thai }}"
                                                >
                                                <p id="title_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('share_admin.title_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text"
                                                       id="title_english"
                                                       class="form-fill"
                                                       name="title_english"
                                                       value="{{ $share->title_english }}"
                                                >
                                                <p id="title_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="amount" class="form-label">@lang('share_admin.amount')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="number" id="amount" class="form-fill" value="{{ $share->amount }}" name="amount">
                                                <p id="amount-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="address" class="form-label">@lang('share_admin.address')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="address" name="address" class="form-fill" rows="3">{{ $share->address }}</textarea>
                                                <p id="address-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="description_thai" class="form-label">@lang('share_admin.description_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="description_thai" class="form-fill" name="description_thai" rows="3" maxlength="2000">
                                                    {{ $share->description_thai }}
                                                </textarea>
                                                <p id="description_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="description_english" class="form-label">@lang('share_admin.description_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="description_english" class="form-fill" name="description_english" rows="3">
                                                    {{ $share->description_english }}
                                                </textarea>
                                                <p id="description_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="product" class="form-label">@lang('share_admin.expired_date')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <select class="form-select white" name="expired_date">
                                                    @foreach( __('share_admin.expired_date_list') as $expired_date )
                                                        <option value="{{ $expired_date }}">{{ $expired_date }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="image" class="form-label">@lang('share_admin.image')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                @if($share->shareImage)
                                                    <div class="grid-x">
                                                        @foreach( $share->shareImage as $shareImage )
                                                            <div class="cell small-4 padding-1">
                                                                <img src="{{ $shareImage->image_path }}" width="200" alt="@lang('share_admin.image')">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div class="form-file-image">
                                                    <div class="form-file">
                                                        <input type="file" class="form-fileupload" id="image_path" name="image_path[]"
                                                               data-maxfile="5,120"/>
                                                        <div class="form-file-style">
                                                            <div class="form-flex btn-blue">@lang('share_admin.browse')</div>
                                                            <p class="form-flex show-text">@lang('share_admin.image_condition')</p>
                                                        </div>
                                                        <p id="image_path-help-text" class="alert help-text help-text hide"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label class="form-label">@lang('share_admin.approval')</label>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="status" type="checkbox" name="status" {{ $share['status'] === 'public' ? 'checked' : '' }}>
                                                <label for="approve">@lang('share_admin.approval_text')</label>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-offset-2 large-9">
                                                <button class="btn-green btn-long">@lang('share_admin.edit_share')</button>
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