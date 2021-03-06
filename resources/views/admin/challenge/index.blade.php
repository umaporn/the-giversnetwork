@extends('admin.layouts.app')

@section('page-title', __('challenge_admin.page_title.index'))
@section('page-description', __('challenge_admin.page_description.index'))

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('challenge_admin.page_title.index')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('admin.home.index') }}">@lang('admin.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('challenge_admin.page_title.index')
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
                                        <h2 class="cell shrink user-head">@lang('challenge_admin.page_title.challenge_all')</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                            <div class="margin-left-1">
                                                <div class="input-group input-search">
                                                    <form id="search-form-detail" class="cell search" method="GET" action="{{ route('admin.challenge.index') }}">
                                                        <input name="search" type="text" class="input-group-field form-fill" placeholder="Search">
                                                        <div class="input-group-button">
                                                            <input type="submit" class="button btn-blue" value="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <section class="table-scroll table-admin">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th>@lang('challenge_admin.no')</th>
                                                <th>@lang('challenge_admin.title')</th>
                                                <th>@lang('challenge_admin.views')</th>
                                                <th>@lang('challenge_admin.comment')</th>
                                                <th>@lang('challenge_admin.status')</th>
                                                <th>@lang('challenge_admin.url')</th>
                                                <th>@lang('challenge_admin.edit')</th>
                                                <th>@lang('challenge_admin.delete')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @include('admin.challenge.list')
                                            </tbody>
                                        </table>
                                    </section>
                                    <nav aria-label="Pagination">
                                        {{ $challenge->links('admin.pagination.normal') }}
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
