<div id="content-list-box">
    @foreach( $data['challenge'] as $challenge_item )

        <article class="grid-x grid-margin-x grid-margin-y ">
            <div class="cell small-12 medium-6">
                <figure>
                    <a href="{{ route('challenge.detail', ['id' => $challenge_item['id']]) }}">
                        <img src="{{ $challenge_item['image_path'] ? $challenge_item['image_path'] : asset(config('images.placeholder.700x400' ))  }}"
                             class="img-cover"
                             alt="{{ $challenge_item['title'] }}">
                    </a>
                </figure>
            </div>
            <div class="cell small-12 medium-6">
                <a href="{{ route('challenge.detail', ['id' => $challenge_item['id']]) }}">
                    <h3>{{ $challenge_item['title'] }}</h3>
                </a>
                <p>
                    {{ $challenge_item['description'] }}
                </p>
            </div>
        </article>
    @endforeach
    <a data-url="{{ $data['challenge']->nextPageUrl() }}" id="loadMore" class="load-more">@lang('button.view_more')
        <i class="fas fa-caret-down"></i>
    </a>
</div>
