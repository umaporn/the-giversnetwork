@extends('layouts.app')

@section('page-title', __('give.page_title.index'))
@section('page-description', __('give.page_description.index'))

@section('content')

    <section class="give all">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <i class="fas fa-gift"></i>
                <h2 class="topic-light">@lang('give.page_title.index')</h2>
            </div>
        </div>
        <section class="grid-x padding-content">
            <div class="cell small-12">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href="{{ route('home.index') }}">@lang('home.page_title.index')</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span>@lang('give.page_title.index')
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <section class="grid-x padding-content align-center padding-top-0">
            <div class="cell small-12 large-8 search">
                <input type="text" class="search-text" name="" placeholder="Search">
                <button type="submit" class="search-button">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="cell small-12">
                <div class="grid-x">
                    <div class="cell-block small-12 xlarge-3">
                        <form class="give-cat">
                            <div class="grid-x">
                                <div class="cell shrink">
                                    <label for="category" class="text-uppercase">@lang('give.category')</label>
                                </div>
                                <div class="cell auto">
                                    <select id="category" class="give-filter">
                                        <option value="{{ route('give.index',  [ 'categoryID' => '' ]) }}">@lang('give.give_category_selection')</option>
                                        @foreach( $data['giveCategory'] as $category )
                                            <option value="{{ route('give.index',  [ 'categoryID' => $category['id'] ]) }}"
                                                    @if( $categoryID == $category['id'] ) selected @endif
                                            >{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="cell small-12">
                <ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
                    <li class="tabs-title give-tab @if( $type === 'give' ) is-active @endif">
                        <a href="#give" data-url="{{ route('give.list', [ 'type' => 'give', 'categoryID' => $categoryID ] ) }}" aria-selected="true">
                            @lang('give.page_title.index')
                        </a>
                    </li>
                    <li class="tabs-title receive-tab  @if( $type === 'receive' ) is-active @endif">
                        <a href="#giver" data-url="{{ route('give.list', [ 'type' => 'receive', 'categoryID' => $categoryID ] ) }}">
                            @lang('give.receive')
                        </a>
                    </li>
                </ul>
                <div class="tabs-content" data-tabs-content="collapsing-tabs" id="give-content">
                    <div class="tabs-panel is-active" id="give">
                        <div class="give-cat-btn">
                            <a href="#" class="btn-blue">
                                <i class="fas fa-plus"></i> @lang('give.give_item')
                            </a>
                        </div>
                        <div id="give-result-box">
                            @include('give.list')
                        </div>
                    </div>
                    <div class="tabs-panel" id="giver">
                        <div class="give-cat-btn">
                            <a href="#" class="btn-blue">
                                <i class="fas fa-plus"></i> @lang('give.tell_giver')
                            </a>
                        </div>
                        <div id="receive-result-box">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
