<div id="content-list-box">
    @foreach( $data['share'] as $share_item )
        <article class="grid-x share-space">
            <div class="cell small-12 medium-6">
                <figure class="share-image">
                    <a href="{{ route('share.detail', ['share' => $share_item['id']]) }}">
                        <img src="{{ isset( $share_item->shareImage[0] ) ? $share_item->shareImage[0]['thumbnail_path'] : config('images.placeholder.700x400') }}"
                             alt="{{ $share_item['title'] }}">
                    </a>
                </figure>
            </div>
            <div class="cell small-9 medium-6">
                <a href="{{ route('share.detail', ['share' => $share_item['id']]) }}">
                    <h4 class="cell">{{ $share_item['title'] }}</h4>
                </a>
                <p>{{ $share_item['description'] }}</p>
                <div class="cell grid-x share-grid">
                    <div class="profile">
                        <a href="{{ route('user.getUserProfile', ['id' => $share_item->users['id']]) }}" target="_blank">
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
                <div class="grid-x padding-top-1">
                    @foreach( $share_item['share_interest'] as $shareInterestInItem )
                        <div class="padding-right-1">
                        <img src="{{ Storage::url($shareInterestInItem->image_path) }}"
                             alt=" {{$shareInterestInItem->title_english}}" width="40" height="40"
                        >
                        </div>
                    @endforeach
                </div>
            </div>
        </article>
    @endforeach
    @if($data['share']->total())
        <a data-url="{{ $data['share']->nextPageUrl() }}" id="loadMore" class="load-more">@lang('button.view_more')
            <i class="fas fa-caret-down"></i>
        </a>
    @endif
</div>
