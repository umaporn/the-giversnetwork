@forelse( $events as $eventsItem )
    <tr>
        <td>{{ $eventsItem->id }}</td>
        <td>{{ $eventsItem->title }}</td>
        <td>{{ $eventsItem->view }}</td>
        <td>
            {{ $eventsItem->status }}
        </td>
        <td>
            <a href="{{ route('events.detail', [ 'events' => $eventsItem->id ]) }}" target="_blank">
                <i class="fas fa-link"></i>
            </a>
        </td>
        <td><a href="{{ route('admin.events.edit', [ 'events' =>  $eventsItem->id ]) }}"><i class="fas fa-pen"></i></a></td>
        <td>
            <form class="deletion" id="give-group-deletion-{{ $loop->iteration }}"
                  data-info="{{ $eventsItem->id }}"
                  data-deletion-confirmation-message="@lang('give_admin.give_management.remove_confirmation')"
                  method="POST" action="{{ route('admin.events.destroy', ['events' => $eventsItem->id]) }}"
            >
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="give" value="{{ $eventsItem->id }}">
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