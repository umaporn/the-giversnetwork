@extends('layouts.app')

@section('page-title', __('user.page_title.profile'))
@section('page-description', __('user.page_description.profile'))
@section('page-icon', 'edit-user-icon')

@section('content')

    <form class="submission-form" method="POST" action="{{ route('user.updateProfile') }}">

        <label>
            @lang('user.username'):
            <input type="text" name="username" id="username" value="{{ $user[0]->username }}">
        </label>
        <p id="username-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.avatar'):
            @if($user[0]->image_path)
                <img src="{{ Storage::url($user[0]->image_path) }}" width="200" alt="@lang('avatar')">
            @endif
            <input type="file" name="image_path" id="image_path">
        </label>
        <p id="image_path-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.firstName'):
            <input type="text" name="firstName" id="firstName" value="{{ $user[0]->firstname }}">
        </label>
        <p id="firstName-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.lastName'):
            <input type="text" name="lastName" id="lastName" value="{{ $user[0]->lastname }}">
        </label>
        <p id="lastName-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.phone_number'):
            <input type="text" name="phone_number" id="phone_number" value="{{ $user[0]->phone_number }}">
        </label>
        <p id="phone_number-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.organization'):
            <select name="fk_organization_category_id" id="fk_organization_category_id">
                @foreach( $organizationCategoryList as $organizationCategoryItem )
                    <option value="{{ $organizationCategoryItem->id }}"
                            {{ ( $user[0]->fk_organization_category_id === $organizationCategoryItem->id ) ? 'selected' : '' }}
                    > {{ $organizationCategoryItem->title }}
                @endforeach
            </select>
            <input type="text" name="organization_name" id="organization_name" value="{{ $user[0]->organization_name }}">
        </label>
        <p id="organization_name-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.interest_in'):
            <div>
                @foreach( $interestList as $interestItem )
                    <input type="checkbox"
                           name="fk_interest_in_id"
                           id="fk_interest_in_id" value="{{ $interestItem->id }}"
                           {{ ( $user[0]->fk_interest_in_id === $interestItem->id ) ? 'checked' : '' }}
                    > {{ $interestItem->title }}
                @endforeach
            </div>
        </label>
        <p id="fk_interest_in_id-help-text" class="alert help-text hide"></p>

        <input type="hidden" name="fk_permission_id" value="{{ config('user.permission_id.member') }}">

        <button type="submit" class="button">@lang('button.update')</button>
        <button type="reset" class="button">@lang('button.reset')</button>

    </form>

@endsection
