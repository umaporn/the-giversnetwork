@extends('admin.layouts.app')

@section('page-title', __('user_admin.page_title.index'))
@section('page-description', __('user_admin.page_description.index'))

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('admin.page_title.index')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('admin.home.index') }}">@lang('admin.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang(('user_admin.page_title.index'))
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
                                    <div class="grid-x user-form-space admin-search">
                                        <h2 class="cell shrink user-head"> @lang(('user_admin.page_title.all_user'))</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                            <div class="margin-left-1">
                                                <form id="search-form" class="cell search" method="GET" action="{{ route('admin.user.index') }}">
                                                    <div class="input-group input-search">
                                                        {{ csrf_field() }}
                                                        <input name="search" class="input-group-field form-fill" type="text">
                                                        <div class="input-group-button">
                                                            <input type="submit" class="button btn-blue" value="Search">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <section class="table-scroll table-admin">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th class="width-10">@lang('user_admin.id')</th>
                                                <th class="width-40">@lang('user_admin.email')</th>
                                                <th class="width-50">@lang('user_admin.fullname')</th>
                                                <th class="width-50">@lang('user_admin.username')</th>
                                                <th class="width-50">@lang('user_admin.permission')</th>
                                                <th class="width-5 text-center">@lang('user_admin.user_management.edit')</th>
                                                <th class="width-5 text-center">@lang('user_admin.user_management.delete')</th>
                                            </tr>
                                            </thead>
                                            <tbody id="search-result">
                                            @include('admin.users.list')
                                            </tbody>
                                        </table>
                                    </section>
                                    <nav aria-label="Pagination">
                                        {{ $users->links('admin.pagination.normal') }}
                                    </nav>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
