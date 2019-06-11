@extends('layouts.app')

@section('page-title', __('give.page_title.index'))
@section('page-description', __('give.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')

<section class="give article">
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
                    <li><a href="#">Give - Food non-perishable</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> Ramen Noodles
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
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-5 xlarge-3">
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
                <div class="cell small-12 medium-offset-4 xlarge-offset-6 medium-3">
                    <div class="give-cat-btn">
                        <a href="#" class="btn-blue">
                            <i class="fas fa-plus"></i> Give Item
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cell small-12">
            <article class="give-product">
                <div class="grid-x grid-margin-x">
                    <div class="cell small-12 large-6">
                        fddd
                    </div>
                    <div class="cell small-12 large-6">
                        <div class="profile">
                            <a href="{{ route('users.myProfile') }}" target="_blank">
                                <figure class="display-profile">
                                    <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                </figure>
                                <span>username</span>
                            </a>
                        </div>
                        <h2 class="give-product-topic">Ramen Noodles</h2>
                        <div class="give-product-detail">
                            <p class="cards-amount">100 items</p>
                            <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i> 29 April 2019</time>
                        </div>
                    </div>
                </div>
            </article>
    </section>
</section>
@endsection