@extends('layouts.app')

@section('page-title', __('register.page_title.index'))
@section('page-description', __('register.page_description.index'))

@section('content')

    <form class="submission-form" method="POST" action="{{ route('submitRegister') }}">

        {{ csrf_field() }}

        <label>@lang('user.email'):
            <input type="email" id="email" name="email" required autofocus value="umaporn.don@gmail.com">
        </label>
        <p id="email-help-text" class="alert help-text hide"></p>

        <label>@lang('user.password'):
            <input type="password" id="password" name="password" required value="umaporn01">
        </label>
        <p id="password-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.password_confirmation'):
            <input type="password" name="password_confirmation" required value="umaporn01">
        </label>

        <label>
            @lang('user.interest_in'):
            <div>
                @foreach( $interestList as $interestItem )
                    <input type="checkbox" name="fk_interest_in_id" id="fk_interest_in_id" value="{{ $interestItem->id }}"> {{ $interestItem->title }}
                @endforeach
            </div>
        </label>
        <p id="fk_interest_in_id-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.username'):
            <input type="text" name="username" id="username" required value="umaporn01">
        </label>
        <p id="username-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.firstname'):
            <input type="text" name="firstname" id="firstname" required value="umaporn01">
        </label>
        <p id="firstname-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.lastname'):
            <input type="text" name="lastname" id="lastname" required value="umaporn01">
        </label>
        <p id="lastname-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.phone_number'):
            <input type="text" name="phone_number" id="phone_number" required value="0855555555">
        </label>
        <p id="phone_number-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.organization'):
            <select name="fk_organization_category_id" id="fk_organization_category_id">
            @foreach( $organizationCategoryList as $organizationCategoryItem )
                <option value="{{ $organizationCategoryItem->id }}"> {{ $organizationCategoryItem->title }}
            @endforeach
            </select>
            <input type="text" name="organization_name" id="organization_name" value="xxx">
        </label>
        <p id="organization_name-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.address'):
            <textarea name="address" id="address"></textarea>
        </label>
        <p id="address-help-text" class="alert help-text hide"></p>

        <label>
            @lang('user.avatar'):
            <input type="file" name="image_path" id="image_path">
        </label>
        <p id="image_path-help-text" class="alert help-text hide"></p>

        <input type="hidden" name="fk_permission_id" value="{{ config('user.permission_id.member') }}">

        {{--@captcha('{{ App::getLocale() }}')--}}

        <button type="submit" class="button">@lang('register.register_button')</button>

    </form>
@endsection