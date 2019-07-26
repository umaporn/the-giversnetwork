@forelse( $users as $user )
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->firstname . ' ' . $user->lastname }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->permission->scope }}</td>
        <td><a href="{{ route('admin.user.edit', [ 'user' =>  $user->id ]) }}"><i class="fas fa-pen"></i></a></td>
        <td class="text-center">
            <form class="deletion" id="user-group-deletion-{{ $loop->iteration }}"
                  data-info="{{ $user->email }}"
                  data-deletion-confirmation-message="@lang('user.user_management.remove_confirmation')"
                  method="POST" action="{{ route('admin.user.destroy', ['user' => $user]) }}"
            >
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="email" value="{{ $user->email }}">
                <button type="submit" class="cursor-pointer" title="@lang('user.user_management.remove')">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td class="not-found" colspan="3">@lang('user.user_management.not_found_users')</td>
    </tr>
@endforelse