<section class="learn">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <i class="fas fa-book"></i>
            <h2 class="topic-light">@lang('learn.page_link.index')</h2>
            <span>- Short description to explain share section : Definition</span>
        </div>
        <div class="cell shrink view-all">
            <a href="#">
                <span>@lang('button.view_all')</span>
                <i class="fas fa-caret-right"></i> <i class="fas fa-caret-right"></i>
            </a>
        </div>
    </div>
    <div class="grid-x grid-margin-x content padding-content">
        @foreach( $data['learn'] as $learn_item )
            <article class="cell small-12 medium-4">
                <figure>
                    <img src="{{ $learn_item['file_path'] }}" alt="{{ $learn_item['title'] }}">
                </figure>
                <a href="#"><h3>{{ $learn_item['title'] }}</h3></a>
                <span class="category">{{ $learn_item['category_title'] }}</span>
            </article>
        @endforeach
    </div>
</section>