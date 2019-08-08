@forelse( $learn_highlight as $learn )
    <tr>
        <td>{{ $learn->id }}</td>
        <td>{{ $learn->title }}</td>
        <td>
            @if($learn->status === 'public')
                <i class="far fa-check-square"></i>
            @else
                <i class="far fa-square"></i>
            @endif
        </td>
        <td>
            @if($learn->highlight_status === 'pinned')
                <i class="far fa-check-square"></i>
            @else
                <i class="far fa-square"></i>
            @endif
        </td>
        <td>
            <a href="{{ route('learn.detail', [ 'learn' => $learn->id ]) }}" target="_blank">
                <i class="fas fa-link"></i>
            </a>
        </td>
        <td><a href="{{ route('admin.learn.edit', [ 'learn' =>  $learn->id ]) }}"><i class="fas fa-pen"></i></a></td>
        <td>
            <form class="deletion" id="learn-group-deletion-{{ $loop->iteration }}"
                  data-info="{{ $learn->email }}"
                  data-deletion-confirmation-message="@lang('learn_admin.learn_management.remove_confirmation')"
                  method="POST" action="{{ route('admin.learn.destroy', ['learn' => $learn->id]) }}"
            >
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="id" value="{{ $learn->id }}">
                <button type="submit" class="cursor-pointer" title="@lang('learn_admin.learn_management.remove')">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td class="not-found" colspan="3">@lang('learn_admin.learn_management.not_found_learn')</td>
    </tr>
@endforelse