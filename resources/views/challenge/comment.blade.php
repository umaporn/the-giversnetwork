<div id="show-comment-box">
    <div class="grid-x grid-margin-x" id="comment-count">
        <h2 class="cell topic-dark">{{ count( $data->challengeComment ) }} Comments</h2>
    </div>
    @if($comment->isNotEmpty())
        @include('challenge.comment_list')
    @endif
</div>