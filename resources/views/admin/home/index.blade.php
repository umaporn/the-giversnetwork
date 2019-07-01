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

                </div>
            </div>
        </div>
    </section>
@endsection