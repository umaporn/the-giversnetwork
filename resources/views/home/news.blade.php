@if($data['news']->total())
    <section class="news padding-content">
        <div class="grid-x align-middle">
            <h2 class="cell auto topic-dark">@lang('news.page_link.index')</h2>
            <div class="cell shrink view-all">
                <a href="{{ route('news.index') }}">
                    <span>@lang('button.view_all') @lang('news.page_link.index')</span>
                </a>
            </div>
        </div>
        <div class="grid-x grid-margin-x">
            @foreach( $data['news'] as $news_item )
                <article class="cell small-12 medium-4">
                    <a href="{{ route('news.detail', ['id' => $news_item['id']]) }}">
                        <figure>
                            <img src="{{ $news_item['image_path'] ? $news_item['image_path'] : config('images.placeholder.700x400') }}" alt="{{ $news_item['title'] }}">
                        </figure>
                        <h3>{{ $news_item['title'] }}</h3>
                    </a>
                    <time datetime="2019-04-29"><i class="far fa-calendar-alt"></i>{{ $news_item['public_date'] }}
                    </time>
                </article>
            @endforeach
        </div>
    </section>
@endif