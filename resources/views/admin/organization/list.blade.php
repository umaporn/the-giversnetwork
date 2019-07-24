@forelse( $organizations as $organization )
    <tr>
        <td>{{ $organization->id }}</td>
        <td>{{ $organization->name }}</td>
        <td>{{ $organization->category_title }}</td>
        <td>
            <a href="{{ route('organization.detail', [ 'organization' => $organization->id ]) }}" target="_blank">
                <i class="fas fa-link"></i>
            </a>
        </td>
        <td><a href="{{ route('admin.organization.edit', [ 'organization' =>  $organization->id ]) }}"><i class="fas fa-pen"></i></a></td>
        <td>
            <form class="deletion" id="organization-group-deletion-{{ $loop->iteration }}"
                  data-info="{{ $organization->id }}"
                  data-deletion-confirmation-message="@lang('organization_admin.organization_management.remove_confirmation')"
                  method="POST" action="{{ route('admin.organization.destroy', ['organization' => $organization->id]) }}"
            >
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="id" value="{{ $organization->id }}">
                <button type="submit" class="cursor-pointer" title="@lang('organization_admin.organization_management.remove')">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td class="not-found" colspan="3">@lang('organization_admin.organization_management.not_found_organization')</td>
    </tr>
@endforelse