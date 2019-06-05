<section class="give">
    <div class="grid-x align-middle topic padding-content">
        <div class="cell auto">
            <i class="fas fa-gift"></i>
            <h2 class="topic-light">@lang('give.page_link.index')</h2>
            <span>- Short description to explain share section : Definition</span>
        </div>
    </div>
    <div class="grid-x content padding-content">
        <div class="cell medium-3 align-self-stretch">
            <ul class="vertical tabs" data-tabs id="cate-tabs">
                <li class="">@lang('give.category')</li>
                @foreach( $data['giveCategory'] as $give_category_item )
                    <li class="tabs-title @if( $loop->first ) is-active @endif" id="give-category">
                        <a href="#give-category"
                           aria-selected="true"
                           data-url="{{route('give.getGiveByCategory', ['id' => $give_category_item['id']])}}"
                        >
                            {{ $give_category_item['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="cell medium-9 align-self-stretch">
            <div class="tabs-content" data-tabs-content="cate-tabs">
                <div class="tabs-panel is-active" id="give-category-1">
                    <div class="grid-x large-up-5 align-center-middle text-center" id="give-category-box">
                        @include('home.give_item')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>