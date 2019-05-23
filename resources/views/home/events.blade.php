<section class="events padding-content">
    <div class="grid-x align-middle">
        <h2 class="cell auto topic-dark">@lang('events.page_link.index')</h2>
        <div class="cell shrink view-all">
            <a href="#">
                <span>@lang('button.view_all')</span>
                <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
            </a>
        </div>
    </div>
    <div class="grid-x grid-margin-x">
        @foreach( $events as $events_item )
            <article class="cell small-12 medium-4">
                <figure class="cover">
                    <img src="{{ $events_item['image_path'] }}" alt="{{ $events_item['title'] }}">
                    <figcaption>
                        <time datetime="2019-04-29 12:00">{{ $events_item['event_date'] }}</time>
                    </figcaption>
                </figure>
                <a href="#"><h3>{{ $events_item['title'] }}</h3></a>
                <div class="profile">
                    <figure class="display-profile">
                        <img src="{{ asset(config('images.home.profile.user_profile' )) }}" alt="">
                    </figure>
                    <span>By {{ $events_item['hostname'] }}</span>
                </div>
            </article>
        @endforeach
    </div>
</section>