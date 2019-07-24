@extends('admin.layouts.app')

@section('page-title', __('organization_admin.page_title.edit'))
@section('page-description', __('organization_admin.page_description.edit'))

@section('content')
    <section class="admin">
        <div class="grid-x align-middle topic padding-content">
            <div class="cell auto">
                <h2 class="topic-light">@lang('organization_admin.page_title.index')</h2>
            </div>
        </div>
        <nav class="grid-x padding-breadcrumbs">
            <div class="cell auto">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('admin.home.index') }}">@lang('admin.page_title.index')</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> @lang('organization_admin.page_title.index')
                    </li>
                </ul>
            </div>
        </nav>
        <div class="grid-x padding-content">
            <div class="cell auto">
                <div class="grid-x">
                    <div class="cell small-12 large-3 xxlarge-2 show-for-large">
                        @include('admin.layouts.side_menu')
                    </div>
                    <div class="cell small-12 large-9 xxlarge-10">
                        <article class="user-content">
                            <div class="grid-x">
                                <div class="cell small-12">
                                    <div class="grid-x user-form-space">
                                        <h2 class="cell shrink user-head">@lang('organization_admin.edit_organization')</h2>
                                        <div class="cell auto grid-x align-middle">
                                            <div class="cell line auto"></div>
                                            <div class="cell shrink">
                                                <span class="outline-dot float-right"><span class="dot"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell small-12">
                                    <form action="{{ route('admin.organization.update', ['organization' => $organization->id ]) }}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                          class="submission-form"
                                    >
                                        @method('PUT')
                                        {{ csrf_field() }}
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="name_thai" class="form-label">@lang('organization_admin.name_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="name_thai" class="form-fill" name="name_thai" value="{{ $organization->name_thai }}">
                                                <p id="name_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="topic" class="form-label">@lang('organization_admin.name_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="text" id="name_english" class="form-fill" name="name_english" value="{{ $organization->name_english }}">
                                                <p id="name_english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="content_thai" class="form-label">@lang('organization_admin.content_thai')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="content-tinymce-thai" class="form-fill" name="content_thai" rows="3">{{ $organization->content_thai }}</textarea>
                                                <p id="content_thai-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="content_english" class="form-label">@lang('organization_admin.content_english')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="content-tinymce-english" class="form-fill" name="content_english" rows="3">{{ $organization->content_english }}</textarea>
                                                <p id="content-tinymce-english-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="image" class="form-label">@lang('organization_admin.image')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                @if($organization->image_path)
                                                    <div class="padding-bottom-1">
                                                        <img src="{{ Storage::url($organization->image_path) }}" width="200" alt="@lang('organization_admin.image')">
                                                    </div>
                                                @endif
                                                <div class="form-file-image">
                                                    <div class="form-file">
                                                        <input type="file" class="form-fileupload" id="image_path" name="image_path[]"
                                                               data-maxfile="5,120"/>
                                                        <div class="form-file-style">
                                                            <div class="form-flex btn-blue">@lang('organization_admin.browse')</div>
                                                            <p class="form-flex show-text">@lang('organization_admin.image_condition')</p>
                                                        </div>
                                                        <p id="file_path-help-text" class="alert help-text help-text hide"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="category" class="form-label">@lang('organization_admin.category')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <select class="form-select white" id="fk_category_id" name="fk_category_id">
                                                    <option>@lang('organization_admin.type_of_organization')</option>
                                                    @foreach( $organizationCategory as $organizationCategoryItem )
                                                        <option value="{{ $organizationCategoryItem['id'] }}"
                                                                {{ ( $organization->fk_category_id === $organizationCategoryItem['id'] ) ? 'selected' : ''  }}
                                                        >
                                                            {{ $organizationCategoryItem['title_english'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p id="fk_category_id-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>

                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="email" class="form-label">@lang('organization_admin.email')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="email" id="email" class="form-fill" name="email" value="{{ $organization->email }}">
                                                <p id="email-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="phone" class="form-label">@lang('organization_admin.phone')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="tel" id="phone_number" name="phone_number" class="form-fill" value="{{ $organization->phone_number }}">
                                                <p id="phone_number-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="address" class="form-label">@lang('organization_admin.address')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <textarea id="address" name="address" class="form-fill" rows="3">{{ $organization->address }}</textarea>
                                                <p id="address-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="website" class="form-label">@lang('organization_admin.website')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="tel" id="website" name="website" class="form-fill" value="{{ $organization->website }}">
                                                <p id="website-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="facebook" class="form-label">@lang('organization_admin.facebook')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="tel" id="facebook" name="facebook" class="form-fill" value="{{ $organization->facebook }}">
                                                <p id="facebook-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="twitter" class="form-label">@lang('organization_admin.twitter')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="tel" id="twitter" name="twitter" class="form-fill" value="{{ $organization->twitter }}">
                                                <p id="twitter-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="youtube" class="form-label">@lang('organization_admin.youtube')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="tel" id="youtube" name="youtube" class="form-fill" value="{{ $organization->youtube }}">
                                                <p id="youtube-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="instagram" class="form-label">@lang('organization_admin.instagram')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="tel" id="instagram" name="instagram" class="form-fill" value="{{ $organization->instagram }}">
                                                <p id="instagram-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-2">
                                                <label for="linked_in" class="form-label">@lang('organization_admin.linked_in')</label>
                                            </div>
                                            <div class="cell small-12 large-9">
                                                <input type="tel" id="linked_in" name="linked_in" class="form-fill" value="{{ $organization->linked_in }}">
                                                <p id="linked_in-help-text" class="alert help-text help-text hide"></p>
                                            </div>
                                        </div>
                                        <div class="grid-x grid-padding-x user-form-space">
                                            <div class="cell small-12 large-offset-2 large-9">
                                                <button class="btn-green btn-long">@lang('organization_admin.edit_organization')</button>
                                            </div>
                                        </div>
                                    </form>

                                    {{-- File upload form for TinyMCE Editor --}}
                                    <form id="tinymce-uploadform" action="{{ route('admin.image.upload') }}">
                                        {{ csrf_field() }}
                                        <input id="tinymce-uploadfile" type="file" name="image"/>
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