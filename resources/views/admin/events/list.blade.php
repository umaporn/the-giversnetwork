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
            <form class="deletion" id="events-group-deletion-{{ $loop->iteration }}"
                  data-info="{{ $eventsItem->id }}"
                  data-deletion-confirmation-message="@lang('events_admin.events_management.remove_confirmation')"
                  method="POST" action="{{ route('admin.events.destroy', ['events' => $eventsItem->id]) }}"
            >
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="events" value="{{ $eventsItem->id }}">
                <button type="submit" class="cursor-pointer" title="@lang('events_admin.events_management.remove')">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td class="not-found" colspan="3">@lang('events_admin.events_management.not_found_events')</td>
    </tr>
@endforelse