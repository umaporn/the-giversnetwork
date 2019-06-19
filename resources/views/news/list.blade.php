<div id="content-list-box">
    @foreach( $data['allList'] as $news_items )
        <article class="grid-x grid-margin-x grid-margin-y ">
            <div class="cell small-12 medium-6">
                <figure>
                    <a href="{{ route('news.detail', ['news' => $news_items['id']]) }}">
                        <img src="{{ $news_items['image_path'] }}"
                             alt="{{ $news_items['title'] }}"
                             class="img-cover"
                        >
                    </a>
                </figure>
            </div>
            <div class="cell small-12 medium-6">
                <a href="{{ route('news.detail', ['news' => $news_items['id']]) }}">
                    <h3>{{ $news_items['title'] }}</h3>
                </a>
                <p>
                    {!! \Illuminate\Support\Str::limit($news_items['description'], 150, '...') !!}
                </p>
                <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i>{{ $news_items['public_date'] }}</time>
            </div>
        </article>
    @endforeach

    <a data-url="{{ $data['allList']->nextPageUrl() }}" id="loadMore" class="load-more">@lang('button.view_more')
        <i class="fas fa-caret-down"></i>
    </a>
</div>