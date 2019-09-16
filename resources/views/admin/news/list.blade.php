@forelse( $news as $newsItem )
    <tr>
        <td>{{ $newsItem->id }}</td>
        <td>{{ $newsItem->title }}</td>
        <td>{{ $newsItem->view }}</td>
        <td>
            @if($newsItem->status === 'public')
                <i class="far fa-check-square"></i>
            @else
                <i class="far fa-square"></i>
            @endif
        </td>
        <td>
            <a href="{{ route('news.detail', [ 'news' => $newsItem->id ]) }}" target="_blank">
                <i class="fas fa-link"></i>
            </a>
        </td>
        <td><a href="{{ route('admin.news.edit', [ 'news' =>  $newsItem->id ]) }}"><i class="fas fa-pen"></i></a></td>
        <td>
            <form class="deletion" id="news-group-deletion-{{ $loop->iteration }}"
                  data-info="{{ $newsItem->id }}"
                  data-deletion-confirmation-message="@lang('news_admin.news_management.remove_confirmation')"
                  method="POST" action="{{ route('admin.news.destroy', ['news' => $newsItem->id]) }}"
            >
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="id" value="{{ $newsItem->id }}">
                <button type="submit" class="cursor-pointer" title="@lang('news_admin.news_management.remove')">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td class="not-found" colspan="3">@lang('news_admin.news_management.not_found_news')</td>
    </tr>
@endforelse