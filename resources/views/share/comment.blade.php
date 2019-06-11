<div id="show-comment-box">
    <div class="grid-x grid-margin-x" id="comment-count">
        <h2 class="cell topic-dark">{{ count( $data->shareComment ) }} Comments</h2>
    </div>
    @if($comment->isNotEmpty())
        @include('share.comment_list')
    @endif
</div>