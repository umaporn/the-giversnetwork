@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')
<section class="give create">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <i class="fas fa-gift"></i>
            <h2 class="topic-light">Give</h2>
        </div>
    </div>
    <nav class="grid-x padding-breadcrumbs">
        <div class="cell auto">
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li><a href="#">Give</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> Give Items or Receive
                </li>
            </ul>
        </div>
    </nav>
    <div class="grid-x padding-content">
        <div class="cell small-12">
            <h2 class="topic-dark">GIVE ITEM OR RECEIVE</h2>
            <form action="" class="form-onerow">
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="choose" class="form-label">Choose</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <select class="form-select light">
                            <option value="" selected>Give item</option>
                            <option value="receive">Receive</option>
                        </select>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="choose" class="form-label">Category</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <select class="form-select light">
                            <option value="" selected>Food non-perishable</option>
                        </select>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="text" id="name" class="form-fill" value="">
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="amount" class="form-label">Amount</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="number" id="amount" class="form-fill" value="">
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="address" class="form-label">Address</label>
                    </div>
                    <div class="cell small-12 large-9 align-self-middle">
                        <input id="useInProfile" type="checkbox"><label for="use-in-profile">Use address in my
                            profile</label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                    </div>
                    <div class="cell small-12 large-9">
                        <textarea id="address" class="form-fill" rows="3"></textarea>
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
                                    <p class="form-flex show-text">maximum file size: 1MB/Image</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-offset-2 large-9">
                        <button class="btn-green btn-long">Publish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection