<div class="share-like" id="show-like-box">
    @if(Auth::guest())
        <a class="share-like-click" data-open="login">
            <div><i class="far fa-thumbs-up"></i></div>
            <p>{{ count($data->shareLike) }} @lang('share.likes_this_thread')</p>
        </a>
    @else
        <form id="like-action" action="{{ route('share.saveLike', [ 'share' => $data['id'] ]) }}" method="POST">
            {{ csrf_field() }}
            <button class="share-like-click share-like-button" type="submit">
                <div @if($isLike) class="is-active" @endif>
                    <i class="far fa-thumbs-up"></i>
                </div>
                <p>{{ count($data->shareLike) }} @lang('share.likes_this_thread')</p>
            </button>
            <input type="hidden" name="fk_user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="fk_share_id" value="{{ $data['id'] }}">
            <input type="hidden" name="count" value="1">
        </form>
    @endif
</div>