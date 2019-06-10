@extends('layouts.app')

@section('page-title', __('events.page_title.index'))
@section('page-description', __('events.page_description.index'))
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
    <section class="grid-x padding-content align-center">
        <div class="cell small-10 medium-10 large-8 search">
            <input type="text" class="search-text" placeholder="Search">
            <button type="submit" class="search-button">
                <i class="fa fa-search"></i>
            </button>
        </div>
        <div class="cell small-6">
            <label>CATEGORY
                <select>
                    <option value="food-non-perishable">Food non-perishable</option>
                    <option value="xxx">xxx</option>
                    <option value="xxx">xxx</option>
                    <option value="xxx">xxx</option>
                </select>
            </label>
        </div>
        <div class="cell small-6">
            <a href="#" class="btn-blue">
                <i class="fas fa-plus"></i> Give Item
            </a>
        </div>
        <div class="cell small-12">
            <ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
                <li class="tabs-title is-active"><a href="#panel1c" aria-selected="true">Give</a></li>
                <li class="tabs-title"><a href="#panel2c">Receive</a></li>
            </ul>
            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                <div class="tabs-panel is-active" id="panel1c">
                    <div class="card">
                        <div class="grid-container">
                            <div class="grid-x grid-padding-x small-up-2 medium-up-3">
                                <div class="cell">
                                    <div class="card">
                                        <img src="assets/img/generic/rectangle-1.jpg">
                                        <div class="card-section">
                                            <h4>This is a row of cards.</h4>
                                            <p>This row of cards is embedded in an X-Y Block Grid.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell">
                                    <div class="card">
                                        <img src="assets/img/generic/rectangle-1.jpg">
                                        <div class="card-section">
                                            <h4>This is a card.</h4>
                                            <p>It has an easy to override visual style, and is appropriately subdued.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell">
                                    <div class="card">
                                        <img src="assets/img/generic/rectangle-1.jpg">
                                        <div class="card-section">
                                            <h4>This is a card.</h4>
                                            <p>It has an easy to override visual style, and is appropriately subdued.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel2c">
                        2
                    </div>
                </div>
            </div>

    </section>


</section>


@endsection