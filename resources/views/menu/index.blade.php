@extends('layouts.app')

@section('page-title', __('menu.page_title.index'))
@section('page-description', __('menu.page_description.index'))
@section('view-id', 'MENU-001')

@section('content')
    <div class="row columns">
        <div class="content-box">
            <div class="row">
                <div class="small-12 columns">
                    <div id="data" class="row medium-up-2 large-up-3" data-equalizer data-equalize-by-row="true">
                        <table class="data-table">
                            <thead>
                            <tr>
                                <th class="width-60">{{ trans('menu.menu') }}</th>
                                <th class="width-60">EN</th>
                                <th class="width-10 sortable" data-sortby="type">{{ trans('button.edit') }}</th>
                                <th class="width-10 sortable" data-sortby="type">{{ trans('button.delete') }}</th>
                            </tr>
                            </thead>
                            <tbody id="data">
                                @forelse( $menu_list['en'] as $key=>$value )
                                    <tr>
                                        <td class="text-left">{{ $key }}</td>
                                        <td class="text-left">{{ $value }}</td>
                                        <td>
                                            <a href=""  title="{{ trans('button.edit') }}">
                                                {{ trans('button.edit') }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href=""  title="{{ trans('button.delete') }}">
                                                {{ trans('button.delete') }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="not-found">-</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection