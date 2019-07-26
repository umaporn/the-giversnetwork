@forelse( $challenge as $challengeItem )
    <tr>
        <td>{{ $challengeItem->id }}</td>
        <td>{{ $challengeItem->title }}</td>
        <td>{{ $challengeItem->view }}</td>
        <td>{{ count( $challengeItem->challengeComment ) }}</td>
        <td>{{ $challengeItem->status }}</td>
        <td>
            @if($challengeItem->status === 'public')
                <a href="{{ route('challenge.detail', [ 'challenge' => $challengeItem->id ]) }}" target="_blank">
                    <i class="fas fa-link"></i>
                </a>
            @else
                <i class="fas fa-link"></i>
            @endif
        </td>
        <td>
            <a href="{{ route('admin.challenge.edit', [ 'challenge' =>  $challengeItem->id ]) }}"><i class="fas fa-pen"></i></a>
        </td>
        <td>
            <form class="deletion" id="challenge-group-deletion-{{ $loop->iteration }}"
                  data-info="{{ $challengeItem->id }}"
                  data-deletion-confirmation-message="@lang('challenge_admin.challenge_management.remove_confirmation')"
                  method="POST" action="{{ route('admin.challenge.destroy', ['challenge' => $challengeItem->id]) }}"
            >
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="challenge" value="{{ $challengeItem->id }}">
                <button type="submit" class="cursor-pointer" title="@lang('challenge_admin.challenge_management.remove')">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td class="not-found" colspan="3">@lang('challenge_admin.challenge_management.not_found_challenge')</td>
    </tr>
@endforelse