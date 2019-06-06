@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')
<section class="user">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <h2 class="topic-light">Create Thread</h2>
        </div>
    </div>
    <nav class="grid-x padding-breadcrumbs">
        <div class="cell auto">
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> Create Thread
                </li>
            </ul>
        </div>
    </nav>
    <div class="grid-x padding-content">
        <div class="cell small-12">
            <h2 class="topic-dark">New Thread</h2>
            <form action="" class="form-onerow">
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="topic" class="form-label">Topic</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="text" id="topic" class="form-fill" value="">
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="description" class="form-label">Description</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <textarea id="description" class="form-fill" rows="3"></textarea>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="imageProfile" class="form-label">Image</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <div class="form-file-image">
                            <div class="form-file">
                                <input type="file" class="form-fileupload" id="file-image-multi" multiple
                                    data-maxfile="1024" />
                                <div class="form-file-style">
                                    <div class="form-flex btn-blue">Browse</div>
                                    <p class="form-flex show-text">maximum upload : 10 and file size: 1MB/Image</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="imageProfile" class="form-label">File</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <label class="form-file">
                            <input type="file" class="form-fileupload" id="file-pdf" data-maxfile="5120" />
                            <div class="form-file-style">
                                <div class="form-flex btn-blue">Browse</div>
                                <p class="form-flex show-text">PDF file only and maximun upload file size: 5MB</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-offset-2 large-9">
                        <button class="btn-green btn-long">Create Thread</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection