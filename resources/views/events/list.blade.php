<div id="content-list-box">
    @foreach( $data['allList'] as $events_all_list_item )
        <article class="grid-x grid-margin-x grid-margin-y ">
            <div class="cell small-12 medium-6">
                <figure>
                    <a href="{{ route('events.detail', ['id' => $events_all_list_item['id'] ] ) }}">
                        <img src="{{ $events_all_list_item['image_path'] ? $events_all_list_item['image_path'] : config('images.placeholder.700x400') }}" alt="{{ $events_all_list_item['title'] }}" class="img-cover">
                    </a>
                </figure>
            </div>
            <div class="cell small-12 medium-6">
                <a href="{{ route('events.detail', ['id' => $events_all_list_item['id'] ] ) }}">
                    <h3>{{ $events_all_list_item['title'] }}</h3>
                </a>
                <div>
                    <time datetime="{{ $events_all_list_item['event_date'] }}">{{ $events_all_list_item['event_date'] }}</time>
                </div>
                <div class="profile">
                    <figure class="display-profile">
                        <img src="{{ $events_all_list_item['host_image'] }}" alt="{{ $events_all_list_item['host_name'] }}">
                    </figure>
                    <span>By {{ $events_all_list_item['hostname'] }}</span>
                </div>
            </div>
        </article>
    @endforeach

    <a data-url="{{ $data['allList']->nextPageUrl() }}" id="loadMore" class="load-more">@lang('button.view_more')
        <i class="fas fa-caret-down"></i>
    </a>
</div>