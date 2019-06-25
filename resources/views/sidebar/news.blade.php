<section class="events">
    <div class="grid-x align-middle">
        <h2 class="cell auto topic-dark">@lang('news.page_link.index')</h2>
        <div class="cell shrink view-all">
            <a href="{{ route('news.index') }}">
                <span>@lang('button.view_all') @lang('news.page_link.index')</span>
            </a>
        </div>
    </div>
    <div class="grid-x grid-margin-x grid-margin-y">
        @foreach( $data['news'] as $news_items )
            <article class="cell">
                <div class="grid-x grid-margin-x large-margin-collapse">
                    <div class="cell small-12 medium-6 large-12">
                        <figure>
                            <a href="{{ route('news.detail', [ 'news' => $news_items['id'] ]) }}">
                                <img src="{{ $news_items['image_path'] }}" alt="{{ $news_items['title'] }}">
                            </a>
                        </figure>
                    </div>
                    <div class="cell small-12 medium-6 large-12">
                        <a href="{{ route('news.detail', [ 'news' => $news_items['id'] ]) }}">
                            <h3>
                                {{ $news_items['title'] }}
                            </h3>
                        </a>
                        <time datetime="2019-04-29">
                            <i class="far fa-calendar-alt"></i> {{ $news_items['public_date'] }}</time>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</section>