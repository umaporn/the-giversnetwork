@forelse( $give as $giveItem )
    <tr>
        <td>{{ $giveItem->id }}</td>
        <td>{{ $giveItem->title }}</td>
        <td>{{ $giveItem->view }}</td>
        <td>
            @if($giveItem->status === 'public')
                <i class="far fa-check-square"></i>
            @else
                <i class="far fa-square"></i>
            @endif
        </td>
        <td>
            <a href="{{ route('give.detail', [ 'give' => $giveItem->id ]) }}" target="_blank">
                <i class="fas fa-link"></i>
            </a>
        </td>
        <td><a href="{{ route('admin.give.edit', [ 'give' =>  $giveItem->id ]) }}"><i class="fas fa-pen"></i></a></td>
        <td>
            <form class="deletion" id="give-group-deletion-{{ $loop->iteration }}"
                  data-info="{{ $giveItem->id }}"
                  data-deletion-confirmation-message="@lang('give_admin.give_management.remove_confirmation')"
                  method="POST" action="{{ route('admin.give.destroy', ['give' => $giveItem->id]) }}"
            >
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="give" value="{{ $giveItem->id }}">
                <button type="submit" class="cursor-pointer" title="@lang('give_admin.give_management.remove')">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td class="not-found" colspan="3">@lang('give_admin.give_management.not_found_give')</td>
    </tr>
@endforelse