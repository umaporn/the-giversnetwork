@extends('layouts.app')

@section('page-title', __('user.page_title.profile'))
@section('page-description', __('user.page_description.profile'))
@section('view-id', 'USER-PROFILE-001')
@section('page-icon', 'edit-user-icon')

@section('content')

    <div class="grid-x">
        <div class="large-6 cell">
            <table class="stack unstriped">
                <tr>
                    <td>
                        <strong>@lang('user.email'):</strong>
                    </td>
                    <td>
                        {{ $user->getAuthIdentifier() }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>@lang('user.password'):</strong>
                    </td>
                    <td>
                        <a data-open="change-password">@lang('user.profile.change_password')</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div id="change-password" class="card reveal" data-reveal data-close-on-click="false">
        <div class="card-divider title">
            @lang('user.profile.change_password_title')
        </div>
        <div class="card-section">
            @include('users.change_password')
        </div>
        <button class="close-button" data-close aria-label="@lang('button.close_popup')" type="button">
            <span aria-hidden="true" title="@lang('button.close_popup')">&times;</span>
        </button>
    </div>
@endsection