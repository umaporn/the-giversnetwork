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
            <form action="" class="form-onerow">
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="choose" class="form-label">@lang('give.create_item_form.choose')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <select class="form-select light">
                            <option value="" selected>@lang('give.create_item_form.give_item')</option>
                            <option value="receive">@lang('give.create_item_form.receive')</option>
                        </select>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="choose" class="form-label">@lang('give.create_item_form.category')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <select class="form-select light">
                            <option value="" selected>Food non-perishable</option>
                        </select>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="name" class="form-label">@lang('give.create_item_form.name')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="text" id="name" class="form-fill" value="">
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="amount" class="form-label">@lang('give.create_item_form.amount')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="number" id="amount" class="form-fill" value="">
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="address" class="form-label">@lang('give.create_item_form.address')</label>
                    </div>
                    <div class="cell small-12 large-9 align-self-middle">
                        <input id="useInProfile" type="checkbox">
                        <label for="use-in-profile">
                            @lang('give.create_item_form.use_address')
                        </label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                    </div>
                    <div class="cell small-12 large-9">
                        <textarea id="address" class="form-fill" rows="3"></textarea>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="description" class="form-label">@lang('give.create_item_form.description')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <textarea id="description" class="form-fill" rows="3"></textarea>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="imageProfile" class="form-label">@lang('give.create_item_form.image')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <div class="form-file-image">
                            <div class="form-file">
                                <input type="file" class="form-fileupload" id="file-image-multi" multiple
                                    data-maxfile="1024" />
                                <div class="form-file-style">
                                    <div class="form-flex btn-blue">@lang('give.create_item_form.browse')</div>
                                    <p class="form-flex show-text">@lang('give.create_item_form.image_condition')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-offset-2 large-9">
                        <button class="btn-green btn-long">@lang('button.publish')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection