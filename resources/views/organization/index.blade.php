@extends('layouts.app')

@section('page-title', __('news.page_title.index'))
@section('page-description', __('news.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

<section class="organization all">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <h2 class="topic-light">Organization</h2>
        </div>
    </div>
    <section class="grid-x padding-content">
        <div class="cell small-12">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> Organization
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
                    <form class="organization-cat">
                        <div class="grid-x">
                            <div class="cell shrink">
                                <label for="category">CATEGORY</label>
                            </div>
                            <div class="cell auto">
                                <select id="category">
                                    <option value="food-non-perishable">All</option>
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
            <section class="grid-x grid-margin-x margin-top-1">
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">แชมเปญฮาลาลแม่ค้าดิกชันนารีหลวงปู่ โปรโมเตอร์อิมพีเรียล</h2>
                            <p class="cards-amount">category</p>
                            <a href="{{ route('organization.profile') }}" class="btn-blue">Contact</a>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Organization Name</h2>
                            <p class="cards-amount">category</p>
                            <a href="{{ route('organization.profile') }}" class="btn-blue">Contact</a>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.share.home_share_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Organization Name</h2>
                            <p class="cards-amount">category</p>
                            <a href="{{ route('organization.profile') }}" class="btn-blue">Contact</a>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Organization Name</h2>
                            <p class="cards-amount">category</p>
                            <a href="{{ route('organization.profile') }}" class="btn-blue">Contact</a>
                        </div>
                    </div>
                </article>
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <img src="{{ asset(config('images.home.learn.home_learn_01' )) }}" class="img-cover">
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">Organization Name</h2>
                            <p class="cards-amount">category</p>
                            <a href="{{ route('organization.profile') }}" class="btn-blue">Contact</a>
                        </div>
                    </div>
                </article>
            </section>
            <div class="organization-load">
                <a href="#" id="loadMore" class="load-more">View More <i class="fas fa-caret-down"></i></a>
            </div>
    </section>

</section>


@endsection