@extends('admin.layouts.app')

@section('page-title', __('give_admin.page_title.edit'))
@section('page-description', __('give_admin.page_description.edit'))

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('give_admin.page_title.index')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('admin.home.index') }}">@lang('admin.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('give_admin.page_title.index')
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
                                        <h2 class="cell shrink user-head">@lang('give_admin.edit_give')</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <form action="{{ route('admin.give.update', ['give' => $give->id ]) }}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                          class="submission-form"
                                    >
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="give_id" class="form-label">@lang('give_admin.give_id')</label>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                {{ $give->id }}
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="product" class="form-label">@lang('give_admin.choose')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <select class="form-select white" name="type" id="type">
                                                    <option value="">@lang('give.give_type_selection')</option>
                                                    <option value="give" {{ $give->type === 'give' ? 'selected' : '' }}>@lang('give.create_item_form.give_item')</option>
                                                    <option value="receive" {{ $give->type === 'receive' ? 'selected' : '' }}>@lang('give.create_item_form.receive')</option>
                                                </select>
                                                <p id="type-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="choose" class="form-label">@lang('give.create_item_form.category')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <select class="form-select white" name="fk_category_id" id="fk_category_id">
                                                    <option value="">@lang('give.give_category_selection')</option>
                                                    @foreach( $data['giveCategory'] as $category )
                                                        <option value="{{ $category['id'] }}"
                                                                {{ $category['id'] === $give->fk_category_id ? 'selected' : '' }}
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
                                                <label for="title_thai" class="form-label">@lang('give_admin.title_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text"
                                                       id="title_thai"
                                                       class="form-fill"
                                                       name="title_thai"
                                                       value="{{ $give->title_thai }}"
                                                >
                                                <p id="title_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('give_admin.title_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text"
                                                       id="title_english"
                                                       class="form-fill"
                                                       name="title_english"
                                                       value="{{ $give->title_english }}"
                                                >
                                                <p id="title_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="amount" class="form-label">@lang('give_admin.amount')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="number" id="amount" class="form-fill" value="{{ $give->amount }}" name="amount">
                                                <p id="amount-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="address" class="form-label">@lang('give_admin.address')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="address" name="address" class="form-fill" rows="3">{{ $give->address }}</textarea>
                                                <p id="address-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="description_thai" class="form-label">@lang('give_admin.description_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="description_thai" class="form-fill" name="description_thai" rows="3" maxlength="2000">
                                                    {{ $give->description_thai }}
                                                </textarea>
                                                <p id="description_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="description_english" class="form-label">@lang('give_admin.description_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="description_english" class="form-fill" name="description_english" rows="3">
                                                    {{ $give->description_english }}
                                                </textarea>
                                                <p id="description_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="product" class="form-label">@lang('give_admin.expired_date')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <select class="form-select white" name="expired_date">
                                                    @foreach( __('give_admin.expired_date_list') as $expired_date )
                                                        <option value="{{ $expired_date }}">{{ $expired_date }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="image" class="form-label">@lang('give_admin.image')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                @if($give->giveImage)
                                                    <div class="grid-x">
                                                        @foreach( $give->giveImage as $giveImage )
                                                            <div class="cell small-4 padding-1">
                                                                <img src="{{ $giveImage->image_path }}" width="200" alt="@lang('give_admin.image')">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div class="form-file-image">
                                                    <div class="form-file">
                                                        <input type="file" class="form-fileupload" id="image_path" name="image_path[]"
                                                               data-maxfile="5,120"/>
                                                        <div class="form-file-style">
                                                            <div class="form-flex btn-blue">@lang('give_admin.browse')</div>
                                                            <p class="form-flex show-text">@lang('give_admin.image_condition')</p>
                                                        </div>
                                                        <p id="image_path-help-text" class="alert help-text help-text hide"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label class="form-label">@lang('give_admin.approval')</label>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="status" type="checkbox" name="status" {{ $give['status'] === 'public' ? 'checked' : '' }}>
                                                <label for="approve">@lang('give_admin.approval_text')</label>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-offset-2 large-9">
                                                <button class="btn-green btn-long">@lang('give_admin.edit_give')</button>
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