<div id="content-list-box">
    <section class="grid-x grid-margin-x margin-top-1">
        @foreach($data['otherUserItems'] as $otherUserItems)
            <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                <div class="cards-style">
                    <figure class="cards-image">
                        <a href="{{ route('give.detail', [ 'give' => $otherUserItems['id'] ]) }}">
                            <img src="{{ $otherUserItems['image_path'] ? $otherUserItems['image_path'] : asset(config('images.placeholder.130x130')) }}"
                                 alt="{{ $otherUserItems['title'] }}"
                                 class="img-cover"
                            >
                        </a>
                    </figure>
                    <div class="cards-detail">
                        <a href="{{ route('give.detail', [ 'give' => $otherUserItems['id'] ]) }}">
                            <h2 class="cards-topic">{{ $otherUserItems['title'] }}</h2>
                        </a>
                        <p class="cards-amount">{{ $otherUserItems['amount'] }} items</p>
                    </div>
                </div>
            </article>
        @endforeach
    </section>

    @if($data['otherUserItems']->nextPageUrl())
        <div class="give-load">
            <a data-url="{{ $data['otherUserItems']->nextPageUrl() }}" id="loadMore" class="load-more">@lang('button.view_more')
                <i class="fas fa-caret-down"></i></a>
        </div>
    @endif
</div>
