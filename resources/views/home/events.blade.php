<section class="events padding-content">
    <div class="grid-x align-middle">
        <h2 class="cell auto topic-dark">@lang('events.page_link.index')</h2>
        <div class="cell shrink view-all">
            <a href="{{ route('events.index') }}">
                <span>@lang('button.view_all') @lang('events.page_link.index')</span>
            </a>
        </div>
    </div>
    <div class="grid-x grid-margin-x">
        @foreach( $data['events'] as $events_item )
            <article class="cell small-12 medium-4">
                <a href="{{ route('events.detail', ['events' => $events_item['id']]) }}">
                    <figure class="cover">
                        <img src="{{ $events_item['image_path'] ? $events_item['image_path'] : config('images.placeholder.700x400') }}" alt="{{ $events_item['title'] }}">
                        <figcaption>
                            <time datetime="{{ $events_item['event_date'] }}">{{ $events_item['event_date'] }}</time>
                        </figcaption>
                    </figure>
                </a>
                <a href="{{ route('events.detail', ['events' => $events_item['id']]) }}">
                    <h3>{{ $events_item['title'] }}</h3>
                </a>
                <div class="profile">
                    {{--                    <figure class="display-profile">--}}
                    {{--                        <img src="{{ $events_item['host_image'] }}" alt="">--}}
                    {{--                    </figure>--}}
                    @if($events_item['hostname'])
                        <span>Host by {{ $events_item['hostname'] }}</span>
                    @endif
                </div>
            </article>
        @endforeach
    </div>
</section>