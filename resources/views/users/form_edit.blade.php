<form class="submission-form user-form" method="POST" action="{{ route('user.updateProfile') }}">
    {{ csrf_field() }}
    <article class="user-content">
        <div class="grid-x">

            <div class="cell small-12">
                <div class="grid-x user-form-space">
                    <h2 class="cell shrink user-head">@lang('user.account')</h2>
                    <div class="cell auto grid-x align-middle">
                        <div class="cell line auto"></div>
                        <div class="cell shrink">
                            <span class="outline-dot float-right"><span class="dot"></span></span>
                        </div>
                        <button class="btn-blue margin-left-1"><i class="fas fa-pen"></i> @lang('user.edit')</button>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="username" class="form-label">@lang('user.username')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="text" name="username" id="username" class="form-fill" value="{{ $user[0]->username }}">
                        <p id="username-help-text" class="alert help-text hide"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="password" class="form-label">@lang('user.password')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="text" name="password" id="password" class="form-fill" value="">
                        <p id="password-help-text" class="alert help-text hide"></p>
                    </div>
                </div>
            </div>
            <div class="cell small-12">
                <div class="grid-x user-form-space">
                    <h2 class="cell shrink user-head">@lang('user.profile')</h2>
                    <div class="cell auto grid-x align-middle">
                        <div class="cell line auto"></div>
                        <div class="cell shrink">
                            <span class="outline-dot float-right"><span class="dot"></span></span>
                        </div>
                        <button class="btn-blue margin-left-1"><i class="fas fa-pen"></i> @lang('user.edit')</button>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="imageUpload" class="form-label">@lang('user.image')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <div class="form-imageupload">
                            <div class="form-imageupload-show">
                                <figure class="form-image">
                                    @if($user[0]->image_path)
                                        <img src="{{ Storage::url($user[0]->image_path) }}" width="200" alt="@lang('avatar')">
                                    @else
                                        <img src="{{ asset(config('images.home.profile.user_profile' )) }}" alt="">
                                    @endif
                                </figure>
                            </div>
                            <div>
                                <label for="image_path" class="btn-blue btn-upload">@lang('user.upload_file')</label>
                                <input type="file" name="image_path" id="image_path" class="show-for-sr">
                                <p id="image_path-help-text" class="alert help-text hide"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="firstname" class="form-label">@lang('user.firstName')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="text" name="firstname" id="firstname" class="form-fill" value="{{ $user[0]->firstname }}">
                        <p id="firstname-help-text" class="alert help-text hide"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="lastname" class="form-label">@lang('user.lastName')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="text" name="lastname" class="form-fill" id="lastname" value="{{ $user[0]->lastname }}">
                        <p id="lastname-help-text" class="alert help-text hide"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="email" class="form-label">@lang('user.email')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="text" name="email" class="form-fill" id="email" value="{{ $user[0]->email }}">
                        <p id="email-help-text" class="alert help-text hide"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="tel" class="form-label">@lang('user.phone_number')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <input type="tel" name="phone_number" id="phone_number" class="form-fill" value="{{ $user[0]->phone_number }}">
                        <p id="phone_number-help-text" class="alert help-text hide"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="address" class="form-label">@lang('user.address')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <textarea id="address" name="address" class="form-fill" rows="3"></textarea>
                        <p id="address-help-text" class="alert help-text hide"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="company" class="form-label">@lang('user.organization')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <div class="input-group">
                        <span class="input-group-field">
                            <select class="form-select" name="fk_organization_category_id" id="fk_organization_category_id">
                                @foreach( $organizationCategoryList as $organizationCategoryItem )
                                    <option value="{{ $organizationCategoryItem->id }}"
                                            {{ ( $user[0]->fk_organization_category_id === $organizationCategoryItem->id ) ? 'selected' : '' }}
                                    > {{ $organizationCategoryItem->title }}
                                @endforeach
                            </select>
                        </span>
                            <input type="text" name="organization_name" class="input-group-field form-fill" id="organization_name" value="{{ $user[0]->organization_name }}">
                            <p id="organization_name-help-text" class="alert help-text hide"></p>
                        </div>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-2">
                        <label for="interested" class="form-label">@lang('user.interest_in')</label>
                    </div>
                    <div class="cell small-12 large-9">
                        <a class="btn-blue" data-open="addInterested">
                            <i class="fas fa-plus"></i> @lang('user.add_my_interested')
                        </a>
                        <ul class="show-interested" id="interest-list">
                            @foreach( $userInterestInList as $userInterestInItem )
                                <li class="item-{{$userInterestInItem['fk_interest_in_id']}}">{{$userInterestInItem['interest_title']}}</li>
                                <input type="hidden" name="fk_interest_in_id[]" id="fk_interest_in_id" class="input-{{ $userInterestInItem['fk_interest_in_id'] }}" value="{{ $userInterestInItem['fk_interest_in_id'] }}">
                            @endforeach
                        </ul>
                        <p id="fk_interest_in_id-help-text" class="alert help-text hide"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x user-form-space">
                    <div class="cell small-12 large-offset-2 large-9">
                        <button class="btn-green btn-long">Save</button>
                    </div>
                </div>
                <div class="reveal modal-style" id="addInterested" data-reveal>
                    <h2 class="modal-topic">@lang('user.interest_in')</h2>
                    <div class="modal-form">
                        <ul class="modal-content">
                            @foreach( $interestList as $interestItem )
                                <li>
                                    <div class="form-checkbox
                                @foreach( $userInterestInList as $userInterestInItem )
                                    @if($interestItem->id === $userInterestInItem['fk_interest_in_id'])
                                            form-checkbox-ed
@endif
                                    @endforeach
                                            ">
                                        <input id="{{ $interestItem->id }}"
                                               data-value="{{ $interestItem->id }}"
                                               data-title="{{ $interestItem->title }}"
                                               type="checkbox" class="checkbox-inter">
                                        <label for="{{ $interestItem->id }}">{{ $interestItem->title }}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <button class="btn-green btn-long" data-close aria-label="Close reveal">Save</button>
                    </div>
                    <button class="close-button" data-close aria-label="Close reveal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </article>
</form>