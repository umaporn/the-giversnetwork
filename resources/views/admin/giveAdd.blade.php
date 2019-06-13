@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')
<section class="admin">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <h2 class="topic-light">Admin</h2>
        </div>
    </div>
    <nav class="grid-x padding-breadcrumbs">
        <div class="cell auto">
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li><a href="#">Admin</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> Give
                </li>
            </ul>
        </div>
    </nav>
    <div class="grid-x padding-content">
        <div class="cell auto">
            <div class="grid-x">
                <div class="cell small-12 large-3 xxlarge-2 show-for-large">
                    @include('admin.menu_admin')
                </div>
                <div class="cell small-12 large-9 xxlarge-10">
                    <article class="user-content">
                        <div class="grid-x">
                            <div class="cell small-12">
                                <div class="grid-x user-form-space">
                                    <h2 class="cell shrink user-head">Add Give or Recive</h2>
                                    <div class="cell auto grid-x align-middle">
                                        <div class="cell line auto"></div>
                                        <div class="cell shrink">
                                            <span class="outline-dot float-right"><span class="dot"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cell small-12">
                                <form action="">
                                    <div class="grid-x grid-padding-x user-form-space">
                                        <div class="cell small-12 large-2">
                                            <label for="product" class="form-label">Category</label>
                                        </div>
                                        <div class="cell small-12 large-9">
                                            <select class="form-select white">
                                                <option value="Give Item">Give Item</option>
                                                <option value="Recive Item">Recive Item</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid-x grid-padding-x user-form-space">
                                        <div class="cell small-12 large-2">
                                            <label for="username" class="form-label">ID</label>
                                        </div>
                                        <div class="cell small-12 large-9 form-text">
                                            00019
                                        </div>
                                    </div>
                                    <div class="grid-x grid-padding-x user-form-space">
                                        <div class="cell small-12 large-2">
                                            <label for="product" class="form-label">Product Name</label>
                                        </div>
                                        <div class="cell small-12 large-9">
                                            <input type="text" id="product" class="form-fill" value="">
                                        </div>
                                    </div>
                                    <div class="grid-x grid-padding-x user-form-space">
                                        <div class="cell small-12 large-2">
                                            <label for="quantity" class="form-label">Quantity</label>
                                        </div>
                                        <div class="cell small-12 large-9">
                                            <input type="number" id="quantity" class="form-fill" value="">
                                        </div>
                                    </div>
                                    <div class="grid-x grid-padding-x user-form-space">
                                        <div class="cell small-12 large-2">
                                            <label for="address" class="form-label">Address</label>
                                        </div>
                                        <div class="cell small-12 large-9">
                                            <textarea id="address" class="form-fill" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="grid-x grid-padding-x user-form-space">
                                        <div class="cell small-12 large-2">
                                            <label for="des" class="form-label">Desciption</label>
                                        </div>
                                        <div class="cell small-12 large-9">
                                            <textarea id="des" class="form-fill" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="grid-x grid-padding-x user-form-space">
                                        <div class="cell small-12 large-2">
                                            <label for="product" class="form-label">Expired Date</label>
                                        </div>
                                        <div class="cell small-12 large-9">
                                            <select class="form-select white">
                                                <option value="5">5 days</option>
                                                <option value="15">15 days</option>
                                                <option value="30">30 days</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid-x grid-padding-x user-form-space">
                                        <div class="cell small-12 large-2">
                                            <label for="imageProfile" class="form-label">Image</label>
                                        </div>
                                        <div class="cell small-12 large-9">
                                            <div class="form-file-image">
                                                <div class="form-file">
                                                    <input type="file" class="form-fileupload" id="file-image-multi"
                                                        multiple data-maxfile="1024" />
                                                    <div class="form-file-style">
                                                        <div class="form-flex btn-blue">Browse</div>
                                                        <p class="form-flex show-text">maximum upload : 10 and file
                                                            size: 1MB/Image</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-x grid-padding-x user-form-space">
                                        <div class="cell small-12 large-2">
                                            <label class="form-label">Approval</label>
                                        </div>
                                        <div class="cell small-12 large-9 form-text">
                                            <input id="approve" type="checkbox">
                                            <label for="approve">Approved this item to publish on TGN website</label>
                                        </div>
                                    </div>
                                    <div class="grid-x grid-padding-x user-form-space">
                                        <div class="cell small-12 large-offset-2 large-9">
                                            <button class="btn-green btn-long">Add</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection