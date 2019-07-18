@forelse( $share as $shareItem )
    <tr>
        <td>{{ $shareItem->id }}</td>
        <td>{{ $shareItem->title }}</td>
        <td>{{ $shareItem->view }}</td>
        <td>{{ count( $shareItem->shareComment ) }}</td>
        <td>
            <a href="{{ route('share.detail', [ 'share' => $shareItem->id ]) }}" target="_blank">
                <i class="fas fa-link"></i>
            </a>
        </td>
        <td><a href="{{ route('admin.share.edit', [ 'share' =>  $shareItem->id ]) }}"><i class="fas fa-pen"></i></a></td>
        <td>
            <form class="deletion" id="share-group-deletion-{{ $loop->iteration }}"
                  data-info="{{ $shareItem->email }}"
                  data-deletion-confirmation-message="@lang('share_admin.share_management.remove_confirmation')"
                  method="POST" action="{{ route('admin.share.destroy', ['share' => $shareItem->id]) }}"
            >
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="share" value="{{ $shareItem->id }}">
                <button type="submit" class="cursor-pointer" title="@lang('share_admin.share_management.remove')">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td class="not-found" colspan="3">@lang('share_admin.share_management.not_found_share')</td>
    </tr>
@endforelse