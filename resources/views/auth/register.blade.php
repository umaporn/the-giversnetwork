@extends('layouts.app')

@section('page-title', __('register.page_title.index'))
@section('page-description', __('register.page_description.index'))

@section('content')

    <section class="user">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('register.page_title.index')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('register.page_title.index')
                    </li>
                </ul>
            </div>
        </nav>
        <div class="grid-x padding-content">
            <div class="cell small-12">
                <h2 class="topic-dark">@lang('user.create_profile')</h2>
                <form class="submission-form form-onerow" method="POST" action="{{ route('submitRegister') }}">
                    {{ csrf_field() }}
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="username" class="form-label">@lang('user.username')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <input type="text" name="username" id="username" class="form-fill" required>
                            <p id="username-help-text" class="alert help-text hide"></p>
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="password" class="form-label">@lang('user.password')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <input type="password" id="password" name="password" class="form-fill" required>
                            <p id="password-help-text" class="alert help-text hide"></p>
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="con-password" class="form-label">@lang('user.password_confirmation')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <input type="password" name="password_confirmation" required class="form-fill">
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="email" class="form-label">@lang('user.email')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <input type="email" id="email" name="email" class="form-fill" required autofocus>
                            <p id="email-help-text" class="alert help-text hide"></p>
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="phone" class="form-label">@lang('user.phone_number')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <input type="tel" name="phone_number" id="phone_number" class="form-fill" required>
                            <p id="phone_number-help-text" class="alert help-text hide"></p>
                        </div>
                    </div>

                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="address" class="form-label">@lang('user.address')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <textarea id="address" name="address" class="form-fill" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="imageProfile" class="form-label">@lang('user.image_profile')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <label class="form-file">
                                <input type="file" id="image_path" name="image_path" class="form-fileupload">
                                <div class="form-file-style">
                                    <input type="text" class="form-flex form-fill" id="filename">
                                    <div class="form-flex btn-blue">@lang('user.browser')</div>
                                    <p class="form-flex show-text">@lang('user.maximum_upload_file')</p>
                                </div>
                                <p id="image_path-help-text" class="alert help-text hide"></p>
                            </label>
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="company" class="form-label">@lang('user.organization')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <div class="input-group">
                            <span class="input-group-field">
                                <select class="form-select" name="fk_organization_category_id" id="fk_organization_category_id">
                                    <option>@lang('user.type_of_organization')</option>
                                     @foreach( $organizationCategoryList as $organizationCategoryItem )
                                        <option value="{{ $organizationCategoryItem->id }}"> {{ $organizationCategoryItem->title }}</option>
                                    @endforeach
                                </select>
                            </span>
                                <input type="text" name="organization_name" id="organization_name"
                                       class="input-group-field form-fill" placeholder="Fill Your Organization Name"
                                >
                                <p id="organization_name-help-text" class="alert help-text hide"></p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-2">
                            <label for="interested" class="form-label">@lang('user.interest_in')</label>
                        </div>
                        <div class="cell small-12 large-9">
                            <a class="btn-blue" data-open="addInterested">
                                <i class="fas fa-plus"></i> @lang('user.add_my_interested')
                            </a>
                            <ul class="show-interested" id="interest-list">
                            </ul>
                            <p id="fk_interest_in_id-help-text" class="alert help-text hide"></p>
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-offset-2 large-9">
                            <input id="terms" type="checkbox">
                            <label for="terms">Agree with <a href=""> Terms of Service & Privacy</a></label>
                        </div>
                    </div>
                    <div class="grid-x grid-padding-x user-form-space">
                        <div class="cell small-12 large-offset-2 large-9">
                            <button class="btn-green btn-long">@lang('button.sign_up')</button>
                        </div>
                    </div>
                    <input type="hidden" name="fk_permission_id" value="{{ config('user.permission_id.member') }}">
                </form>
                <div class="reveal modal-style" id="addInterested" data-reveal>
                    <h2 class="modal-topic">@lang('user.interest_in')</h2>
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
            </div>
        </div>
    </section>
@endsection