@foreach( $data['give'] as $give_item)
    <div class="cell small-6 medium-4">
        <article>
            <figure>
                <a href="{{ route('give.detail', ['give' => $give_item['id'] ]) }}">
                    <img src="{{ $give_item['image_path'] }}" alt="{{ $give_item['title'] }}" class="img-cover">
                </a>
            </figure>
            <a href="{{ route('give.detail', ['give' => $give_item['id'] ]) }}">
                <h3> {!! \Illuminate\Support\Str::limit($give_item['title'], 50, '...') !!}</h3>
            </a>
            <span class="sub-title">{{ $give_item['amount'] }} items</span>
        </article>
    </div>
@endforeach

@if( count ( $data['give'] ) === 9 )
    <div class="cell small-6 medium-4 view-all align-self-top text-center">
        <a href="#">
            <i class="fas fa-plus"></i>
        </a>
        <span class="sub-title">MORE</span>
    </div>
@endif
