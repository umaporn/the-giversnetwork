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
            <div class="cell small-12 large-8">
                <form id="search-form" class="cell search" method="GET" action="{{ route('give.index') }}">
                    {{ csrf_field() }}
                    <input name="search" type="search" class="search-text" placeholder="Search">
                    <input name="type" type="hidden" value="{{ $type }}">
                    <button type="submit" class="search-button">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="cell small-12 text-center padding-1">
                <h4><a data-open="addInterested"> This section is for you to GIVE or ASK for an item, service, or
                                                  volunteer time. This is the best place to ASK for what your program or
                                                  organization needs, or find a way to GIVE to support a cause or
                                                  project. Please also look at other organizations items as you may have
                                                  something they need. </a></h4>
                <div class="reveal modal-style" id="addInterested" data-reveal>
                    <h2 class="modal-topic">instructions</h2>
                    <div class="modal-form">
                        <div class="modal-content">
                            <div>GIVE tips:</div>
                            <ol>
                                <li>
                                    1. Be specific about what you are giving and if there are restrictions. Eg: “10
                                    packs of toddler diapers available in Pattaya to a registered orphanage.”
                                </li>
                                <li>
                                    2. GIVE your expertise, it can be far more valuable than your labour. Eg: Accountant
                                    offering 8 hours per month bookeeping in Rayong area”.
                                </li>
                            </ol>
                            <div>ASK tips:</div>
                            <ol>
                                <li>
                                    1. If you have a large list of items it is good to break it up ito smaller items so
                                    it is easier for people to browse the summary.
                                </li>
                                <li>
                                    2. Be specific, the more specific you are the easier it is for other GIVERS to
                                    determine if they can help you.
                                    <br>
                                    For example: “ 30 Childrens basic reading books 5-7 year olds in Thai” is a much
                                    clearer ASK then “Children’s books needed.” This will save you time, as GIVERS are
                                    clear on what you need, and donation resources are not wasted by sending the wrong
                                    items.
                                </li>
                                <li>
                                    3. Remember to include the location needed and any delivery requirements as well.
                                    Transportation can be an ASK item as well. “ I need 4 100 x 100 cm boxes weighing
                                    10kg each delivered from Bangkok to Chiang Mai” . The item and the delivery may be
                                    seperate ASKs.
                                </li>
                                <li>
                                    4. Please include your SDG categories this will help members find your listings as
                                    the section grows
                                </li>
                            </ol>
                        </div>
                    </div>
                    <button class="close-button" data-close aria-label="Close reveal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
                                        <option value="{{ route('give.index',  [ 'category_id' => '' ]) }}">@lang('give.give_category_selection')</option>
                                        @foreach( $data['giveCategory'] as $category )
                                            <option value="{{ route('give.index',  [ 'category_id' => $category['id'] ]) }}"
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
            <div class="cell small-12">
                <ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
                    <li class="tabs-title give-tab @if( $type === 'give' ) is-active @endif">
                        <a href="#give" data-url="{{ route('give.list', [ 'type' => 'give', 'category_id' => $category_id ] ) }}" aria-selected="true">
                            @lang('give.page_title.index')
                        </a>
                    </li>
                    <li class="tabs-title receive-tab  @if( $type === 'receive' ) is-active @endif">
                        <a href="#giver" data-url="{{ route('give.list', [ 'type' => 'receive', 'category_id' => $category_id ] ) }}">
                            @lang('give.receive')
                        </a>
                    </li>
                </ul>
                <div class="tabs-content" data-tabs-content="collapsing-tabs" id="give-content">
                    <div class="tabs-panel is-active" id="give">
                        @if( Auth::user() )
                            <div class="give-cat-btn">
                                <a href="{{ route('give.showCreateItemForm') }}" class="btn-blue">
                                    <i class="fas fa-plus"></i> @lang('give.give_item')
                                </a>
                            </div>
                        @endif
                        <div id="give-result-box">
                            @include('give.list')
                        </div>
                    </div>
                    <div class="tabs-panel" id="giver">
                        @if( Auth::user() )
                            <div class="give-cat-btn">
                                <a href="{{ route('give.showCreateItemForm') }}" class="btn-blue">
                                    <i class="fas fa-plus"></i> @lang('give.tell_giver')
                                </a>
                            </div>
                        @endif
                        <div id="receive-result-box">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
