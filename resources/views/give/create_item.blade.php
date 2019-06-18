@extends('layouts.app')

@section('page-title', __('give.page_title.index'))
@section('page-description', __('give.page_description.index'))

@section('content')
<section class="give create">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <i class="fas fa-gift"></i>
            <h2 class="topic-light">@lang('give.page_title.index')</h2>
        </div>
    </div>
    <nav class="grid-x padding-breadcrumbs">
        <div class="cell auto">
            <ul class="breadcrumbs">
                <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                <li><a href="{{ route('give.index') }}">@lang('give.page_title.index')</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> @lang('give.give_or_receive')
                </li>
            </ul>
        </div>
    </nav>
    <div class="grid-x padding-content">
        <div class="cell small-12">
            <h2 class="topic-dark"> @lang('give.give_or_receive')</h2>

            <form action="{{ route('give.createGiveItem') }}" method="POST" class="submission-form form-onerow">

                {{ csrf_field() }}

                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="choose" class="form-label">@lang('give.create_item_form.choose')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <select class="form-select light" name="type" id="type">
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
                        <select class="form-select light" name="fk_category_id" id="fk_category_id">
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
                        <label for="name" class="form-label">@lang('give.create_item_form.name')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="text" id="name" name="name" class="form-fill">
                        <p id="name-help-text" class="alert help-text help-text hide"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="amount" class="form-label">@lang('give.create_item_form.amount')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="number" id="amount" name="amount" class="form-fill" value="">
                        <p id="amount-help-text" class="alert help-text help-text hide"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="address" class="form-label">@lang('give.create_item_form.address')</label>
                    </div>
                    <div class="cell small-12 large-9 align-self-middle">
                        <input class="toggle-use-address" id="useInProfile" type="checkbox" name="useAddressProfile">
                        <label for="use-in-profile">
                            @lang('give.create_item_form.use_address')
                        </label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                    </div>
                    <div class="cell small-12 large-9">
                        <textarea id="address" class="form-fill" rows="3" name="address"></textarea>
                        <p id="address-help-text" class="alert help-text help-text hide"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="description" class="form-label">@lang('give.create_item_form.description')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <textarea id="description_text" class="form-fill" rows="3" name="description_text"></textarea>
                        <p id="description_text-help-text" class="alert help-text help-text hide"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="imageProfile" class="form-label">@lang('give.create_item_form.image')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <div class="form-file-image">
                            <div class="form-file">
                                <input type="file" class="form-fileupload" id="image_path" name="image_path[]" multiple
                                       data-maxfile="1024"/>
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
                        <label for="expired_date" class="form-label">@lang('give.create_item_form.expired_date')</label>
                    </div>
                    <div class="cell small-12 large-9 align-self-middle">
                        <input id="expired_date" type="radio" name="expired_date" checked value="+3 day">
                        <label for="use-in-profile">
                            @lang('give.create_item_form.3_days')
                        </label>

                        <input id="expired_date" type="radio" name="expired_date" value="+1 week">
                        <label for="use-in-profile">
                            @lang('give.create_item_form.1_week')
                        </label>

                        <input id="expired_date" type="radio" name="expired_date" value="+1 month">
                        <label for="use-in-profile">
                            @lang('give.create_item_form.1_month')
                        </label>

                        <input id="expired_date" type="radio" name="expired_date" value="+6 months">
                        <label for="use-in-profile">
                            @lang('give.create_item_form.6_months')
                        </label>

                    </div>
                </div>

                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-offset-2 large-9">
                        <button class="btn-green btn-long">@lang('button.publish')</button>
                    </div>
                </div>
                <input type="hidden" name="fk_user_id" value="{{ Auth::user()->id }}">
            </form>
        </div>
    </div>
</section>
@endsection