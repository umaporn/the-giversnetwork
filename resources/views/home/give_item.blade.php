@foreach( $data['give'] as $give_item)
    <div class="cell small-6 medium-4">
        <article>
            <figure>
                <a href="{{ route('give.detail', ['give' => $give_item['id'] ]) }}">
                    <img src="{{ $give_item['image_path'] ? $give_item['image_path'] : config('images.placeholder.130x130') }}" alt="{{ $give_item['title'] }}" class="img-cover">
                </a>
            </figure>
            <a href="{{ route('give.detail', ['give' => $give_item['id'] ]) }}">
                <h3> {!! \Illuminate\Support\Str::limit($give_item['title'], 30, '...') !!}</h3>
            </a>
            <span class="sub-title">{{ $give_item['amount'] }} items</span>
        </article>
    </div>
@endforeach

@if( count ( $data['give'] ) === 9 )
    <div class="cell small-6 medium-4 view-all align-self-top text-center">
        <a href="{{ route('give.index', ['category_id' => $give_item['fk_category_id'] ]) }}">
            <i class="fas fa-plus"></i>
        </a>
        <span class="sub-title">MORE</span>
    </div>
@endif
