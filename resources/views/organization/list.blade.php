<div id="content-list-box">
        <section class="grid-x grid-margin-x margin-top-1">
            @foreach($data['allList']  as $organization_item )
                <article class="cell small-12 medium-6 xlarge-4 xxxlarge-3">
                    <div class="cards-style">
                        <figure class="cards-image">
                            <a href="{{ route('organization.detail', [ 'organization' => $organization_item['id'] ]) }}">
                                <img src="{{ $organization_item['image_path'] ? $organization_item['image_path'] : asset( config('images.placeholder.700x400') ) }}"
                                     alt="{{ $organization_item['title'] }}"
                                     class="img-cover"
                                >
                            </a>
                        </figure>
                        <div class="cards-detail">
                            <h2 class="cards-topic">{{ $organization_item['name']  }}</h2>
                            <p class="cards-amount">{{ $organization_item['category_title']  }}</p>
                            <a href="{{ route('organization.detail', [ 'organization' => $organization_item['id']] ) }}" class="btn-blue">Contact</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
        <div class="organization-load">
            @if($data['allList']->nextPageUrl())
                <a data-url="{{ $data['allList']->nextPageUrl() . '&category_id=' . $category_id }}"
                   id="loadMore" class="load-more">
                    @lang('button.view_more')
                    <i class="fas fa-caret-down"></i>
                </a>
            @endif
        </div>
</div>