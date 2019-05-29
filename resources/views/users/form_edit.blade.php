<article class="user-content">
    <div class="grid-x">
        <div class="cell small-12">
            <form action="" class="user-form">
                <div class="grid-x user-form-space">
                    <h2 class="cell shrink user-head">Account</h2>
                    <div class="cell auto grid-x align-middle">
                        <div class="cell line auto"></div>
                        <div class="cell shrink">
                            <span class="outline-dot float-right"><span class="dot"></span></span>
                        </div>
                    </div>
                </div>
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
            </form>
        </div>
        <div class="cell small-12">
            <form class="user-form">
                <div class="grid-x user-form-space">
                    <h2 class="cell shrink user-head">Profile</h2>
                    <div class="cell auto grid-x align-middle">
                        <div class="cell line auto"></div>
                        <div class="cell shrink">
                            <span class="outline-dot float-right"><span class="dot"></span></span>
                        </div>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="imageUpload" class="form-label">Image</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <div class="form-imageupload">
                            <div class="form-imageupload-show">
                                <figure class="form-image">
                                    <img src="{{ asset(config('images.home.profile.user_profile' )) }}">
                                </figure>
                            </div>
                            <div>
                                <label for="imageUpload" class="btn-blue btn-upload">Upload File</label>
                                <input type="file" id="imageUpload" class="show-for-sr">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="firstname" class="form-label">First Name</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="text" id="firstname" class="form-fill" value="">
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="lastname" class="form-label">Last Name</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="text" id="lastname" class="form-fill" value="">
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
                        <label for="tel" class="form-label">Phone</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="tel" id="tel" class="form-fill" value="">
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
                            <input type="text" id="company" class="input-group-field form-fill" value="" placeholder="Fill Your Organization Name">
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
                        <button class="btn-green btn-long">Save</button>
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
</article>