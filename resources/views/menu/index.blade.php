@extends('layouts.app')

@section('page-title', __('menu.page_title.index'))
@section('page-description', __('menu.page_description.index'))
@section('view-id', 'MENU-001')

@section('content')
    <div class="row columns">
        <div class="content-box">
            <div class="row columns small-centered">
                <form id="search-form" method="GET" action="{{ route('menu.index') }}">
                    <ul class="menu float-right">
                        {{ csrf_field() }}
                        <li>
                            <select name="translation_key">
                                <option value="all">@lang('menu.select_page')</option>
                                @foreach( $translation as $key=>$value )
                                        <option value="{{ $key }}"
                                                @if( old( 'translation_key' ) === $key )
                                                selected
                                                @endif
                                        >
                                            {{ $key }}
                                        </option>
                                    @endforeach
                            </select>
                        </li>
                        <li>
                            <input name="search" type="search" placeholder="@lang( 'menu.search_box' )"
                                   value="{{ old( 'search' ) }}"
                            >
                        </li>
                        <li>
                            <button type="submit" class="image button has-tip"
                                    data-tooltip aria-haspopup="true" data-disable-hover="false"
                                    title="@lang( 'button.search' )"
                            >
                                @lang('button.search')
                            </button>
                        </li>
                    </ul>
                </form>
                <form class="submission-form" method="GET" action="{{ route('menu.getlist') }}">
                    <button type="submit" class="image button has-tip"
                            data-tooltip aria-haspopup="true" data-disable-hover="false"
                            title="@lang( 'menu.load_new_translation' )"
                    >
                        @lang('menu.load_new_translation')
                    </button>
                </form>

            </div>
            <div class="row">
                <div class="small-12 columns">
                    <div id="data" class="row medium-up-2 large-up-3" data-equalizer data-equalize-by-row="true">

                        @include('menu.datalist', [ 'translation' => $translation ])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
