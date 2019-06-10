@extends('layouts.app')

@section('page-title', __('give.page_title.index'))
@section('page-description', __('give.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

<section class="give all">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <i class="fas fa-gift"></i>
            <h2 class="topic-light">give</h2>
        </div>
    </div>
    <section class="grid-x padding-content">
        <div class="cell small-12">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> Give - Food non-perishable
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <section class="grid-x padding-content align-center padding-top-0">
        <div class="cell small-12 large-8 search">
            <input type="text" class="search-text" placeholder="Search">
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
                                <label for="category">CATEGORY</label>
                            </div>
                            <div class="cell auto">
                                <select id="category">
                                    <option value="food-non-perishable">Food non-perishable</option>
                                    <option value="xxx">xxx</option>
                                    <option value="xxx">xxx</option>
                                    <option value="xxx">xxx</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="cell small-12">
            <ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
                <li class="tabs-title is-active"><a href="#give" aria-selected="true">Give</a></li>
                <li class="tabs-title"><a href="#giver">Receive</a></li>
            </ul>
            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                <div class="tabs-panel is-active" id="give">
                    <div class="give-cat-btn">
                        <a href="#" class="btn-blue">
                            <i class="fas fa-plus"></i> Give Item
                        </a>
                    </div>
                    <section class="grid-x grid-margin-x grid-margin-y">
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
                                    <h2 class="cards-topic">ปลากระป๋อง เนื้อปลาแมคเคอเรลและซอสชั้นดี ตรา สามแม่ครัว ขนาด
                                        200 กรัม</h2>
                                    <p class="cards-amount">100 items</p>
                                    <a href="#" class="btn-blue">Contact giver</a>
                                </div>
                            </div>
                        </article>
                        <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                            <div class="cards-style">
                                <figure class="cards-image">
                                    <img src="{{ asset(config('images.home.share.home_share_01' )) }}"
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
                                    <h2 class="cards-topic">Ramen Noodles</h2>
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
                <div class="tabs-panel" id="giver">
                    <div class="give-cat-btn">
                        <a href="#" class="btn-blue">
                            <i class="fas fa-plus"></i> Tell Giver
                        </a>
                    </div>
                </div>
            </div>

    </section>


</section>


@endsection