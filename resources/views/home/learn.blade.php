<section class="learn">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <i class="fas fa-book"></i>
            <h2 class="topic-light">@lang('learn.page_link.index')</h2>
            <span>- Through wisdom we grow - Knowledge library, How to’s, Articles, Case studies</span>
        </div>
        <div class="cell shrink view-all">
            <a href="{{ route('learn.index') }}">
                <span>@lang('button.view_all')</span>
                <i class="fas fa-caret-right"></i><i class="fas fa-caret-right"></i>
            </a>
        </div>
    </div>
    <div class="grid-x grid-margin-x content padding-content">
        @foreach( $data['learn'] as $learn_item )
            <article class="cell small-12 medium-4">
                <figure>
                    <a href="{{ route('learn.detail', ['learn' => $learn_item['id']]) }}">
                        <img src="{{ $learn_item['image_path'] ? $learn_item['image_path'] : config('images.placeholder.700x400')  }}" alt="{{ $learn_item['title'] }}">
                    </a>
                </figure>
                <a href="{{ route('learn.detail', ['learn' => $learn_item['id']]) }}">
                    <h3>{{ $learn_item['title'] }}</h3>
                </a>
                {{--<span class="category">{{ $learn_item['category_title'] }}</span>--}}
            </article>
        @endforeach
    </div>
</section>