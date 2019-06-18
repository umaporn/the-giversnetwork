@extends('layouts.app')

@section('page-title', __('organization.page_title.index'))
@section('page-description', __('organization.page_description.index'))

@section('content')

    <section class="organization all">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('organization.page_title.index')</h2>
            </div>
        </div>
        <section class="grid-x padding-content">
            <div class="cell small-12">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> @lang('organization.page_title.index')
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <section class="grid-x padding-content align-center padding-top-0">
            <div class="cell small-12 large-8 search">
                <form id="search-form-detail" class="cell search" method="GET" action="{{ route('organization.index') }}">
                    {{ csrf_field() }}
                    <input name="search" type="search" class="search-text" placeholder="Search">
                    <button type="submit" class="search-button">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="cell small-12">
                <div class="grid-x">
                    <div class="cell-block small-12 xlarge-3">
                        <form class="organization-cat">
                            <div class="grid-x">
                                <div class="cell shrink">
                                    <label for="category" class="text-uppercase">
                                        @lang('organization.category')
                                    </label>
                                </div>
                                <div class="cell auto">
                                    <select id="category" class="organization-filter">
                                        <option value="{{ route('organization.index',  [ 'category_id' => '' ]) }}">@lang('give.give_category_selection')</option>
                                        @foreach( $data['organizationCategory'] as $category )
                                            <option value="{{ route('organization.index',  [ 'category_id' => $category['id'] ]) }}"
                                                    @if( $category_id == $category['id'] ) selected @endif
                                            >{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('organization.list')
        </section>

    </section>


@endsection
