@if($data['events']->total())
    <section class="events">
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
                <article class="cell">
                    <div class="grid-x grid-margin-x large-margin-collapse">
                        <div class="cell small-12 medium-6 large-12">
                            <a href="{{ route('events.detail', ['events' => $events_item['id']]) }}">
                                <figure class="cover">
                                    <img src="{{ $events_item['image_path'] }}" alt="{{ $events_item['title'] }}">
                                    <figcaption>
                                        <time datetime="{{ $events_item['event_date'] }}">{{ $events_item['event_date'] }}</time>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="cell small-12 medium-6 large-12">
                            <a href="{{ route('events.detail', ['events' => $events_item['id']]) }}">
                                <h3>{{ $events_item['title'] }}</h3>
                            </a>
                            <div class="profile">
                                {{--<figure class="display-profile">
                                    <img src="{{ $events_item['host_image'] }}" alt="{{$events_item['hostname']}}">
                                </figure>--}}
                                <span>Host By {{ $events_item['hostname'] }}</span>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endif