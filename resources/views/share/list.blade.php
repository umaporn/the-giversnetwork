<div id="content-list-box">
    @foreach( $data['share'] as $share_item )
        <article class="cell grid-x small-12 share-space">
            <div class="cell small-3 medium-2">
                <figure class="share-image">
                    <a href="{{ route('share.detail', ['share' => $share_item['id']]) }}">
                        <img src="{{ $share_item['image_path'] ? $share_item['image_path'] : config('images.placeholder.300x180') }}"
                             alt="{{ $share_item['title'] }}">
                    </a>
                </figure>
            </div>
            <div class="cell grid-x small-9 medium-10">
                <a href="{{ route('share.detail', ['share' => $share_item['id']]) }}">
                    <h4 class="cell">{{ $share_item['title'] }}</h4>
                </a>
                <div class="cell grid-x share-grid">
                    <div class="profile">
                        <a href="{{ route('user.getProfile') }}" target="_blank">
                            <figure class="display-profile">
                                <img src="{{ $share_item->users['image_path'] ? Storage::url($share_item->users['image_path'] ) : asset(config('images.home.profile.user_profile' )) }}"
                                     alt="{{ $share_item->users['username'] }}">
                            </figure>
                            <span>{{ $share_item->users['username'] }}</span>
                        </a>
                    </div>
                    <div class="like">
                        <i class="far fa-thumbs-up"></i>
                        <span>{{ count( $share_item->shareLike ) }} likes</span>
                    </div>
                    <div class="comment">
                        <i class="far fa-comments"></i>
                        <span>{{ count( $share_item->shareComment ) }} comments</span>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
    <a data-url="{{ $data['share']->nextPageUrl() }}" id="loadMore" class="load-more">@lang('button.view_more')
        <i class="fas fa-caret-down"></i>
    </a>
</div>
