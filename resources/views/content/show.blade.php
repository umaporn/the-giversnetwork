@extends('layouts.app')

@section('page-title', __('content.page_title.show'))
@section('page-description', __('content.page_description.show'))
@section('view-id', 'CONTENT-SHOW-001')
@section('page-icon', 'fi-page')

@section('content')

    <div class="row column">
        <label>Choose category
            <select>
                <option value=""></option>
            </select>
        </label>
    </div>

    <div class="row columns">
        show title
    </div>

@endsection