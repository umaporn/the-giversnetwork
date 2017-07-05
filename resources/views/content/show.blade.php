@extends('layouts.app')

@section('page-title', __('content.page_title.show'))
@section('page-description', __('content.page_description.show'))
@section('view-id', 'CONTENT-SHOW-001')
@section('page-icon', 'fi-page')

@section('content')

    @include('content.filter')

    @include('layouts.breadcrumbs')

    <div class="row">
        <div class="medium-9 columns">
            <div class="content-post">
                <div class="content-date">5th July, 2017</div>
                <h1 class="post-title">This is an example of a content title for a post</h1>
                <img src="http://placehold.it/850x350/fcc066/fff">
                <hr>
                <p>Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim
                   congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci.
                   Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum.
                   Nulla at nulla justo, eget luctus.
                </p>
                <p>Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim
                   congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci.
                   Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum.
                   Nulla at nulla justo, eget luctus.
                </p>
                <p>Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim
                   congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci.
                   Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum.
                   Nulla at nulla justo, eget luctus.
                </p>
                <p>Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim
                   congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci.
                   Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum.
                   Nulla at nulla justo, eget luctus.
                </p>
                <div class="callout">
                    <div class="content-author"><strong>Author:&nbsp;</strong>Author Name</div>
                    <div class="content-date"><strong>Date:&nbsp;</strong>5th July, 2017</div>
                </div>
            </div>
        </div>
        <div class="medium-3 columns">
            @include('content.sidebar')
        </div>
    </div>

@endsection