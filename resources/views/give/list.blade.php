<div id="content-list-box">
    <section class="grid-x grid-margin-x">
        @foreach( $data['allList'] as $give_item )
            <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                <div class="cards-style">
                    <figure class="cards-image">
                        <a href="{{ route('give.detail', [ 'give' => $give_item['id'] ]) }}">
                            <img src="{{ $give_item['image_path'] ? $give_item['image_path'] : asset( config('images.placeholder.130x130') ) }}"
                                 alt="{{ $give_item['title'] }}"
                                 class="img-cover"
                            >
                        </a>
                    </figure>
                    <div class="cards-detail">
                        <a href="{{ route('give.detail', [ 'give' => $give_item['id'] ]) }}">
                            <h2 class="cards-topic">{{ $give_item['title'] }}</h2>
                        </a>
                        <p class="cards-amount">items: {{ $give_item['amount'] ? $give_item['amount'] : '0' }} </p>
                        <a href="{{ route('give.detail', [ 'give' => $give_item['id'] ]) }}"
                           class="btn-blue"
                        >
                            @lang('give.contact_giver')
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
    </section>
    <div class="give-load">
        @if( $data['allList']->nextPageUrl() )
            <a data-url="{{ $data['allList']->nextPageUrl() . '&type=' . $give_item['type'] . '&category_id=' . $category_id }}"
               id="loadMore-{{ $give_item['type'] }}" class="load-more">
                @lang('button.view_more')
                <i class="fas fa-caret-down"></i>
            </a>
        @endif
    </div>
</div>