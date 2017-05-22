@extends('layouts.app')

@section('page-title', __('menu.page_title.index'))
@section('page-description', __('menu.page_description.index'))
@section('view-id', 'MENU-001')

@section('content')
    <div class="row columns">
        <div class="content-box">
            <div class="row columns small-centered">
                <form id="search-form" method="GET" action="{{ route('menu.index') }}">
                    <ul class="menu  float-right">
                        {{ csrf_field() }}
                        <li>
                            <select name="translation_key">
                                <option value="all">@lang('menu.select_page')</option>
                                @foreach( $translation_list as $key => $value )
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
                <p id="level-help-text" class="alert help-text {{ $errors->has('level') ? '' : 'hide' }}">
                    {{ $errors->has('level') ? $errors->first('level') : '' }}
                </p>
            </div>
            <div class="row">
                <div class="small-12 columns">
                    <div id="data" class="row medium-up-2 large-up-3" data-equalizer data-equalize-by-row="true">

                            @include('menu.datalist', [ 'translation_key' => $translation_key ])


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
