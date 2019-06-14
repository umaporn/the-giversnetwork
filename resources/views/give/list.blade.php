<div id="content-list-box">
    <section class="grid-x grid-margin-x margin-top-1">
        @foreach( $data['allList'] as $give_item )
            <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                <div class="cards-style">
                    <figure class="cards-image">
                        <a href="{{ route('give.detail', [ 'give' => $give_item['id'] ]) }}">
                            <img src="{{ $give_item['image_path'] ? $give_item['image_path'] : config('images.placeholder.700x400') }}"
                                 alt="{{ $give_item['title'] }}"
                                 class="img-cover"
                            >
                        </a>
                    </figure>
                    <div class="cards-detail">
                        <a href="{{ route('give.detail', [ 'give' => $give_item['id'] ]) }}">
                            <h2 class="cards-topic">{{ $give_item['title'] }}</h2>
                        </a>
                        <p class="cards-amount">{{ $give_item['amount'] }} items</p>
                        <a href="{{ route('user.getUserProfile', [ 'user' => $give_item['fk_user_id'] ]) }}"
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
        <a href="#" id="loadMore" class="load-more">@lang('button.view_more')
            <i class="fas fa-caret-down"></i>
        </a>
    </div>
</div>