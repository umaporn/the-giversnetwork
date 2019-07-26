@extends('admin.layouts.app')

@section('page-title', __('admin.page_title.index'))
@section('page-description', __('admin.page_description.index'))

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
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('admin.page_title.index')
                    </li>
                </ul>
            </div>
        </nav>

        <div class="grid-x padding-content">
            <div class="cell auto">
                <div class="grid-x">
                    <div class="cell small-12 large-4 xxlarge-3 show-for-large">
                        @include('admin.layouts.side_menu')
                    </div>
                    <div class="cell small-12 large-8 xxlarge-9">
                        <article class="admin-content">
                            <div class="grid-x">
                                <div class="cell small-12">
                                    <div class="grid-x admin-form-space admin-search">
                                        <h2 class="cell shrink admin-head">Admin Panel</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                        </div>
                                        <div class="cell small-12">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection