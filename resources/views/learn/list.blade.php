<div id="content-list-box">
@foreach( $data['allList'] as $all_list_item )
    <article class="grid-x grid-margin-x grid-margin-y ">
        <div class="cell small-12 medium-6">
            <figure>
                <a href="{{ route('learn.detail', ['id' => $all_list_item['id']]) }}">
                    <img src="{{ $all_list_item['file_path'] ? $all_list_item['file_path'] : config('images.placeholder.700x400') }}" alt="{{ $all_list_item['title'] }}" class="img-cover">
                </a>
            </figure>
        </div>
        <div class="cell small-12 medium-6">
            <a href="{{ route('learn.detail', ['id' => $all_list_item['id']]) }}">
                <h3>{{ $all_list_item['title'] }}</h3>
            </a>
            <p>{{ $all_list_item['content'] }}</p>
        </div>
    </article>
@endforeach

<a data-url="{{ $data['allList']->nextPageUrl() }}" id="loadMore" class="load-more">@lang('button.view_more')
    <i class="fas fa-caret-down"></i>
</a>

</div>