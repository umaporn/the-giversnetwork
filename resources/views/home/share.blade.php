<section class="share">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <i><img src="{{ asset(config('images.share_icon' )) }}" alt="share"></i>
            <h2 class="topic-light">@lang('share.page_link.index')</h2>
            <span>- Connect to other GIVERS and share ideas, questions, knowledge, and solutions</span>
        </div>
        <div class="cell shrink view-all">
            <a href="{{ route('share.index') }}">
                <span>@lang('button.view_all') @lang('share.page_link.index')</span>
            </a>
        </div>
    </div>
    <div class="grid-x content padding-content">
        <div class="cell">
            <ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
                <li class="tabs-title is-active">
                    <a href="#recent_share" aria-selected="true">@lang('share.recent_share')</a></li>
                <li class="tabs-title"><a href="#challenge">@lang('share.challenge')</a></li>
            </ul>
        </div>
        <div class="cell">
            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                <div class="tabs-panel is-active" id="recent_share">
                    <div class="grid-x grid-margin-x recent-share">
                        @foreach( $data['share'] as $share_item )
                            <article class="cell grid-x medium-12 large-6">
                                <div class="cell small-12 medium-5">
                                    <figure>
                                        <a href="{{ route('share.detail', ['share' => $share_item['id']]) }}">
                                            <img src="{{ $share_item['image_path'] ? $share_item['image_path'] : config('images.placeholder.300x180') }}" alt="{{ $share_item['title'] }}">
                                        </a>
                                    </figure>
                                </div>
                                <div class="cell grid-x small-12 medium-7">
                                    <a href="{{ route('share.detail', ['share' => $share_item['id']]) }}">
                                        <h4 class="cell">{{ $share_item['title'] }}</h4>
                                    </a>
                                    <div class="cell grid-x align-self-bottom">
                                        <div class="cell auto profile">
                                            <a href="{{ route('user.getUserProfile', ['id' => $share_item->users['id']]) }}" target="_blank">
                                                <figure class="display-profile">
                                                    <img src="{{ $share_item->users['image_path'] ? Storage::url($share_item->users['image_path'] ) : asset(config('images.home.profile.user_profile' )) }}"
                                                         alt="{{ $share_item->users['username'] }}">
                                                </figure>
                                                <span>{{ $share_item->users['username'] }}</span>
                                            </a>
                                        </div>
                                        <div class="cell shrink like">
                                            <i class="far fa-thumbs-up"></i>
                                            <span>{{ count( $share_item->shareLike ) }} likes</span>
                                        </div>
                                        <div class="cell shrink comment">
                                            <i class="far fa-comments"></i>
                                            <span>{{ count( $share_item->shareComment ) }} comments</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                <div class="tabs-panel" id="challenge">
                    <div class="grid-x grid-margin-x challenge">
                        @foreach( $data['challenge'] as $challenge_item )
                            <article class="cell small-12 medium-4">
                                <figure>
                                    <a href="{{ route('challenge.detail', ['challenge' => $challenge_item['id']]) }}">
                                        <img src="{{ $challenge_item['file_path'] ? $challenge_item['file_path'] : config('images.placeholder.700x400') }}" alt="{{ $challenge_item['title'] }}">
                                    </a>
                                </figure>
                                <a href="{{ route('challenge.detail', ['challenge' => $challenge_item['id']]) }}">
                                    <h3>{{ $challenge_item['title'] }}</h3></a>
                                <span class="category">{{ $challenge_item['category_title'] }}</span>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>