@extends('admin.layouts.app')

@section('page-title', __('learn_admin.page_title.index'))
@section('page-description', __('learn_admin.page_description.index'))

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('learn_admin.page_title.index')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('admin.home.index') }}">@lang('admin.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('learn_admin.page_title.index')
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
                    <div class="cell small-12 large-8 xxlarge-9">
                        <article class="admin-content">
                            <div class="grid-x">
                                <div class="cell small-12">
                                    <div class="grid-x admin-form-space admin-search">
                                        <h2 class="cell shrink admin-head">@lang('learn_admin.page_title.all')</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                            <div class="margin-left-1">
                                                <div class="input-group input-search">
                                                    <input class="input-group-field form-fill" type="text">
                                                    <div class="input-group-button">
                                                        <input type="button" class="button btn-blue" value="Search">
                                                    </div>
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
                                                <th>@lang('learn_admin.no')</th>
                                                <th>@lang('learn_admin.title')</th>
                                                <th>@lang('learn_admin.views')</th>
                                                <th>@lang('learn_admin.publish')</th>
                                                <th>@lang('learn_admin.url')</th>
                                                <th>@lang('learn_admin.edit')</th>
                                                <th>@lang('learn_admin.delete')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @include('admin.learn.list')
                                            </tbody>
                                        </table>
                                    </section>
                                    <nav aria-label="Pagination">
                                        {{ $learns->links('admin.pagination.normal') }}
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
