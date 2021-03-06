<div id="content-list-box">
    <div class="grid-x grid-margin-x">
        @foreach( $comment as $comment_item )
            <article class="cell small-12 comment-login">
                <div class="comment-login-user">
                    <a href="{{ route('user.getUserProfile', ['id' => $comment_item->users['id']]) }}" target="_blank">
                        <figure class="display-profile">
                            <img src="{{ $comment_item->users['image_path'] ? Storage::url($comment_item->users['image_path'] ) : asset(config('images.home.profile.user_profile' )) }}"
                                 alt="{{ $comment_item->users['username'] }}">
                        </figure>
                    </a>
                </div>
                <div class="comment-login-detail">
                    <div class="comment-login-grid">
                        <div class="comment-login-username">
                            <a href="{{ route('user.getUserProfile', ['id' => $comment_item->users['id']]) }}" target="_blank">
                                <p class="comment-name">{{ $comment_item->users['username'] }}</p>
                            </a>
                        </div>
                        <time datetime="2019-04-29">
                            <i class="far fa-calendar-alt"></i> {{ $comment_item['public_date'] }}
                        </time>
                    </div>
                    <div class="comment-login-content">
                        {{ $comment_item['comment_text'] }}
                        @if( Auth::user() &&  Auth::user()->fk_permission_id == '1')
                            <form class="deletion float-right" id="comment-deletion-{{ $loop->iteration }}"
                                  data-info="{{ $comment_item->id }}"
                                  data-deletion-confirmation-message="@lang('share.comment.remove_confirmation')"
                                  method="POST" action="{{ route('share.removeComment', ['comment' => $comment_item ]) }}"
                            >
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="id" value="{{ $comment_item->id }}">
                                <button type="submit" class="cursor-pointer" title="@lang('share.comment.remove')">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </article>
        @endforeach
        <div class="cell small-12">
            <a data-url="{{ $comment->nextPageUrl() }}" id="loadMore" class="load-more">@lang('button.view_more')
                <i class="fas fa-caret-down"></i>
            </a>
        </div>
    </div>
</div>