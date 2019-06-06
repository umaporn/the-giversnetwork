@extends('layouts.app')

@section('page-title', __('home.page_title.index'))
@section('page-description', __('home.page_description.index'))
@section('page-icon', 'fi-home')

@section('content')
<section class="user">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <h2 class="topic-light">Sign Up</h2>
        </div>
    </div>
    <nav class="grid-x padding-breadcrumbs">
        <div class="cell auto">
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> sign up
                </li>
            </ul>
        </div>
    </nav>
    <div class="grid-x padding-content">
        <div class="cell small-12">
            <h2 class="topic-dark">Create my profile</h2>
            <form action="" class="form-onerow">
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="username" class="form-label">Username</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="text" id="username" class="form-fill" value="">
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="password" id="password" class="form-fill" value="">
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="con-password" class="form-label">Confirm-Password</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="password" id="con-password" class="form-fill" value="">
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="email" id="email" class="form-fill" value="">
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="phone" class="form-label">Phone</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="tel" id="phone" class="form-fill" value="">
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
                        <label for="imageProfile" class="form-label">Image Profile</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <div class="form-file">
                            <input type="file" class="form-fileupload" id="file-image" multiple
                                data-maxfile="1024" />
                            <div class="form-file-style">
                                <div class="form-flex btn-blue">Browse</div>
                                <p class="form-flex show-text">maximun upload file size: 1MB</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="company" class="form-label">Organization</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <div class="input-group">
                            <span class="input-group-field">
                                <select class="form-select">
                                    <option value="" selected>Type of Organization</option>
                                    <option value="giver">Giver</option>
                                    <option value="charitable organization">Charitable Organization</option>
                                    <option value="ngo">NGO</option>
                                    <option value="social enterprise">Social Enterprise</option>
                                    <option value="Philanthropist">Philanthropist</option>
                                    <option value="Other">Other </option>
                                </select>
                            </span>
                            <input type="text" id="company" class="input-group-field form-fill" value=""
                                placeholder="Fill Your Organization Name">
                        </div>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="interested" class="form-label">Interested</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <a class="btn-blue" data-open="addInterested">
                            <i class="fas fa-plus"></i> Add My Interested
                        </a>
                        <ul class="show-interested">
                            <li>Children</li>
                            <li>Foods</li>
                        </ul>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-offset-2 large-9">
                        <input id="terms" type="checkbox">
                        <label for="terms">Agree with <a href=""> Terms of Service & Privacy</a></label>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-offset-2 large-9">
                        <button class="btn-green btn-long">Sign up</button>
                    </div>
                </div>
            </form>
            <div class="reveal modal-style" id="addInterested" data-reveal>
                <h2 class="modal-topic">Interested</h2>
                <form class="modal-form">
                    <ul class="modal-content">
                        <li>
                            <div class="form-checkbox">
                                <input id="checkbox1" type="checkbox" class="checkbox-inter">
                                <label for="checkbox1">Children</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-checkbox">
                                <input id="checkbox2" type="checkbox" class="checkbox-inter">
                                <label for="checkbox2">Interested</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-checkbox">
                                <input id="checkbox3" type="checkbox" class="checkbox-inter">
                                <label for="checkbox3">Foods</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-checkbox">
                                <input id="checkbox4" type="checkbox" class="checkbox-inter">
                                <label for="checkbox4">Interested 1</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-checkbox">
                                <input id="checkbox5" type="checkbox" class="checkbox-inter">
                                <label for="checkbox5">Interested 2</label>
                            </div>
                        </li>
                    </ul>
                    <button class="btn-green btn-long">Save</button>
                </form>
                <button class="close-button" data-close aria-label="Close reveal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</section>
@endsection