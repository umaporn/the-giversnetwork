@extends('admin.layouts.app')

@section('page-title', __('give_admin.page_title.add'))
@section('page-description', __('give_admin.page_description.add'))

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
                                        <h2 class="cell shrink user-head">@lang('give_admin.add_give_or_receive')</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <form action="{{ route('admin.give.store') }}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                          class="submission-form">
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="product" class="form-label">@lang('give_admin.choose')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <select class="form-select white" name="type" id="type">
                                                    <option value="">@lang('give.give_type_selection')</option>
                                                    <option value="give">@lang('give.create_item_form.give_item')</option>
                                                    <option value="receive">@lang('give.create_item_form.receive')</option>
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
                                                        <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                                    @endforeach
                                                </select>
                                                <p id="fk_category_id-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="product" class="form-label">@lang('give_admin.title_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="title_thai" name="title_thai" class="form-fill" value="">
                                                <p id="title_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="product" class="form-label">@lang('give_admin.title_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="title_english" name="title_english" class="form-fill" value="">
                                                <p id="title_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="amount" class="form-label">@lang('give_admin.amount')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="number" id="amount" class="form-fill" value="" name="amount">
                                                <p id="amount-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="address" class="form-label">@lang('give_admin.address')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="address" name="address" class="form-fill" rows="3"></textarea>
                                                <p id="address-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="des" class="form-label">@lang('give_admin.description_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="description_thai" class="form-fill" rows="3" name="description_thai" maxlength="200"></textarea>
                                                <div class="float-right form-flex show-text" id="count_description_text"></div>
                                                <p id="description_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="des" class="form-label">@lang('give_admin.description_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="description_english" class="form-fill" rows="3" name="description_english" maxlength="200"></textarea>
                                                <div class="float-right form-flex show-text" id="count_description_text"></div>
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
                                                <label for="imageProfile" class="form-label">@lang('give_admin.image')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <div class="form-file-image">
                                                    <div class="form-file">
                                                        <input type="file" class="form-fileupload" id="image_path" name="image_path[]" multiple
                                                               data-maxfile="5,120"/>
                                                        <p id="original-help-text" class="alert help-text hide"></p>
                                                        <div class="form-file-style">
                                                            <div class="form-flex btn-blue">@lang('give_admin.browse')</div>
                                                            <p class="form-flex show-text">@lang('give_admin.image_condition')</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label class="form-label">@lang('give_admin.approval')</label>
                                            </div>
                                            <div class="cell small-12 large-9 form-text">
                                                <input id="status" type="checkbox" name="status">
                                                <label for="approve">@lang('give_admin.approval_text')</label>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-offset-2 large-9">
                                                <button class="btn-green btn-long">@lang('give_admin.add_give')</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="fk_user_id" value="{{ Auth::user()->id }}">
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