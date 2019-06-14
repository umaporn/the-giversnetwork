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
                                    <select id="category">
                                        <option value="">@lang('give.give_category_selection')</option>
                                        @foreach( $data['giveCategory'] as $category )
                                            <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
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
                    <li class="tabs-title is-active">
                        <a href="#give" aria-selected="true">@lang('give.page_title.index')</a>
                    </li>
                    <li class="tabs-title">
                        <a href="#giver">@lang('give.receive')</a>
                    </li>
                </ul>
                <div class="tabs-content" data-tabs-content="collapsing-tabs">
                    <div class="tabs-panel is-active" id="give">
                        <div class="give-cat-btn">
                            <a href="#" class="btn-blue">
                                <i class="fas fa-plus"></i> @lang('give.give_item')
                            </a>
                        </div>
                        <section class="grid-x grid-margin-x margin-top-1">
                            @foreach( $data['give'] as $give_item )
                                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                                    <div class="cards-style">
                                        <figure class="cards-image">
                                            <a href="{{ route('give.detail', ['give' => $give_item['id']]) }}">
                                                <img src="{{ $give_item['image_path'] ? $give_item['image_path'] : config('images.placeholder.700x400') }}"
                                                     alt="{{ $give_item['title'] }}"
                                                     class="img-cover">
                                            </a>
                                        </figure>
                                        <div class="cards-detail">
                                            <a href="{{ route('give.detail', ['give' => $give_item['id']]) }}">
                                                <h2 class="cards-topic">{{ $give_item['title'] }}</h2>
                                            </a>
                                            <p class="cards-amount">{{ $give_item['amount'] }} items</p>
                                            <a href="{{ route('user.getUserProfile', [ 'user' => $give_item['fk_user_id'] ]) }}" class="btn-blue">
                                                @lang('give.contact_giver')
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </section>
                        <div class="give-load">
                            <a href="#" id="loadMore" class="load-more">View More <i class="fas fa-caret-down"></i></a>
                        </div>
                    </div>
                    <div class="tabs-panel" id="giver">
                        <div class="give-cat-btn">
                            <a href="#" class="btn-blue">
                                <i class="fas fa-plus"></i> Tell Giver
                            </a>
                        </div>
                        <section class="grid-x grid-margin-x margin-top-1">
                            <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                                <div class="cards-style">
                                    <figure class="cards-image">
                                        <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}"
                                             class="img-cover">
                                    </figure>
                                    <div class="cards-detail">
                                        <h2 class="cards-topic">Ramen Noodles</h2>
                                        <p class="cards-amount">100 items</p>
                                        <a href="#" class="btn-blue">Contact giver</a>
                                    </div>
                                </div>
                            </article>
                            <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                                <div class="cards-style">
                                    <figure class="cards-image">
                                        <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}"
                                             class="img-cover">
                                    </figure>
                                    <div class="cards-detail">
                                        <h2 class="cards-topic">ปลากระป๋อง เนื้อปลาแมคเคอเรลและซอสชั้นดี ตรา สามแม่ครัว
                                                                ขนาด
                                                                200 กรัม</h2>
                                        <p class="cards-amount">100 items</p>
                                        <a href="#" class="btn-blue">Contact giver</a>
                                    </div>
                                </div>
                            </article>
                        </section>
                        <div class="give-load">
                            <a href="#" id="loadMore" class="load-more">View More <i class="fas fa-caret-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
